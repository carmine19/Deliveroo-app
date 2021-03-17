<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;
use App\DishCategory;
use App\Menu;

class Dish extends Model
{
    protected $fillable = [
        'name', 'slug', 'cover', 'description', 'ingredients', 'price', 'visibility', 'dish_category_id', 'restaurant_id',
    ];

    public function restaurant() {
        return $this->belongsTo('App\Restaurant');
    }

    public function categories() {
        return $this->belongsTo('App\DishCategory');
    }

    public function menus() {
        return $this->belongsToMany('App\Menu', 'dish_menu')
        ->withTimestamps();
    }
}
