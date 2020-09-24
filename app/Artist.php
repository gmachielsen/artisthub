<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'user_id', 'artist_name', 'first_name', 'last_name', 'YearOfBirth', 'cover_photo', 'profile_photo', 'slug', 'description', 'email', 'phone', 'GSM', 'full_name', 'postal_code', 'street_name', 'house_number', 'further_address_information', 'city', 'state', 'country', 'website', 'company_name', 'taxnumber', 'businessnumber', 'shorttext', 'approved',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }

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
    
    public function artworks()
    {
        return $this->hasMany('App\Artwork');
    }
}
