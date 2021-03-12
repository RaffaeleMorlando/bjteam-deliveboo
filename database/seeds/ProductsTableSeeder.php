<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use FakerRestaurant\Restaurant;
use Illuminate\Support\Str;
use App\Product;
use App\User;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
       $users = User::all();

       $faker = \Faker\Factory::create();
       $faker->addProvider(new \FakerRestaurant\Provider\it_IT\Restaurant($faker));


       foreach ($users as $user) {

           for ($i=0; $i < 5; $i++) {

               $newProduct = new Product();
               $newProduct->restaurant_id = $user->id;
               $newProduct->name = $faker->foodName();
               $newProduct->slug = Str::slug($newProduct->name);
               $newProduct->image = $faker->imageUrl(640, 480, 'food');
               $newProduct->description = $faker->dairyName();
               $newProduct->price = $faker->randomFloat(2,0,99);

               $newProduct->save();
           }
       }
    }
}
