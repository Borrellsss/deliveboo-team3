<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Product;

class UserRestaurantController extends Controller
{
  public function allRestaurant(){
    //   richiamo tutti gli utenti dal database
    $users = User::all();
    // dd($users);
    
    foreach($users as $user){
            
      if( $user->cover){
        $user->cover = asset('storage/' . $user->cover);	
      }
    }

    $data = [
        'success' => true,
        'results' => $users,
    ];

    // espongo i dati in formato json
    return response()->json($data);
  }
}
