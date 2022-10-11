<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index() {
        
        $user = Auth::user();

        $sql_query = 'SELECT COUNT(id) as orders_per_month, created_at FROM orders  WHERE user_id = ' . $user->id . ' GROUP BY month(created_at) ORDER BY created_at DESC';

        

        $user_orders = DB::select($sql_query);

        $orders_per_month = [];

        $order_by_month_year = [];

        foreach($user_orders as $order) {
            $orders_per_month[] = $order->orders_per_month;

            $order_by_month_year[] = Carbon::create($order->created_at)->format('m/Y');
        }

        $chart_types = ['bar', 'doughnut', 'pie', 'line', 'polarArea', 'radar',];

        $data = [
            'user' => $user,
            'chart_types' => $chart_types,
            'orders_per_month' => $orders_per_month,
            'order_by_month_year' => $order_by_month_year,
        ];

        return view('admin.statistics', $data);
    }
}
