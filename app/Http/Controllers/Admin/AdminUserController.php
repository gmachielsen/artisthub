<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

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


    }


    public function delete()
    {

    }
}
