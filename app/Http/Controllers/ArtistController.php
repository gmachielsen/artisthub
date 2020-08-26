<?php

namespace App\Http\Controllers;
use App\Artist;
use App\Job;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index($id, Artist $artist)
    {
        return view('artist.index', compact('artist'));
    }

    public function create()
    {
        return view('artist.create');
    }
}
