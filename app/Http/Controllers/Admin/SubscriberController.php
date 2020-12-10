<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::whenSearch(request()->search)->paginate(2);

        return view('dashboard.subscribers.index', compact('subscribers'));
    }

    public function create()
    {
        return view('dashboard.subscribers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|min:2',
        ]);
        Subscriber::create([
            'email' => request('email'),
        ]);

        session()->flash('success', 'Emailaddress for newsletter saved succesfully');
        return redirect()->back(); 
    }

    public function edit($id)
    {
        $subscriber = Subscriber::find($id);

        return view('dashboard.subscribers.edit', compact('subscriber'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'email'=>'required|min:2',
        ]);

        $subscriber = Subscriber::find($id);
        $subscriber->email = request('email');

        $subscriber->save();
        session()->flash('success', 'Subscriber updated succesfully');
        return redirect()->back(); 
    }

    public function delete($id)
    {
        $subscriber = Subscriber::find($id);
        $subscriber->delete();
        session()->flash('success', 'Subscriber deleted successfully');
        return redirect()->route('admin.subscribers.index');
    }
}
