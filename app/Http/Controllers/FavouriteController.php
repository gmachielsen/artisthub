<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artwork;

class FavouriteController extends Controller
{
    public function saveArtwork($id) {
        $artworkId = Artwork::find($id);
        $artworkId->favourites()->attach(auth()->user()->id);
        return redirect()->back();
    }

    public function unSaveArtwork($id) {
        $artworkId = Artwork::find($id);

        $artworkId->favourites()->detach(auth()->user()->id);
        return redirect()->back();
    }
}
