<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Category;



class RestaurantController extends Controller
{
    private $restaurantValidation = [
        'name' => 'required|max:100',
        'phone' => 'required|max:20',
        'address' => 'required',
        'p_iva' => 'required|max:11',
    ];
    //Ritorna il form per registrazione ristorante
    public function create() {

        $categories = Category::all();
        return view('admin.restaurants.create',compact('categories'));

    }

    //Creazione e salvataggio nuovo ristorante
    public function store(Request $request) {

        $data = $request->all();

        $request->validate($this->restaurantValidation);

        $newRestaurant = new Restaurant();

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['name']);
        $newRestaurant->fill($data);
        $newRestaurant->save();

        $newRestaurant->categories()->attach($data["categories"]);

        return redirect()->route('admin.restaurants.dashboard');
    }

}
