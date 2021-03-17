<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Menu;

class MenuCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    protected $table = 'menu_categories';

    public function menus() {
        return $this->hasMany('App\Menu');
    }
}
