<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Style;

class StyleController extends Controller
{
    public function index(){
        $styles = Style::whenSearch(request()->search)->paginate(2);
        return view('dashboard.styles.index', compact('styles'));
    }

    public function create(){

        return view('dashboard.styles.create');

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
            $file->move('uploads/styleImages/',$filename);
        
            Style::create([
                'name' => request('name'),
                'image'=> $filename,
            ]);
        }
        session()->flash('success', 'Style saved succesfully');
        return redirect()->route('admin.styles.index'); 
    }

    public function edit($id) {
        $style = Style::findOrFail($id);
        return view('dashboard.styles.edit', compact('style'));
    }

    public function update(Request $request, $id) {
        $this->validate($request,[
            'name'=>'required|min:3',
        ]);

        $style = Style::find($id);

        $style->name = request('name');


        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/styleImages/',$filename);
            $style->image = $filename;
        }
        $style->save();
        session()->flash('success', 'Data updated successfully');
        return redirect()->route('admin.styles.index');
    }

    public function delete($id) {
        $style = Style::find($id);
        $style->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('admin.styles.index');
    }
}

