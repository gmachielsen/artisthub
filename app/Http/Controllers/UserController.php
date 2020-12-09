<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Artworkrequest;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['customer', 'verified']);
    }

    public function favourites()
    {
        $artworks = Auth::user()->favourites; 
        return view('profile.favourites', compact('artworks'));
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        
        $profile = Profile::where('user_id', $user_id)->first();
        return view('profile.index', compact('profile'));
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
        return redirect()->back()->with('message', 'Dank voor het invullen van uw profielgegevens, uw gegevens zijn nu opgeslagen.');
    }

    public function saveaddress(Request $request)
    {
        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            'full_name' => request('full_name'),
            'postal_code' => request('postal_code'),
            'street_name' => request('street_name'),
            'house_number' => request('house_number'),
            'city' => request('city'),
            'country' => request('country'),
        ]);
        return redirect()->back()->with('message', 'Dank voor het invullen van uw adresgegevens, uw gegevens zijn nu opgeslagen');
    }

    public function artworkrequest(Request $request, $artworkid)
    {
        $artwork_id = $artworkid;
        $user_id = auth()->user()->id;
        
        Artworkrequest::create([
            'user_id' => $user_id,
            'artwork_id' => $artwork_id,
        ]);
        return redirect('/');


        // public function artworkrequest(Request $request, $id, $artist)
        // {
        //     $artist_user_id = $artist; 
        //     $artwork_id = $id;
        //     $user_id = auth()->user()->id;
            
        //     Artworkrequest::create([
        //         'user_id' => $user_id,
        //         'artist_user_id' => $artist_user_id,
        //         'artwork_id' => $artwork_id,
        //     ]);
        //     return redirect('/');
    }
}
