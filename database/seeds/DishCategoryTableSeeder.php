<?php

use Illuminate\Database\Seeder;
use App\DishCategory;
use Faker\Generator as Faker;

class DishCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = config('dish_categories.categories');

        for ($i=0; $i < count($categories); $i++) {
            $new_dish_category = new DishCategory();
            $new_dish_category->name = $categories[$i];
            $new_dish_category->description = $faker->paragraph(5, false);

            $slug = Str::slug($new_dish_category->name);
            $slug_base = $slug;
            $test = DishCategory::where('slug', $slug)->first();

            $counter = 1;
            while($test) {
                $slug = $slug_base . '-' . $counter;
                $counter++;
                $test = DishCategory::where('slug', $slug)->first();
            }
            $new_dish_category->slug = $slug;
            $new_dish_category->save();
        }
    }
}
