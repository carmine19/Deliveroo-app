<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Menu;
use App\MenuCategory;
use App\Restaurant;

class MenuTableSeeder extends Seeder
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
            for ($i = 0; $i < 5; $i++) {

                $new_menu = new Menu();
                $new_menu->name = $faker->words(1, true);
                $new_menu->menu_category_id = MenuCategory::all()->pluck('id')->random();
                $new_menu->restaurant_id = $restaurant->id;
                $new_menu->slug = $faker->title;
                $new_menu->cover = $faker->imageUrl(640, 480, 'food', true);
                $new_menu->description = $faker->paragraph();
                $slug = Str::slug($new_menu->name);
                $slug_base = $slug;
                $slug_presente = Menu::where('slug', $slug)->first();
                $contatore = 1;
                while($slug_presente) {
                    $slug = $slug_base . '-' . $contatore;
                    $contatore++;
                    $slug_presente = Menu::where('slug', $slug)->first();
                }
                $new_menu->slug = $slug;
                $new_menu->save();
            };
        }
    }
}
