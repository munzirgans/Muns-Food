<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Address;

class AddressController extends Controller
{
    public function index(){
        $address = Address::where("user_id", Session::get("user")->id)->get();
        return view("main.address.index", ["address" => $address]);
    }
    public function add(){
        return view("main.address.add");
    }
    public function store(Request $req){
        Address::create([
            "user_id" => Session::get("user")->id,
            "address" => $req->input("address"),
        ]);
        return redirect()->route("address");
    }
    public function edit($id){
        $address = Address::find($id);
        return view("main.address.edit", ["address" => $address]);
    }
    public function update(Request $req, $id){
        $address = Address::find($id);
        $address->address = $req->input("address");
        $address->save();
        return redirect()->route("address");
    }
    public function delete($id){
        Address::find($id)->delete();
        return redirect()->route("address");
    }
}
