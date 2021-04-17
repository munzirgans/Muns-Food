<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\Order;
use Carbon\Carbon;

class OrdersController extends Controller
{
    public function index(){
        $sedang_price = 0;
        $dalam_price = 0;
        $diterima_price = 0;
        $ditolak_price = 0;
        $sedang = Order::where("user_id", Session::get("user")->id)->where("status_id", "1")->get();
        foreach($sedang as $s){
            $sedang_price += $s->total_price;
        }
        $sedangs = Order::select("datetime", "user_id")->groupBy("datetime", "user_id")->where("user_id", Session::get("user")->id)->where("status_id", "1")->get();
        $dalam = Order::where("user_id", Session::get("user")->id)->where("status_id", "2")->get();
        foreach($dalam as $d){
            $dalam_price += $d->total_price;
        }
        $dalams = Order::select("datetime", "user_id")->groupBy("datetime", "user_id")->where("user_id", Session::get("user")->id)->where("status_id", "2")->get();
        $diterima = Order::where("user_id", Session::get("user")->id)->where("status_id", "3")->get();
        foreach($diterima as $d2){
            $diterima_price += $d2->total_price;
        }
        $diterimas = Order::select("datetime", "user_id")->groupBy("datetime", "user_id")->where("user_id", Session::get("user")->id)->where("status_id", "3")->get();
        $ditolak = Order::where("user_id", Session::get("user")->id)->where("status_id", "4")->get();
        foreach($ditolak as $d3){
            $ditolak_price += $d3->total_price;
        }
        $ditolaks = Order::select("datetime", "user_id")->groupBy("datetime", "user_id")->where("user_id", Session::get("user")->id)->where("status_id", "4")->get();
        return view("main.orders.index",[
            "sedang" => $sedang,
            "sedangs" => $sedangs,
            "dalam" => $dalam,
            "diterima" => $diterima,
            "ditolak" => $ditolak,
            "sedang_price" => $sedang_price,
            "dalams" => $dalams,
            'dalam_price' => $dalam_price,
            "diterimas" => $diterimas,
            "diterima_price"=> $diterima_price,
            "ditolaks" => $ditolaks,
            "ditolak_price" => $ditolak_price
        ]);
    }
    public function order(Request $req){
        $cart = Cart::where("user_id", Session::get("user")->id)->get();
        $now = Carbon::now();
        foreach($cart as $c){
            Order::create([
                "user_id" => Session::get("user")->id,
                "product_id" => $c->product_id,
                "address_id" => $req->input("address_id"),
                "status_id" => "1",
                "vendor_id" => $req->input("vendor_id"),
                "method_id" => $req->input("method_id"),
                "quantity" => $c->quantity,
                "total_price" => $c->total_price,
                "datetime" => $now
            ]);
            $c->delete();
        }
        return redirect()->route("orders");
    }
}
