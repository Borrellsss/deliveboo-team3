<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Http\Requests\Orders\OrderRequest;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class OrderController extends Controller
{
    public function generate(Request $request,Gateway $gateway) {

       // Genero il token
       $token = $gateway->clientToken()->generate();

       $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data,200);
    }

    public function makePayment(OrderRequest $request,Gateway $gateway) {

        // Simulo una transazione, passandogli nella vendita un importo e un token che il frontend
        // invierà in risposta alla chiamata API makePayment
        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => 'fake-valid-nonce',
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if($result->success) {
            $data = [
                'success' => true,
                'message' => "Transazione eseguita con Successo!"
            ];
            return response()->json($data,200);
        }else {
            $data = [
                'success' => false,
                'message' => "Transazione Fallita!"
            ];
            return response()->json($data,401);
        }
    }

    public function store(Request $request, Faker $faker) {

        // salvo i dati dell'utente
        // $data = $request->all();
        
        // Salvo in una variabile ogni singolo dato
        // $order_cart = $data['order_cart'];
        // $customer_name = $data['order_customerName'];
        // $customer_email = $data['order_customerEmail'];
        // $customer_phone = $data['order_customerPhoneNumber'];
        // $customer_address = $data['order_customerAddress'];

        // Salvo in una variabile la query raw con  tutti gli numeri ordine dalla tabella "orders" 
        $sql_query = 'SELECT order_number FROM orders';
        // e salvo in una variabile tutti i numeri ordine selezionati
        $order_numbers = DB::select($sql_query);
        
        $order_number_array = [];
  
        for($i = 0; $i < count($order_numbers); $i++) {
            $order_number_array[] = $order_numbers[$i]->order_number;
        }
       

        $start_condition = true;
        $order_number;

        while ($start_condition) {
            // genero un numero casuale unico per il numero d'ordine
            $order_number = $faker->numberBetween(100000000000000, 999999999999999);
            // Se il numero d'ordine è non presente nel l'array dei numeri d'ordine
            if(!in_array($order_number, $order_number_array)) {
                $start_condition = false;
            } 
        }

        $validator = Validator::make($data, [
            'customer_name' => 'required|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone_number' => 'required|max:30',
            'address' => 'required|max:60000'
        ]);

        return response()->json();
    }
}


