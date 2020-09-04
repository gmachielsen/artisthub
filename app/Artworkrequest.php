<?php

namespace App;
use App\User;
use App\Artwork;
use Illuminate\Database\Eloquent\Model;

class Artworkrequest extends Model
{
    protected $fillable = [
        'user_id', 'artwork_id', 'artist_id',
    ];

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimeStamps();
    }

    public function artworks(){
    	return $this->hasOne(Artwork::class);
    }
}
