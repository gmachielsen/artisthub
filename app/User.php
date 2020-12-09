<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Profile;
use App\Artist;
use App\Artwork;
use App\Artworkrequest;
use App\Message;
use App\Role;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function artist(){
        return $this->hasOne(Artist::class);
    }

    public function artworkrequests(){
        return $this->hasMany(Artworkrequest::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function favourites() {
        return $this->belongsToMany(Artwork::class, 'favourites', 'user_id', 'artwork_id')->withTimeStamps();
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
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

}
