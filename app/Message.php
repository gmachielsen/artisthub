<?php

namespace App;
use App\User;
use App\Artwork;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

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
