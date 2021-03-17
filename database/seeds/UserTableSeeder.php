<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $new_user = new User();
            $new_user->company_name = $faker->company();
            $new_user->owner_name = $faker->firstName(null);
            $new_user->owner_lastname = $faker->lastName();
            $new_user->dob = $faker->date();
            $new_user->phone = $faker->phoneNumber();
            $new_user->password = strval($faker->randomNumber(8, true));
            $new_user->piva = strval(substr(str_shuffle("01234567891"), 0, 11));
            $new_user->iban = strval($faker->creditCardNumber());
            $new_user->city = $faker->city();
            $new_user->cap = $faker->postcode();
            $new_user->address = $faker->streetAddress();
            $new_user->email = $faker->email();
            $test = User::where('email', $new_user->email)->first();
            while ($test) {
                $new_user->email = $faker->email();
                $test = User::where('email', $new_user->email)->first();
            }
            $new_user->save();
        }
    }
}
