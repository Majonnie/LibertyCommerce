<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class ControlController extends Controller
{
    public function userNumber() {
        $users = User::count();
        return response()->json($users, 200);
    }

    public function orderNumber() {

    }

    public function biggestOrder() {

    }
}
