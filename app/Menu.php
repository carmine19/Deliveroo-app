<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Dish;
use App\MenuCategory;
use App\Restaurant;

class Menu extends Model
{
    protected $fillable = [
        'name', 'slug', 'cover', 'description', 'menu_category_id', 'restaurant_id'
    ];

    public function dishes() {
        return $this->belongsToMany('App\Dish', 'dish_menu')
        ->withTimestamps();
    }

    public function category() {
        return $this->belongsTo('App\MenuCategory', 'menu_category_id');
    }

    public function restaurant() {
        return $this->belongsTo('App\Restaurant');
    }
}
