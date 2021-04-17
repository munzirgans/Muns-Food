<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Product;

class DashboardController extends Controller
{
    public function index(){
        $user = count(User::where("role_id", "2")->get());
        $courier = count(User::where("role_id", "3")->get());
        $product = count(Product::all());
        return view("admin.dashboard.index", [
            "user" => $user,
            "courier" => $courier,
            "product" => $product
        ]);
    }
}
