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
      $restaurants = [
        [
          "id" => 1,
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

      $restaurantCategoryArray = [
        [
          "restaurant_id" => 1,
          "category_id" => 31,
        ],
        [
          "restaurant_id" => 1,
          "category_id" => 40,
        ],
        [
          "restaurant_id" => 1,
          "category_id" => 44,
        ],
        [
          "restaurant_id" => 1,
          "category_id" => 58,
        ],
      ];


      foreach ($restaurants as $restaurant) {
        $newRestaurant = new Restaurant();
        $newRestaurant->fill($restaurant)->save();

        foreach ($restaurantCategoryArray as $relation) {
          if ($relation["restaurant_id"] === $newRestaurant->id) {

            $newRestaurant->categories()->attach([$relation["category_id"]]);
          }
        }

      }

    }
}
