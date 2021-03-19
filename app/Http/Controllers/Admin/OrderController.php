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
        $prodotti = Product::where('restaurant_id', Auth::user()->restaurant->id)->get();
        foreach ($prodotti as $prodotto) {
           $orders = $prodotto->orders;
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
