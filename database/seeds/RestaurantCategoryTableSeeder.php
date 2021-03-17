<?php

use Illuminate\Database\Seeder;
use App\RestaurantCategory;
use Faker\Generator as Faker;

class RestaurantCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

      $categories_array = [ //categorie definite a livello globale dal gestore del sito

          'tutte' => 'images/restaurant_categories/all.png',
          'italiano' => 'images/restaurant_categories/italian.png',
          'giapponese' => 'images/restaurant_categories/japanese.png',
          'cinese' => 'images/restaurant_categories/chinese.png',
          'americano' => 'images/restaurant_categories/american.png',
          'pizza' => 'images/restaurant_categories/pizza.png',
          'pesce' => 'images/restaurant_categories/seafood.png',
          'sushi' => 'images/restaurant_categories/sushi.png',
          'vegano' => 'images/restaurant_categories/vegan.png',
          'fastfood' => 'images/restaurant_categories/fastfood.png',
          
      ];

        $categories = array_values($categories_array);
        $categories_values = array_keys($categories_array);

        for ($i = 0; $i < count($categories); $i++) {
            $new_rest = new RestaurantCategory();
            $new_rest->name = $categories_values[$i];
            $new_rest->cover = $categories[$i];

            // $test = RestaurantCategory::where('name', $new_rest->name)->first();
            // while ($test) {
            //     $new_rest->name = $faker->words(1, true);
            //     $test = RestaurantCategory::where('name', $new_rest->name)->first();
            // };
            $new_rest->save();
        }
    }
}
