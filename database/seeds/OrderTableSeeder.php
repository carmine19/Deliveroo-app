<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Restaurant;
use Faker\Generator as Faker;

class OrderTableSeeder extends Seeder
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
            for ($i = 0; $i < 20; $i++) {
                $new_order = new Order();
                $new_order->restaurant_id = $restaurant->id;
                $new_order->name = $faker->firstName(null);
                $new_order->lastname = $faker->lastName();
                $new_order->email = $faker->email();
                $new_order->dob = $faker->date();
                $new_order->address = $faker->streetAddress();
                $new_order->phone = $faker->phoneNumber();
                $new_order->price = $faker->randomFloat(2, 0, 4);

                $order_code = Str::random(8);
                $test = Order::where('order_code', $order_code)->first();
                while($test){
                    $order_code = Str::random(8);
                    $test = Order::where('order_code', $order_code)->first();
                };
                $new_order->order_code = $order_code;
                $new_order->save();
            }
        }
    }
}
