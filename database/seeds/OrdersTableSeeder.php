<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $orders = [
        [
          "order_number" => "#00001",
          "total_price" => 16.50,
          "created_at" => "2020-03-12 19:47:42",
          "updated_at" => "2020-03-12 19:47:42",
        ],
        [
          "order_number" => "#00002",
          "total_price" => 8.30,
          "created_at" => "2021-04-12 19:47:42",
          "updated_at" => "2021-04-12 19:47:42",
        ],
        [
          "order_number" => "#00003",
          "total_price" => 33.30,
          "created_at" => "2020-01-12 19:47:42",
          "updated_at" => "2020-01-12 19:47:42",
        ],
        [
          "order_number" => "#00004",
          "total_price" => 2,
          "created_at" => "2019-06-12 19:47:42",
          "updated_at" => "2019-06-12 19:47:42",
        ],

      ];

      foreach ($orders as $order) {
        $newOrder = new Order();
        $newOrder->fill($order)->save();

      }
    }
}
