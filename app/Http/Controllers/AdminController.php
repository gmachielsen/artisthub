<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function categegoryindex(){
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }
}
