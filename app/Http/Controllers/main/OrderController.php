<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Vendor;
use App\Method;
use App\Address;

class OrderController extends Controller
{
    public function index(){
        $cart = Cart::where("user_id", \Session::get("user")->id)->get();
        $vendor = Vendor::all();
        $method = Method::all();
        $address = Address::where("user_id", \Session::get("user")->id)->get();
        $total_price = 0;
        foreach($cart as $c){
            $c->product = Product::find($c->product_id);
            $total_price += $c->total_price;
        }
        return view('main.order.index', ["cart" => $cart, "total_price" => $total_price, "vendor" => $vendor, "method" => $method, "address" => $address]);
    }
}
