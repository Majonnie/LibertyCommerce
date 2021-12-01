<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    public function profile() {
        $products = DB::table('products')->get();
        $orders = DB::table('orders')->where('user_id', auth()->user()->id)->get();
        return view('profile', ['products' => $products, 'orders' => $orders]);
    }
}
