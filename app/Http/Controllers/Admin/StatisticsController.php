<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StatisticsController extends Controller
{
    public function index() {
        
        $user = Auth::user();

        $user_orders = Order::with('products')
        ->where('user_id', '=', $user->id)
        ->groupBy(function($val) {
            return Carbon::parse($val->created_at)->format('Y');
        });

        foreach($user_orders as $order) {
            $order->created_at = Carbon::parse($order->created_at);
            $order->new_date = $order->created_at->format('m/Y');
        }

        $data = [
            'user' => $user,
            'user_orders' => $user_orders
        ];

        return view('admin.statistics', $data);
    }
}
