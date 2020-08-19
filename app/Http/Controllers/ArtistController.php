<?php

namespace App\Http\Controllers;
use App\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index($id, Artist $artist)
    {
        return view('artist.index', compact('artist'));
    }
}
