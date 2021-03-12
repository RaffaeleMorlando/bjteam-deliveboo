<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class RestaurantController extends Controller
{
    //Ritorna il form per registrazione ristorante
    public function create() {
        
        return view('admin.restaurants.create');

    }

    //Creazione e salvataggio nuovo ristorante
    public function store(Request $request) {

        $data = $request->all();

        $newRestaurant = new Restaurant();

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['name']);
        $newRestaurant->fill($data);
        $newRestaurant->save();

        return redirect()->route('admin.restaurants.dashboard');
    }
}
