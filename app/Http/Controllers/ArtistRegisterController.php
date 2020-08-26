<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Artist;
use Hash;

class ArtistRegisterController extends Controller
{
    public function artistRegister()
    {
        $user = User::create([
            'name' => request('name'),
            'user_type' => request('user_type'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            
        ]);
        Artist::create([
            'user_id' => $user->id,
            'artist_name' => request('name'),
            'slug' => str_slug(request('name')),
            'email' => request('email'),
        ]);
        return redirect()->to('login');
    }
}
