<?php

namespace App\Http\Controllers;
use App\Artwork;
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
}
