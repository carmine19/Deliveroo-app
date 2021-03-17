<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\RestaurantCategory;
use App\MenuCategory;
use App\Restaurant;
use App\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $user_restaurant = Auth::user()->restaurants;

        if ($user_restaurant->contains('slug', $slug)) {
            $user_id = Auth::user()->id;
            $restaurant = Restaurant::where('slug', $slug)->first();
            $menus = Menu::where('restaurant_id', $restaurant->id)->get();

            return view('admin.menus.index', compact('menus', 'restaurant'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($restaurant_slug)
    {
        $user_restaurant = Auth::user()->restaurants;

        $test = $restaurant_slug;

        if ($user_restaurant->contains('slug', $restaurant_slug)) {
            $user_id = Auth::user()->id;
            $categories = MenuCategory::all();
            $restaurant = Restaurant::where('slug', $restaurant_slug)->first();

            return view('admin.menus.create', compact('categories', 'restaurant'));

        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $restaurant_slug)
    {
        $request->validate([
            'name' => 'required|max:50',
            'cover' => 'nullable|image|max:512',
            'description' => 'required|max:255'
        ]);

        $restaurant = Restaurant::where('slug', $restaurant_slug)->first();

        $form_data = $request->all();
        $form_data['restaurant_id'] = $restaurant->id;

        // dd($form_data);

        $menu = new Menu();

        $slug = Str::slug($form_data['name']);
        $slug_base = $slug;
        $slug_check = Menu::where('slug', $slug)->first();

        $contatore = 1;
        while($slug_check) {
            $slug = $slug_base . '-' . $contatore;
            $contatore++;
            $slug_check = Menu::where('slug', $slug)->first();
        }

        $menu->slug = $slug;

        if (array_key_exists('cover', $form_data)) {
            $img_path = Storage::put('images/users', $form_data['cover']);
            $form_data['cover'] = $img_path;
        };

        $menu->fill($form_data);

        $menu->save();

        return redirect()->route('admin.menu.index', ['restaurant' => $restaurant_slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($restaurant_slug, $menu_slug)
    {
        $user_restaurant = Auth::user()->restaurants;

        if ($user_restaurant->contains('slug', $restaurant_slug)) {
            $user_id = Auth::user()->id;
            $menu = Menu::where('slug', $menu_slug)->first();

            return view('admin.menus.show', compact('menu'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($restaurant_slug, $menu_slug)
    {

        $user_restaurant = Auth::user()->restaurants;

        if ($user_restaurant->contains('slug', $restaurant_slug)) {
            $categories = MenuCategory::all();
            $restaurant = Restaurant::where('slug', $restaurant_slug)->first();
            $menu = Menu::where('slug', $menu_slug)->first();

            $data = [
                'restaurant' => $restaurant,
                'categories' => $categories,
                'menu' => $menu
            ];

            return view('admin.menus.edit', $data, ['restaurant' => $restaurant_slug, 'menu' => $menu_slug]);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $restaurant_slug, $menu_slug)
    {
        $request->validate([
            'name' => 'required|max:50',
            'cover' => 'nullable|image|max:512',
        ]);

        $restaurant = Restaurant::where('slug', $restaurant_slug)->first();
        $menu = Menu::where('slug', $menu_slug)->first();

        $form_data = $request->all();
        $form_data['restaurant_id'] = $restaurant->id;

        $slug = Str::slug($form_data['name']);
        if ($menu_slug != $slug) {
            $slug_base = $slug;
            $slug_check = Menu::where('slug', $slug)->first();

            $contatore = 1;
            while($slug_check) {
                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $slug_check = Menu::where('slug', $menu_slug)->first();
            }

            $menu->slug = $slug;
        }

        if (array_key_exists('cover', $form_data)) {
            $img_path = Storage::put('images/users', $form_data['cover']);
            $form_data['cover'] = $img_path;
        };

        $menu->fill($form_data);

        $menu->update();

        return redirect()->route('admin.menu.index', ['restaurant'=> $restaurant_slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($restaurant_slug, $menu_slug)
    {
        $user_restaurant = Auth::user()->restaurants;

        if ($user_restaurant->contains('slug', $restaurant_slug)) {
            $menu = Menu::where('slug', $menu_slug)->first();

            $menu->delete();
            return redirect()->route('admin.menu.index', ['restaurant' => $restaurant_slug]);
        } else {
            abort(404);
        }
    }
}
