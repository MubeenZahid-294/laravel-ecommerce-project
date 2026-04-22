<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use DataTables;
use Mail;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ContactMessage::with('user')->select(['id','user_id','subject','is_replied','created_at']);
            return DataTables::of($data)
                ->addColumn('user_name', fn($row) => $row->user->name)
                ->addColumn('action', function($row) {
                    return '
                        <a href="'.route('admin.contact.index').'?id='.$row->id.'" class="btn-edit">View & Reply</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $message = null;
        if (request('id')) {
            $message = ContactMessage::with('user')->findOrFail(request('id'));
        }

        return view('admin.contact.index', compact('message'));
    }

    public function reply(Request $request, ContactMessage $message)
    {
        $request->validate([
            'reply' => 'required|string|min:5',
        ]);

        $message->update([
            'admin_reply' => $request->reply,
            'is_replied'  => true,
        ]);

        Mail::raw($request->reply, function($mail) use ($message) {
            $mail->to($message->user->email)
                 ->subject('Reply to: ' . $message->subject);
        });

        return back()->with('success', 'Reply sent to ' . $message->user->email);
    }
}