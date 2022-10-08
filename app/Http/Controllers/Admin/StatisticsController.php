<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    public function index() {
        
        $user = Auth::user();

        $data = [
            'user' => $user
        ];

        return view('admin.statistics', $data);
    }
}