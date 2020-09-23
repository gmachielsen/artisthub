<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Artwork;
use App\Artist;
use App\User;

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
            'title'=>'required|min:2',
            'picture' => 'required|mimes:jpeg,jpg,png',
            'description' => 'required|string|min:20',
            'width' => 'required',
            'height' => 'required',
            'year' => 'required',
            'price' => 'required',
        ]);
        $artist = request('artist_id');
        $id = Artist::where('user_id', $artist)->pluck('user_id')->first();
        $user_id = $id;
        $artist_id = Artist::where('user_id', $artist)->pluck('id')->first();

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/artworks/',$filename);
        
            Artwork::create([
                'user_id' => $user_id,
                'artist_id' => $artist_id,
                'title' => request('title'),
                'slug' => str_slug(request('title')),
                'width' => request('width'),
                'height' => request('height'),
                'orientation' => request('orientation'),
                'description' => request('description'),
                'style_id' => request('style_id'),
                'category_id' => request('category_id'),
                'technic_id' => request('technic_id'),
                'year' => request('year'),
                'price' => request('price'),
                'rent' => request('rent'), 
                'picture'=> $filename,
                'status' => request('status'),
                'framed' => request('framed'),
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
