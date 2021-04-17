<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Product;
use App\Vendor;
use App\Address;
use App\Method;

class OrderController extends Controller
{
    public function index(){
        $order = Order::select("user_id", "datetime")->groupBy("user_id", "datetime")->where("status_id", "1")->get();
        $order2 = Order::select("user_id", "datetime")->groupBy("user_id", "datetime")->where("status_id", "2")->get();
        $order3 = Order::select("user_id", "datetime")->groupBy("user_id", "datetime")->where("status_id", "4")->get();
        foreach($order as $o){
            $o->user = User::find($o->user_id);
        }
        foreach($order2 as $o2){
            $o2->user = User::find($o2->user_id);
        }
        foreach($order3 as $o3){
            $o3->user = User::find($o3->user_id);
        }
        return view("admin.order.index", ["order" => $order, "order2" => $order2, "order3" => $order3]);
    }
    public function acc(Request $req){
        $order = Order::where("datetime", $req->input("datetime"))->get();
        foreach($order as $o){
            $o->product = Product::find($o->product_id);
        }
    }
    public function detail(Request $req){
        $order = Order::where("datetime", $req->input("datetime"))->get();
        $order2 = Order::where("datetime", $req->input("datetime"))->first();
        $order2->address = Address::find($order2->address_id)->address;
        $order2->method = Method::find($order2->method_id)->method;
        $courier = User::where("vendor_id", $order2->vendor_id)->get();
        foreach($order as $o){
            $o->product = Product::find($o->product_id);
        }
        return view("admin.order.acc",[
            "order" => $order,
            "order2" => $order2,
            "courier" => $courier
        ]);
    }
    public function selected(Request $req){
        $order = Order::where("datetime", $req->input("datetime"))->get();
        foreach($order as $o){
            $o->courier_id = $req->input("courier_id");
            $o->status_id = "2";
            $o->save();
        }
        return redirect()->route("admin.order");
    }
    public function cancel(Request $req){
        $order = Order::where("datetime", $req->input("datetime"))->get();
        foreach($order as $o){
            $o->status_id = "4";
            $o->save();
        }
        return redirect()->route('admin.order');
    }
}
