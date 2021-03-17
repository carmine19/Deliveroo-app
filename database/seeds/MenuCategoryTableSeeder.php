<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\MenuCategory;
use App\Restaurant;

class MenuCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = config('menu_categories.categories');

        for ($i=0; $i < count($categories); $i++) {
            $new_menu_category = new MenuCategory();
            $new_menu_category->name = $categories[$i];

            $slug = Str::slug($new_menu_category->name);
            $slug_base = $slug;
            $test = MenuCategory::where('slug', $slug)->first();
            $counter = 1;
            while($test) {
                $slug = $slug_base . '-' . $counter;
                $counter++;
                $test = MenuCategory::where('slug', $slug)->first();
            }
            $new_menu_category->slug = $slug;
            $new_menu_category->save();
        }
    }
}
