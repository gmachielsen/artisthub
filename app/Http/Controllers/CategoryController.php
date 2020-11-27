<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Artwork;

class CategoryController extends Controller
{
    public function index($id){
        $artworks = Artwork::where('category_id', $id)->paginate(20);
        $categoryName = Category::where('id', $id)->first();
        return view('artworks.artworks-category', compact('artworks', 'categoryName'));
    }
}
