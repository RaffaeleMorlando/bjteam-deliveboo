<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.restaurants.orders.index', compact('orders'));
    }

    // Funzione per vista statistiche ordini
    public function chart()
    {
        $orders = Order::all();
        return view('admin.restaurants.orders.chart', compact('orders'));

    }
}
