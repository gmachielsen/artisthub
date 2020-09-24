<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Artworkrequest;

class Profile extends Model
{
    protected $guarded = [];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('email', 'like', "%$search%");
        });
    }
}

