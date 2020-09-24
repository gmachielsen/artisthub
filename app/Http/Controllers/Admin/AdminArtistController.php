<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Artist;

class AdminArtistController extends Controller
{
    public function index(){
        $artists = Artist::whenSearch(request()->search)->paginate(20);
        return view('dashboard.artists.index', compact('artists'));
    }

    public function edit($id)
    {
        $artist = Artist::find($id);

        return view('dashboard.artists.edit', compact('artist'));
    }

    public function savePersonalInformation(Request $request, $id)
    {
        Artist::where('id', $id)->update([
            'artist_name' => request('artist_name'),
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'YearOfBirth' => request('YearOfBirth'),
            'email' => request('email'),
            'GSM' => request('GSM'),
            'phone' => request('phone'),
        ]);
        session()->flash('success', 'Personal Information saved succesfully');
        return redirect()->back();
    }

    public function saveCompanyInformation(Request $request, $id)
    {
        $user_id = auth()->user()->id;
        Artist::where('id', $id)->update([
            'website' => request('website'),
            'company_name' => request('company_name'),
            'businessnumber' => request('businessnumber'),
            'taxnumber' => request('taxnumber'),
            'postal_code' => request('postal_code'),
            'street_name' => request('street_name'),
            'house_number' => request('house_number'),
            'city' => request('city'),
            'country' => request('country'),
        ]);
        session()->flash('success', 'Company information saved succesfully');
        return redirect()->back();
    }

    public function saveStoryAboutArtist(Request $request, $id)
    {
        Artist::where('id', $id)->update([
            'shorttext' => request('shorttext'),
            'description' => request('description'),
        ]);
        session()->flash('success', 'Story about artist saved succesfully');
        return redirect()->back();
    }

    public function profilePhoto(Request $request, $id) 
    {
        $user = $id;

        if($request->hasfile('profile_photo'))
        {
            $file = $request->file('profile_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/profilephoto/',$filename);
            Artist::where('id', $user)->update([
                'profile_photo'=>$filename
        ]);

        session()->flash('success', 'Profile photo saved succesfully');
        return redirect()->back();
        }
    }
}
