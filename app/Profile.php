<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Artworkrequest;

class Profile extends Model
{
    protected $guarded = [];

    public function artworkrequests()
    {
        return $this->hasMany(Artworkrequest::class);
    }
}

