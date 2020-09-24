<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;

class CustomerController extends Controller
{
    public function index()
    {
        $profiles = Profile::whenSearch(request()->search)->paginate(20);
        return view('dashboard.profiles.index', compact('profiles'));
    }

    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('dashboard.profiles.edit', compact('profile'));
    }

    public function contactdetails(Request $request, $id) 
    {

        Profile::where('id', $id)->update([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'cell_phone' =>request('cell_phone'),
            'phone' => request('phone'),
        ]);
        session()->flash('success', 'contactdetails saved successfully');
        return redirect()->back();
    }

    public function saveaddress(Request $request, $id)
    {

        Profile::where('id', $id)->update([
            'full_name' => request('full_name'),
            'postal_code' => request('postal_code'),
            'street_name' => request('street_name'),
            'house_number' => request('house_number'),
            'city' => request('city'),
            'country' => request('country'),
        ]);
        session()->flash('success', 'address saved successfully');
        return redirect()->back();
    }
}
