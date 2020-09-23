<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Artist;
use App\Artwork;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::whenSearch(request()->search)->paginate(10);

        return view('dashboard.users.index', compact('users'));
    }


    public function edit($id)
    {
        $user = User::find($id);

        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|min:3',
            'email' => 'required|min:5',
        ]);

        $user = User::find($id);

        $user->name = request('name');
        $user->user_type = request('user_type');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));

        $user->save();
        session()->flash('success', 'Data updated successfully');
        return redirect()->route('admin.users.index');

    }

    public function delete($id)
    {
        $profile = Profile::where('user_id', $id)->delete();
        $artwork = Artwork::where('user_id', $id)->delete();
        $artist = Artist::where('user_id', $id)->delete();
        $user = User::where('id', $id)->delete();
        session()->flash('success', 'User deleted successfully');
        return redirect()->route('admin.users.index');
    }
}
