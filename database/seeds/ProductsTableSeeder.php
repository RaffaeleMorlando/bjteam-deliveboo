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
       $products = [
         //prodotti ristorante id=1 (da id 1 a id 13)
         [
           "restaurant_id" => 1,
           "name" => "Marinara",
           "slug" => "marinara",
           "image" => "",
           "description" => "pomodoro, aglio e origano",
           "price" => 3.80,
           "is_vegetarian" => 1,
           "is_glutenfree" => 0,
         ],
         [
           "restaurant_id" => 1,
           "name" => "Margherita",
           "slug" => "margherita",
           "image" => "",
           "description" => "pomodoro e mozzarella",
           "price" => 4.50,
           "is_vegetarian" => 1,
           "is_glutenfree" => 0,
         ],
         [
           "restaurant_id" => 1,
           "name" => "Margherita con funghi",
           "slug" => "margherita-con-funghi",
           "image" => "",
           "description" => "pomodoro, mozzarella e funghi champignon",
           "price" => 5.00,
           "is_vegetarian" => 1,
           "is_glutenfree" => 0,
         ],
         [
           "restaurant_id" => 1,
           "name" => "Crostino",
           "slug" => "crostino",
           "image" => "",
           "description" => "mozzarella e prosciutto cotto",
           "price" => 5.50,
           "is_vegetarian" => 0,
           "is_glutenfree" => 0,
         ],
         [
           "restaurant_id" => 1,
           "name" => "Napoli",
           "slug" => "napoli",
           "image" => "",
           "description" => "pomodoro, mozzarella e filetti di alici",
           "price" => 5.50,
           "is_vegetarian" => 0,
           "is_glutenfree" => 0,
         ],
         [
           "restaurant_id" => 1,
           "name" => "Diavola",
           "slug" => "diavola",
           "image" => "",
           "description" => "pomodoro, mozzarella e ventricina",
           "price" => 6.00,
           "is_vegetarian" => 0,
           "is_glutenfree" => 0,
         ],
         [
           "restaurant_id" => 1,
           "name" => "Bianca Boscaiola",
           "slug" => "bianca-boscaiola",
           "image" => "",
           "description" => "mozzarella, funghi champignon e salsiccia di Norcia",
           "price" => 6.00,
           "is_vegetarian" => 0,
           "is_glutenfree" => 0,
         ],
         [
           "restaurant_id" => 1,
           "name" => "Bianca ai 4 Formaggi",
           "slug" => "bianca-ai-4-formaggi",
           "image" => "",
           "description" => "mozzarella, gorgonzola DOP, provola affumicata e grana DOP",
           "price" => 6.00,
           "is_vegetarian" => 1,
           "is_glutenfree" => 0,
         ],
         [
           "restaurant_id" => 1,
           "name" => "Bianca Ortolana",
           "slug" => "bianca-ortolana",
           "image" => "",
           "description" => "mozzarella, funghi champignon, zucchine e melanzane grigliate",
           "price" => 6.00,
           "is_vegetarian" => 1,
           "is_glutenfree" => 1,
         ],
         [
           "restaurant_id" => 1,
           "name" => "Capricciosa",
           "slug" => "capricciosa",
           "image" => "",
           "description" => "pomodoro, mozzarella, carciofini, olive nere, funghi champignon, uovo sodo e prosciutto crudo",
           "price" => 6.50,
           "is_vegetarian" => 0,
           "is_glutenfree" => 1,
         ],
         [
           "restaurant_id" => 1,
           "name" => "Margherita Amatriciana",
           "slug" => "margherita-amatriciana",
           "image" => "",
           "description" => "pomodoro, mozzarella, pancetta e pecorino",
           "price" => 6.50,
           "is_vegetarian" => 0,
           "is_glutenfree" => 0,
         ],
         [
           "restaurant_id" => 1,
           "name" => "Supplì con Cacio e Pepe Artigianal",
           "slug" => "supplì-con-cacio-e-pepe-artigianal",
           "image" => "",
           "description" => "più leggero e croccante con farina di mais",
           "price" => 1.80,
           "is_vegetarian" => 1,
           "is_glutenfree" => 0,
         ],
         [
           "restaurant_id" => 1,
           "name" => "Supplì Chic",
           "slug" => "supplì-chic",
           "image" => "",
           "description" => "bianco con mozzarella e tartufo nero di norcia nuovo",
           "price" => 2.00,
           "is_vegetarian" => 1,
           "is_glutenfree" => 1,
         ],
       ];

       $productOrderArray = [
           //ordine singolo
           [
             "product_id" => 3,
             "order_id" => 1
           ],
           [
             "product_id" => 5,
             "order_id" => 1
           ],
           [
             "product_id" => 8,
             "order_id" => 1
           ],
           //ordine singolo
           [
             "product_id" => 12,
             "order_id" => 2
           ],
           [
             "product_id" => 11,
             "order_id" => 2
           ],
           //ordine singolo
           [
             "product_id" => 1,
             "order_id" => 3
           ],
           [
             "product_id" => 2,
             "order_id" => 3
           ],
           [
             "product_id" => 7,
             "order_id" => 3
           ],
           [
             "product_id" => 10,
             "order_id" => 3
           ],
           [
             "product_id" => 11,
             "order_id" => 3
           ],
           [
             "product_id" => 9,
             "order_id" => 3
           ],
           //ordine singolo
           [
             "product_id" => 13,
             "order_id" => 4
           ],
       ];

       foreach ($users as $user) {

           foreach ($products as $product) {
             $newProduct = new Product();

             $newProduct->fill($product)->save();

             foreach ($productOrderArray as $relation) {
               if ($relation["product_id"] === $newProduct->id) {

                 $newProduct->orders()->attach([$relation["order_id"]]);
               }
             }
           }
       }
    }
}
