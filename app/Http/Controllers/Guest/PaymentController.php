<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree;
use Illuminate\Support\Facades\Session;
use App\Order;

class PaymentController extends Controller
{

    public function formPayment(Request $request) {
        
        $order = Session::get('order');

        //Otteniamo tutti i dati dal carrello
        $dataCart = $request->all();

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
          ]);
        
        $token = $gateway->ClientToken()->generate();

        return view('guests.payment', compact('dataCart','token', 'order'));
    }

    public function checkout(Request $request) {
        
        $data = $request->all();
        $data["order_number"] = '#'.rand(10000, 99999);  
        
        
        $newOrder = new Order();
        $newOrder->fill($data);
        $newOrder->save();
        

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
    
        $total_price = $request->total_price;
        $nonce = $request->payment_method_nonce;
    
        $result = $gateway->transaction()->sale([
            'amount' => $total_price,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => 'Enrico',
                'lastName' => 'Rombaldoni',
                'email' => 'ultimoavengers@avengers.com',
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
    
        if ($result->success) {
            $transaction = $result->transaction;
            // header("Location: transaction.php?id=" . $transaction->id);
    
            // return back()->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);
    
            return redirect()->route('home')->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);
        } else {
            $errorString = "";
    
            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
    
            // $_SESSION["errors"] = $errorString;
            // header("Location: index.php");
            return back()->withErrors('An error occurred with the message: '.$result->message);
        }
    }

    public function hosted( ) {

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
    
        $token = $gateway->ClientToken()->generate();
    
        return view('hosted', [
            'token' => $token
        ]);

    }

}
