<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class UserController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request) 
    {
        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'cell_phone' =>request('cell_phone'),
            'phone' => request('phone'),
        ]);
        return redirect()->back()->with('message', 'Dank voor het invullen, uw gegevens zijn nu opgeslagen.');
    }
}
