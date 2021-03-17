<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\RestaurantCategory;
use App\Restaurant;
use App\User;
use App\Dish;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', $user_id)->first();
        // $restaurants = Restaurant::where('user_id', '=', $user_id);

        return view('admin.restaurants.index', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = RestaurantCategory::all();
        $user_id = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', $user_id)->first();

        return view('admin.restaurants.create', compact('categories','restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:512',
            'phone' => 'required|max:20',
            'email' => 'required|max:50|unique:restaurants,email',
            'address' => 'required',

        ]);

        $form_data = $request->all();
        $form_data['user_id'] = Auth::user()->id;
        $restaurant = new Restaurant();

        $slug = Str::slug($form_data['name']);

        if ($restaurant->slug != $slug) {
            $slug_base = $slug;
            $slug_check = Restaurant::where('slug', $slug)->first();

            $contatore = 1;
            while($slug_check) {
                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $slug_check = Restaurant::where('slug', $slug)->first();
            }

            $restaurant->slug = $slug;
        }

        if (array_key_exists('cover', $form_data)) {
            $img_path = Storage::put('images/users', $form_data['cover']);
            $form_data['cover'] = $img_path;
        };

        $restaurant->fill($form_data);

        $restaurant->save();

        $restaurant->categories()->sync($form_data['restaurant_category_id']);

        return redirect()->route('admin.restaurant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $catogories = RestaurantCategory::all();

        $restaurant = Restaurant::where('slug', $slug)->first();

        $restaurant_categories = [];

        foreach ($restaurant->categories as $category) {
            array_push($restaurant_categories, $category->id);
        }

        $data = [
            'restaurant' => $restaurant,
            'catogories' => $catogories,
            'restaurant_categories' => $restaurant_categories
        ];


        return view('admin.restaurants.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name' => 'required|max:50',
            'cover' => 'nullable|image|max:512',
            'phone' => 'required|max:20',
            'email' => 'required|max:50|unique:restaurants,email,'.$restaurant->id,
            'address' => 'required',
        ]);

        $form_data = $request->all();
        $restaurant->categories()->sync($form_data['restaurant_category_id']);

        $slug = Str::slug($form_data['name']);
        if ($restaurant->slug != $slug) {
            $slug_base = $slug;
            $slug_check = Restaurant::where('slug', $slug)->first();

            $contatore = 1;
            while($slug_check) {
                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $slug_check = Restaurant::where('slug', $slug)->first();
            }

            $restaurant->slug = $slug;
        }

        if (array_key_exists('cover', $form_data)) {
            $img_path = Storage::put('images/users', $form_data['cover']);
            $form_data['cover'] = $img_path;
        };

        $restaurant->fill($form_data);

        $restaurant->update();

        return redirect()->route('admin.restaurant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();

        $restaurant->delete();

        return redirect()->route('admin.restaurant.index');
    }
}
