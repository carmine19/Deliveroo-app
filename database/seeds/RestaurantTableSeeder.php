<?php

use Illuminate\Database\Seeder;
use App\Restaurant;
use App\RestaurantCategory;
use App\User;
use Faker\Generator as Faker;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();

        foreach ($users as $user) {
            for ($i = 0; $i < 2; $i++) {
                $new_rest = new Restaurant();
                $new_rest->name = $faker->company();
                $new_rest->user_id = $user->id;
                $new_rest->slug = $faker->title;
                $new_rest->cover = $faker->imageUrl(640, 480, 'food', true);
                $new_rest->phone = $faker->phoneNumber();
                $new_rest->email = $faker->email();
                $new_rest->address = $faker->streetAddress();
                $slug = Str::slug($new_rest->name);
                $slug_base = $slug;
                $slug_presente = Restaurant::where('slug', $slug)->first();
                $contatore = 1;
                while($slug_presente) {
                    $slug = $slug_base . '-' . $contatore;
                    $contatore++;
                    $slug_presente = Restaurant::where('slug', $slug)->first();
                }
                $new_rest->slug = $slug;

                $new_rest->save();

                $categories_counter = RestaurantCategory::all()->count();
                $categories = RestaurantCategory::all()->pluck('id')->take(1);
                $new_rest->categories()->attach($categories);
            };
        }
    }
}
