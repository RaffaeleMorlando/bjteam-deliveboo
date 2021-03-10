<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Restaurant;
use Illuminate\Support\Str;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 5; $i++) {
        $newRestaurant = new Restaurant();
        $newRestaurant->user_id = $i+1;
        $newRestaurant->name = $faker->company;
        $newRestaurant->slug = Str::slug($newRestaurant->name);
        $newRestaurant->phone = $faker->phoneNumber;
        $newRestaurant->address = $faker->address;
        $newRestaurant->lat = $faker->randomNumber();
        $newRestaurant->lon = $faker->randomNumber();
        $newRestaurant->p_iva = "12345678901";
        $newRestaurant->save();
      }
    }
}
