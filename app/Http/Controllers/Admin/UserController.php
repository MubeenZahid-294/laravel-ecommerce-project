<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select(['id','name','email','created_at']);
            return DataTables::of($data)
                ->make(true);
        }
        return view('admin.users.index');
    }
}