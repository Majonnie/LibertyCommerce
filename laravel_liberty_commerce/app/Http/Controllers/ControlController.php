<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ControlController extends Controller
{
    public function userNumber() {
        $users = User::count();
        return response()->json($users);
    }

    public function orderNumber() {
        $orders = Order::count();
        return response()->json($orders);
    }

    public function biggestOrder() {
        $order = DB::table('orders_has_products')->select('order_id')
        ->groupBy('order_id')
        ->orderByRaw('COUNT(*) DESC')
        ->first();
        $biggest = DB::table('orders')->where('id', $order->order_id)->first();
        $user = DB::table('users')->where('id', $biggest->user_id)->first();
        return response()->json([$biggest, $user]);
    }
}
