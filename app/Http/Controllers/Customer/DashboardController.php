<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
    public function questions(Request $request) {
      $data = $request->all();
      $user = Auth::user();
      $user->fill($data)->save();

      return redirect()->route("home");
    }

}
