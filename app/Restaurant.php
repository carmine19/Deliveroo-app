<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\RestaurantCategory;
use App\Dish;
use App\Order;
use App\Menu;


class Restaurant extends Model
{
    protected $fillable = [
        'name', 'user_id', 'slug', 'cover', 'address', 'phone', 'email'];

    public function users() {
        return $this->belongsTo('App\User');
    }

    public function categories() {
        return $this->belongsToMany('App\RestaurantCategory', 'category_restaurant')
        ->withTimestamps();
    }

    public function dishes() {
        return $this->hasMany('App\Dish');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function menus() {
        return $this->hasMany('App\Menu');
    }
}
