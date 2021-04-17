<?php

namespace App\Http\Controllers\courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Address;

class DashboardController extends Controller
{
    public function index(){
        $order = Order::select("datetime", "user_id", "address_id", "courier_id")->groupBy('datetime', "user_id", "address_id", "courier_id")->where("courier_id", \Session::get("user")->id)->where("status_id", "2")->get();
        foreach($order as $o){
            $o->user = User::find($o->user_id);
            $o->address = Address::find($o->address_id);
        }
        $order2 = Order::select("datetime", "user_id", "address_id", "courier_id")->groupBy('datetime', "user_id", "address_id", "courier_id")->where("courier_id", \Session::get("user")->id)->where("status_id", "3")->get();
        foreach($order2 as $o2){
            $o2->user = User::find($o2->user_id);
            $o2->address = Address::find($o2->address_id);
        }
        return view('courier.dashboard.index', [
            "order" => $order,
            "order2" => $order2
        ]);
    }
    public function acc(Request $req){
        $order = Order::where("courier_id", $req->input("courier_id"))->where("datetime", $req->input("datetime"))->get();
        foreach($order as $o){
            $o->status_id = "3";
            $o->save();
        }
        return redirect()->route("courier.dashboard");
    }
}
