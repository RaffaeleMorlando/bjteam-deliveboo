<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
      return view('customer.questions');
  }

  // Funzione per salvare le risposte delle domande
  public function saveQuestions(Request $request) {
    $data = $request->all();
    $user = Auth::user();
    $user->fill($data)->save();

    return redirect()->route("home");
  }
}
