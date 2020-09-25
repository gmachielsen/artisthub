<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $newsitems = News::whenSearch(request()->search)->paginate(2);

        return view('dashboard.news.index', compact('newsitems'));
    }

    public function create()
    {
        return view('dashboard.news.create');
    }

    public function store()
    {
        
    }

    public function edit($id)
    {
        $news = News::find($id);

        return view('dashboard.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {

    }
}
