<?php

namespace App\Http\Controllers\Api;

use App\Artwork;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArtworkResource;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class ArtworkController extends Controller
{
    public function index(Request $request)
    {
        return new ArtworkResource(
            Artwork::with(['category', 'style', 'technic'])->paginate(2)
        );
    }
}
