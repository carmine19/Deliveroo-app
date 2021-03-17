<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Dish;
use App\DishCategory;
// use App\Menu;
use App\User;

class RestaurantController extends Controller
{
    public function show($slug){
        // dd($slug);
        $restaurant = Restaurant::where('slug', $slug)->first();
        // dd($restaurant->dishes);
        // dd($restaurant->id);
        if ($restaurant) {

          // $menus = Menu::where('restaurant_id', $restaurant->id)->get()->unique('menu_category_id');
          // $dishes = $restaurant->dishes;
          $dishes_category = DishCategory::all();
          // dd($dishes);

            return view('guest.restaurant', ['slug'=> $restaurant->slug], compact('restaurant','dishes_category'));
            // return view('guest.restaurant', ['slug'=> $restaurant->slug], compact('restaurant'));Category
        } else {
            abort(404);
        }
    }
}
