<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;



class DashboardController extends Controller
{
    public function index() {

        $restaurant = Auth::user()->restaurant;


        return view('admin.restaurants.dashboard', compact('restaurant'));

    }
}
