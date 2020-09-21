<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Artwork;

class AdminArtworkController extends Controller
{
    public function index(){
        $artworks = Artwork::whenSearch(request()->search)->paginate(20);
        return view('dashboard.artworks.index', compact('artworks'));
    }

    public function create(){

        return view('dashboard.artworks.create');

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
            $file->move('uploads/artworks/',$filename);
        
            Artwork::create([
                'name' => request('name'),
                'image'=> $filename,
            ]);
        }
        session()->flash('success', 'Artwork saved succesfully');
        return redirect()->route('admin.artworks.index'); 
    }

    public function edit($id) {
        $artwork = Artwork::findOrFail($id);
        return view('dashboard.artworks.edit', compact('artwork'));
    }

    public function update(Request $request, $id) {
        $this->validate($request,[
            'name'=>'required|min:3',
        ]);

        $artwork = Artwork::find($id);

        $artwork->name = request('name');


        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/artworks/',$filename);
            $style->image = $filename;
        }
        $style->save();
        session()->flash('success', 'Data updated successfully');
        return redirect()->route('admin.artworks.index');
    }

    public function delete($id) {
        $style = Artwork::find($id);
        $style->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('admin.artworks.index');
    }
}
