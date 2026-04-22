<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use DataTables;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::with('user')->select(['id','user_id','total','status','created_at']);
            return DataTables::of($data)
                ->addColumn('user_name', fn($row) => $row->user->name)
                ->addColumn('action', function($row) {
                    return '
                        <a href="'.route('admin.orders.show', $row->id).'" class="btn-edit">View</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.orders.index');
    }

    public function show(Order $order)
    {
        $order->load('items.product', 'user');
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled'
        ]);
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Order status updated!');
    }
}