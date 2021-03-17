<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dish;
use App\Restaurant;
use App\DishCategory;
use App\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', $user_id)->first();
        $dishes = Dish::where('restaurant_id', $restaurant->id)->get();
        $data = [
            'dishes' => $dishes,
            'restaurant' => $restaurant
        ];
        return view('admin.dishes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $dishes = Dish::all();
        $categories = DishCategory::all();
        $user_id = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', $user_id)->first();

        $data = [
            'restaurant' => $restaurant,
            'dishes' => $dishes,
            'categories' => $categories,

        ];
        return view('admin.dishes.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request, Dish $dish)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'ingredients' => 'nullable',
            'price' => 'required|max:9',
            'restaurant_id' => 'nullable|exists:restaurants,id',
            'dish_category_id' => 'nullable|exists:dish_categories,id',
            'cover' => 'nullable|image|max:512'
        ]);


        $form_data = $request->all();
        $form_data['restaurant_id'] = Auth::user()->restaurants->id;
        $new_dish = new Dish();

        if ($form_data['name'] != $dish->name) {
            $slug = Str::slug($form_data['name']);
            $slug_base = $slug;
            $dish_presente = Dish::where('slug', $slug)->first();
            $contatore = 1;

            while ($dish_presente) {
                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $dish_presente = Dish::where('slug', $slug)->first();
            }
            $form_data['slug'] = $slug;
        }

        if (array_key_exists('cover', $form_data)) {
            $img_path = Storage::put('images/users', $form_data['cover']);
            $form_data['cover'] = $img_path;
        };


        $new_dish->fill($form_data);
        $new_dish->save();

        return redirect()->route('admin.dish.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {

        $dishes = Dish::where('slug', $slug)->first();
        $user_id = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', $user_id)->first();

        if ($dishes) {
            $data = [
                'dishes' => $dishes,
                'restaurant' => $restaurant,
            ];
            return view('admin.dishes.show', $data);
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {

        $categories = DishCategory::all();
        $dishes = Dish::where('slug', $slug)->first();
        $user_id = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', $user_id)->first();


        if ($dishes) {
            $data = [
                'dishes' => $dishes,
                'categories' => $categories,
                'restaurant' => $restaurant,
            ];

            return view('admin.dishes.edit', $data);
        }
        abort(404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Dish $dish)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'nullable|string',
            'price' => 'required|max:9',
            'restaurant_id' => 'nullable|exists:restaurant,id',
            'dish_category_id' => 'nullable|exists:dish_categories,id',
            'cover' => 'nullable|image|max:512'
        ]);

        $form_data = $request->all();

        if ($form_data['name'] != $dish->name) {
            $slug = Str::slug($form_data['name']);
            $slug_base = $slug;
            $dish_presente = Dish::where('slug', $slug)->first();
            $contatore = 1;

            while ($dish_presente) {
                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $dish_presente = Dish::where('slug', $slug)->first();
            }
            $form_data['slug'] = $slug;
        }

        if (array_key_exists('cover', $form_data)) {
            $img_path = Storage::put('images/users', $form_data['cover']);
            $form_data['cover'] = $img_path;
        };

        $dish->update($form_data);

        return redirect()->route('admin.dish.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Dish $dish)
    {
        $dish->menus()->sync([]);
        $dish->delete();

        return redirect()->route('admin.dish.index');
    }
}
