<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::whenSearch(request()->search)->paginate(2);

        return view('dashboard.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('dashboard.blogs.create');
    }

    public function store()
    {
        
    }

    public function edit($id)
    {
        $blog = Blog::find($id);

        return view('dashboard.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {

    }
}
