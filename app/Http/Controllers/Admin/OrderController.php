<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.restaurants.orders.index');
    }

    
    
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('admin.restaurants.orders.show', compact('product'));

    }
}
