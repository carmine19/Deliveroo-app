<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RestaurantCategory;
use App\Restaurant;

class HomeController extends Controller
{

    public function index(){

        $restaurant_categories = RestaurantCategory::all();
        $restaurants = Restaurant::all();

        return view('guest.index', compact('restaurant_categories', 'restaurants'));
    }

    public function contacts(){

        return view('guest.contacts');
    }

    public function about(){

        return view('guest.about');
    }

    public function faq(){

        return view('guest.faq');
    }
}
