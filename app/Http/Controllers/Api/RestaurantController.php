<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Dish;

class RestaurantController extends Controller
{
    public function restaurants_by_category(Request $request){
        $category = $request->all()['category'];

        if ($category == 'tutte') {
          // code...
          $restaurants = Restaurant::all();
        }else{
          $restaurants = Restaurant::whereHas('categories', function($query) use($category){
            $query->where('name', $category);
          })->get();
        }

        return response()->json([
            'success'=> true,
            'category'=> $category,
            'restaurants' => $restaurants
        ]);
    }

    public function dishes_by_restaurant_menu(Request $request){
        $restaurant_id = $request->all()['restaurant_id'];
        $menu_id = $request->all()['menu_id'];
        $dishes_by_restaurant_menu = Dish::where('restaurant_id', $restaurant_id)->whereHas('menus', function($query) use($menu_id){
            $query->where('menu_id', $menu_id);
        })->get();


        return response()->json([
            'success'=> true,
            'restaurant_id' => $restaurant_id,
            'menu_id' => $menu_id,
            'dishes_by_restaurant_menu'=> $dishes_by_restaurant_menu
        ]);
    }
}
