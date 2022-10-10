<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Faker\Generator as Faker;

class OrdersController extends Controller
{
    public function index(Faker $faker) {
        
        $user = Auth::user();

        $user_orders = Order::with('products')->where('user_id', '=', $user->id)->orderBy('created_at', 'DESC')->get();

        $data = [
            'user' => $user,
            'user_orders' => $user_orders
        ];

        return view('admin.orders', $data);
    }
}
