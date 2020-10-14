<?php

namespace App\Http\Controllers\Api;

use App\Artwork;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArtworkResource;
use App\Filters\Artwork\ArtworkFilters;
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

    public function filters()
    {
        return response()->json([
            'data' => ArtworkFilters::mappings()
        ], 200);

        $map = Category::get()->pluck('name', 'slug');

        dd($map);
    }
}
