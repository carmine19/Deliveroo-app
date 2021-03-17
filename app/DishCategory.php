<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Dish;

class DishCategory extends Model
{
    protected $fillable = [
        'name', 'slug', 'description'
    ];

    protected $table = 'dish_categories';

    public function dishes() {
        return $this->hasMany('App\Dish');
    }
}
