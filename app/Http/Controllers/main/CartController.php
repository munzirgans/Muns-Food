<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Cart;
use App\Product;
use App\Order;

class CartController extends Controller
{
    public function index(){
        $cart = Cart::where("user_id", Session::get("user")->id)->get();
        $total_price = 0;
        foreach($cart as $c){
            $c->product = Product::find($c->product_id);
            $total_price += $c->total_price;
        }
        return view("main.cart.index", ["cart" => $cart, "total_price" => $total_price]);
    }
    public function store(Request $req){
        $user_id = Session::get("user")->id;
        $product = Product::find($req->input("product_id"));
        Cart::create([
            "user_id" => $user_id,
            "product_id" => $req->input("product_id"),
            "quantity" => $req->input("quantity"),
            "total_price" => ($req->input("quantity") * $product->price),
        ]);
        return redirect()->route("home");
    }
    public function edit($id){
        $c = Cart::find($id);
        return view("main.cart.edit", ["c" => $c]);
    }
    public function update(Request $req, $id){
        $this->validate($req,[
            "quantity" => "required|numeric"
        ]);
        $cart = Cart::find($id);
        $cart->quantity = $req->input("quantity");
        $cart->total_price = $req->input("quantity") * Product::find($cart->product_id)->price;
        $cart->save();
        return redirect()->route("cart");
    }
    public function delete($id){
        Cart::find($id)->delete();
        return redirect()->route("cart");
    }
}
