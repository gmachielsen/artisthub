<?php

namespace App;
use App\User;
use App\Artwork;
use App\Profile;
use Illuminate\Database\Eloquent\Model;

class Artworkrequest extends Model
{
    protected $fillable = [
        'id', 'user_id', 'artwork_id', 'artist_id',
    ];

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function users()
    {
        return $this->belongsTo(User::class)->withTimeStamps();
    }

    public function profiles()
    {
        return $this->belongsTo(Profile::class);
    }

    public function artworks(){
    	return $this->belongsTo(Artwork::class);
    }
}
