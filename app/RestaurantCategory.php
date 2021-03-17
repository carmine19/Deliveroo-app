<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;

class RestaurantCategory extends Model
{
    protected $fillable = ['name', 'cover'];

    protected $table = 'restaurant_categories';

    public function restaurants() {
        return $this->belongsToMany('App\Restaurant', 'category_restaurant');
    }

}
