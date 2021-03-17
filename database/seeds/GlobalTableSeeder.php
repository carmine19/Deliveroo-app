<?php

use Illuminate\Database\Seeder;

class GlobalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // UserTableSeeder::class,
            RestaurantCategoryTableSeeder::class,
            // RestaurantTableSeeder::class,
            // OrderTableSeeder::class,
            DishCategoryTableSeeder::class,
            // MenuCategoryTableSeeder::class,
            // MenuTableSeeder::class,
            // DishTableSeeder::class,
        ]);
    }
}
