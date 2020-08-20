<?php

namespace App;
use App\Artwork;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    public function artworks(){
    	return $this->hasMany(Artwork::class);
    }
}