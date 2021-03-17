<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Restaurant;
use App\DishCategory;
use App\Dish;
use App\Menu;

class DishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            for ($i=0; $i < 2; $i++) {
                $new_dish = new Dish();
                $new_dish->name = $faker->words(3, true);
                $new_dish->description = $faker->paragraph(5, false);
                $new_dish->ingredients = $faker->words(10, true);
                $new_dish->cover = $faker->imageUrl(640, 480, 'food', true);
                $new_dish->price = $faker->randomFloat(2, 0, 4);
                $new_dish->visibility = $faker->numberBetween(0, 1);

                $new_dish->restaurant_id = $restaurant->id;
                $new_dish->dish_category_id = DishCategory::all()->pluck('id')->random();

                $slug = Str::slug($new_dish->name);
                $slug_base = $slug;
                $test = Dish::where('slug', $slug)->first();

                $counter = 1;
                while($test) {
                    $slug = $slug_base . '-' . $counter;
                    $counter++;
                    $test = Dish::where('slug', $slug)->first();
                }
                $new_dish->slug = $slug;

                $new_dish->save();

                $menus = Menu::where('restaurant_id', $restaurant->id)->pluck('id')->random();
                $new_dish->menus()->attach($menus);
            }
        }
    }
}
