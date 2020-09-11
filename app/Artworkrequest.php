<?php

namespace App;
use App\User;
use App\Artwork;
use App\Profile;
use App\Artworkrequest;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function artwork(){
    	return $this->belongsTo(Artwork::class);
    }
}
