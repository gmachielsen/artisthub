<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Order;
use App\Artwork; 

class OrderController extends Controller
{
    public function rent_artwork($id)
    {
        $artwork = Artwork::findOrFail($id);
        return view('artworks.rentartwork', compact('artwork'));
    }

    public function buy_artwork($id)
    {
        $artwork = Artwork::findOrFail($id);
        return view('artworks.buyartwork', compact('artwork'));
    }

    public function rent_artwork_order(Request $request, $id)
    {

        $artwork = Artwork::find($id);
        $artwork->status = 0;
        $artwork->save();
        dd($artwork);

        $this->validate($request,[
            'name'=>'required|min:2',
            'email' => 'required',
            'phone' => 'required',
            'cell_phone' => 'required',
            'street' => 'required',
            'postal_code' => 'required',
            'housenumber' => 'required',
            'price' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        
        Order::create([
            'artwork_id' => $artwork,
            'name' => request('name'),
            'email' => request('email'),
            'street' => request('street'),
            'housenumber' => str_slug(request('housenumber')),
            'postal_code' => request('postal_code'),
            'phone' => request('phone'),
            'cell_phone' => request('cell_phone'),
            'city' => request('city'),
            'country' => request('country'),
            'comment' => request('comment'),
            'type' => request('type'),
        ]);


        return redirect()->back()->with('all.artwork','Artwork created successfully');     
    }

    public function buy_artwork_order(Request $request, $id)
    {

    }
}
