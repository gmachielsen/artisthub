<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Technic; 

class TechnicController extends Controller
{
    public function index(){
        $techniques = Technic::whenSearch(request()->search)->paginate(2);
        return view('dashboard.techniques.index', compact('techniques'));
    }

    public function create(){

        return view('dashboard.techniques.create');

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
            $file->move('uploads/technicImages/',$filename);
        
            Technic::create([
                'name' => request('name'),
                'image'=> $filename,
            ]);
        }
        session()->flash('success', 'Technic saved succesfully');
        return redirect()->route('admin.techniques.index'); 
    }

    public function edit($id) {
        $technic = Technic::findOrFail($id);
        return view('dashboard.techniques.edit', compact('technic'));
    }

    public function update(Request $request, $id) {
        $this->validate($request,[
            'name'=>'required|min:3',
        ]);

        $technic = Technic::find($id);

        $technic->name = request('name');


        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/technicImages/',$filename);
            $technic->image = $filename;
        }
        $technic->save();
        session()->flash('success', 'Data updated successfully');
        return redirect()->route('admin.techniques.index');
    }

    public function delete($id) {
        $technic = Technic::find($id);
        $technic->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('admin.techniques.index');
    }
}
