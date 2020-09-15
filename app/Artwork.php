<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Technic;
use App\Style;
use App\User;
use App\Artworkrequest;
use App\Message;
use App\Artist;

class Artwork extends Model
{
    protected $guarded = [];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function style()
    {
        return $this->belongsTo(Style::class);
    }

    public function technic()
    {
        return $this->belongsTo(Technic::class);
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimeStamps();
    }

    public function artworkrequests()
    {
        return $this->hasMany(Artworkrequest::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    

    public function checkApplication()
    {
        return \DB::table('artworkrequests')->where('user_id', auth()->user()->id)->where('artwork_id', $this->id)->exists();
    }

    public function favourites() {
        return $this->belongsToMany(Artwork::class, 'favourites', 'artwork_id', 'user_id')->withTimeStamps();
    }

    public function checkSaved() {
        return \DB::table('favourites')->where('user_id', auth()->user()->id)->where('artwork_id', $this->id)->exists();
    }
}
