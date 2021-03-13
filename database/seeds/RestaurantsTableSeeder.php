<?php

use Illuminate\Database\Seeder;
// use Faker\Generator as Faker;
use App\Restaurant;
use Illuminate\Support\Str;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // for ($i=0; $i < 5; $i++) {
      //   $newRestaurant = new Restaurant();
      //   $newRestaurant->user_id = $i+1;
      //   $newRestaurant->name = $faker->company;
      //   $newRestaurant->slug = Str::slug($newRestaurant->name);
      //   $newRestaurant->phone = $faker->phoneNumber;
      //   $newRestaurant->address = $faker->address;
      //   $newRestaurant->lat = $faker->randomNumber();
      //   $newRestaurant->lon = $faker->randomNumber();
      //   $newRestaurant->p_iva = "12345678901";
      //   $newRestaurant->save();
      // }
      $restaurants = [
        [
          "user_id" => 1,
          "name" => "Pizza Lampo",
          "slug" => "pizza-lampo",
          "logo" => "",
          "address" => "Via Lodovico Pavoni, 80, Milano, 20019",
          "p_iva" => "10214930967",
          "phone" => "346-7493675",
          "lat" => "",
          "lon" => "",
        ],
      ];

      foreach ($restaurants as $restaurant) {
        $newRestaurant = new Restaurant();

        $newRestaurant->fill($restaurant)->save();
      }

    }
}
