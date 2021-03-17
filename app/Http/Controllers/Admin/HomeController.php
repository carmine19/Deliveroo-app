<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Restaurant;

class HomeController extends Controller
{
    public function index() {

        // $restaurant = Restaurant::all();
        $user_id = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', $user_id)->first();

        // $data = [
        //     'restaurant' => $restaurant,
        // ];
        //
        // return view('admin.home', $data);
        return view('admin.home', compact('restaurant'));
    }



}
