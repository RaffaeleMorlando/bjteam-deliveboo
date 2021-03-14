<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Restaurant;



class DashboardController extends Controller
{
    public function index() {

        $restaurant = Auth::user()->restaurant;


        return view('admin.restaurants.dashboard', compact('restaurant'));

    }

    //cambiare il logo del ristorante
    public function changeLogo(Request $request, $id) {
      $data = $request->all();
      $restaurant = Restaurant::where("user_id", $id)->firstOrFail();
      //dd($data, $restaurant);

      $data["logo"] = Storage::disk("public")->put("images", $data["logo"]);
      $restaurant->update($data);

      return redirect()->route("admin.restaurants.dashboard");
    }
}
