<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {

        $allOrders = Order::all();
        $orders = [];

        foreach ($allOrders as $order) {
          foreach ($order->products as $product) {

            if ($product->restaurant_id === Auth::user()->restaurant->id && !in_array($order, $orders)) {
              $orders[] = $order;
              
            }
          }
        }

        return view('admin.restaurants.orders.index', compact('orders'));
    }

    // Funzione per vista statistiche ordini
    public function chart()
    {
        $orders = Order::all();
        return view('admin.restaurants.orders.chart', compact('orders'));

    }
}
