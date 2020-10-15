<?php

namespace App;
use App\Order;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function artwork()
    {
        return $this->hasOne(Artwork::class);
    }
}
