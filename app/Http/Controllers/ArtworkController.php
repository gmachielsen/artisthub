<?php

namespace App\Http\Controllers;
use App\Artwork;
use App\Artist;
use App\Http\Requests\ArtworkPostRequest;

use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    public function index()
    {
        $artworks = Artwork::all();
        return view('welcome', compact('artworks'));
    }

    public function show($id, Artwork $artwork)
    {
        return view('artworks.show', compact('artwork'));
    }

    public function artist()
    {
        return view('artist.index');
    }

    public function myArtwork()
    {
        $artworks = Artwork::where('user_id', auth()->user()->id)->get();
        return view('artworks.myArt', compact('artworks'));
    }

    public function create()
    {
        return view('artworks.create');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $artist = Artist::where('user_id', $user_id)->first();
        $artist_id = $artist->id;

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/artworks/',$filename);
        
            Artwork::create([
                'user_id' => $user_id,
                'artist_id' => $artist_id,
                'title' => request('title'),
                'slug' => str_slug(request('title')),
                'width' => request('title'),
                'height' => request('height'),
                'orientation' => request('orientation'),
                'description' => request('description'),
                'year' => request('year'),
                'price' => request('price'),
                'rent' => request('rent'), 
                'picture'=> $filename,
            ]);
        }
        return redirect()->back()->with('create.artwork','Artwork created successfully');
        

        
    }
}
