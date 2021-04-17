<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor;
use App\User;
use Illuminate\Support\Facades\Hash;

class CourierController extends Controller
{
    public function index(){
        $courier = User::where("role_id", '3')->get();
        foreach($courier as $c){
            $c->vendor = Vendor::find($c->vendor_id)->vendor;
        }
        return view("admin.courier.index", ["courier" => $courier]);
    }
    public function add(){
        $vendor = Vendor::all();
        return view("admin.courier.add", ["vendor" => $vendor]);
    }
    public function store(Request $req){
        $this->validate($req, [
            "photo" => "required|image",
            "username" => "required|regex:/^[\pL\s\-]+$/u",
            "email" => "required|email",
            "handphone" => "required|numeric",
            "vendor_id" => "required",
            "password" => "required|confirmed",
        ]);
        $photo = $req->file("photo");
        User::create([
            "photo" => $photo->getClientOriginalName(),
            "username" => $req->input("username"),
            "email" => $req->input("email"),
            "handphone" => $req->input("handphone"),
            "vendor_id" => $req->input("vendor_id"),
            "password" => Hash::make($req->input("password")),
            "role_id" => "3",
        ]);
        $photo->move("assets/images/users/courier", $photo->getClientOriginalName());
        return redirect()->route("admin.courier");
    }
    public function edit($id){
        $user = User::find($id);
        $vendor = Vendor::all();
        return view("admin.courier.edit", ["c" => $user, "vendor" => $vendor]);
    }
    public function update(Request $req, $id){
        if($req->has("photo")){
            $this->validate($req, [
                "photo" => "required|image",
                "username" => "required|regex:/^[\pL\s\-]+$/u",
                "email" => "required|email",
                "handphone" => "required|numeric",
                "vendor_id" => "required",
                "password" => "required|confirmed",
            ]);
            $photo = $req->file("photo");
            $user = User::find($id);
            \File::delete("assets/images/users/courier/".$user->photo);
            $user->photo = $photo->getClientOriginalName();
            $user->username = $req->input("username");
            $user->email = $req->input("email");
            $user->handphone = $req->input("handphone");
            $user->vendor_id = $req->input("vendor_id");
            $user->password = Hash::make($req->input("password"));
            $user->save();
            $photo->move("assets/images/users/courier", $photo->getClientOriginalName());
            return redirect()->route("admin.courier");
        }else{
            $this->validate($req, [
                "username" => "required|regex:/^[\pL\s\-]+$/u",
                "email" => "required|email",
                "vendor_id" => "required",
                "handphone" => "required|numeric",
                "password" => "required|confirmed",
            ]);
            $user = User::find($id);
            $user->username = $req->input("username");
            $user->vendor_id = $req->input("vendor_id");
            $user->email = $req->input("email");
            $user->handphone = $req->input("handphone");
            $user->password = Hash::make($req->input("password"));
            $user->save();
            return redirect()->route("admin.courier");
        }
    }
    public function delete($id){
        User::find($id)->delete();
        return redirect()->route("admin.courier");
    }
}
