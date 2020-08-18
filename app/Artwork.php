<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
