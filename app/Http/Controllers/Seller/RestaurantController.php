<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
      return view('seller.questions');
  }

  // Funzione per salvare le risposte delle domande
  public function saveQuestions(Request $request) {
    $data = $request->all();

    $newRestaurant = new Restaurant();
    $newRestaurant->user_id = Auth::id();
    $newRestaurant->fill($data)->save();

    return redirect()->route("home");
  }

}
