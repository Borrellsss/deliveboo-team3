<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;


class ProductController extends Controller
{
    public function restaurantMenu($id){

        // richiamo i prodotti dal database e gli assegno una quesry che li seleziona solo se la colonna user_id che si trova in product presenta lo stesso id
        $product = Product::where('user_id', '=', $id)->get();
        dd($product);
        
        // li inserisco in un $data
        $data = [
            'success' => true,
            'results' => $product
        ];
        
        // trasferisco i dati in formato json
        return response()->json($data);
    }
}
