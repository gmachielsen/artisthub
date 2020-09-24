<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::whenSearch(request()->search)->paginate(20);

        return view('dashboard.messages.index', compact('messages'));
    }

    public function destroymessage(Request $request){

        $id = request('id');

        $artrequest = Message::where('id', $id);
        $artrequest->delete();
        session()->flash('success', 'Message deleted successfully');

        return redirect()->back();
    }
}
