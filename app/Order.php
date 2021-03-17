<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;

class Order extends Model
{
    protected $fillable = [
        'name', 'lastname', 'email', 'dob', 'address', 'phone', 'order_code', 'price'
    ];

    public function restaurants() {
        return $this->belongsTo('App\Restaurant');
    }

}
