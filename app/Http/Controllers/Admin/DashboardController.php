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

      //prendo il ristorante corrispondente all'utente loggato
      $restaurant = Restaurant::where("user_id", $id)->firstOrFail();

      // rimuovo la vecchia immagine del logo
      Storage::disk('public')->delete($restaurant->logo);

      // aggiorno l'immagine del logo del ristorante
      $data["logo"] = Storage::disk("public")->put("images", $data["logo"]);
      $restaurant->update($data);

      return redirect()->route("admin.restaurants.dashboard");
    }
}
