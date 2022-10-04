<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserRestaurantController extends Controller
{
  public function allRestaurant(){
    //   richiamo tutti gli utenti dal database
    $user = User::all();
        // dd($user);


    $data = [
        'success' => true,
        'results' => $user
    ];
    // espongo i dati in formato json
    return response()->json($data);
  }
}
