<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function artworks()
    {
        return $this->hasMany('App\Artwork');
    }
}
