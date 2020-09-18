<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create(){

        return view('dashboard.categories.create');

    }

    public function store(Request $request) {
        $this->validate($request,[
            'name'=>'required|min:2',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);


        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/categoryImages/',$filename);
        
            Category::create([
                'name' => request('name'),
                'image'=> $filename,
            ]);
        }
        return redirect()->back()->with('dashboard.categories.create','Artwork created successfully');   
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, $id) {
        $this->validate($request,[
            'name'=>'required|min:3',
        ]);

        $category = Category::find($id);

        $category->name = request('name');


        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/categoryImages/',$filename);
            $category->image = $filename;
        }
        $category->save();
        
        return redirect()->back()->with('dashboard.categories.create','Artwork created successfully'); 
    }

    public function delete() {
        return view('dashboard.categories.index');
    }
}
