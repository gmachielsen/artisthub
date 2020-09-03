<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $guarded = [];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimeStamps();
    }

    

    public function checkApplication()
    {
        return \DB::table('artworkrequests')->where('user_id', auth()->user()->id)->where('artwork_id', $this->id)->exists();
    }
}
