<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Style;
use App\Artwork;

class StyleController extends Controller
{
    public function index($id){
        $artworks = Artwork::where('style_id', $id)->paginate(20);
        $styleName = Style::where('id', $id)->first();
        return view('artworks.styles-category', compact('artworks', 'styleName'));
    }
}
