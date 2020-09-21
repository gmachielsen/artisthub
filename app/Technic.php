<?php

namespace App;
use App\Artwork;
use Illuminate\Database\Eloquent\Model;

class Technic extends Model
{
    public function artworks(){
    	return $this->hasMany(Artwork::class);
    }

    protected $fillable = ['name', 'image'];
    
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });
    }
}
