<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Http\Requests\Orders\OrderRequest;

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
}


