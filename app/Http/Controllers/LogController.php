<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\User;

class LogController extends Controller
{
    public function index(){
        return view("login");
    }
    public function index_register(){
        return view("register");
    }
    public function login(Request $req){
        $this->validate($req, [
            "email" => "required|email",
            "password" => "required"
        ]);
        $user = User::where("email", $req->input("email"))->first();
        if(isset($user)){
            if(Hash::check($req->input("password"),$user->password)){
                Session::put("user", $user);
                if($user->role_id == 1){
                    return redirect()->route("admin.dashboard");
                }else if($user->role_id == 3){
                    return redirect()->route("courier.dashboard");
                }else if($user->role_id == 2){
                    return redirect()->route("home");
                }
            }
            else{
                return view("login", ["msg" => "Wrong Email or Password"]);
            }
        }else{
            return view("login", ["msg" => "Wrong Email or Password"]);
        }
    }
    public function register(Request $req){
        $this->validate($req, [
            "email" => "required|email",
            "username" => "required|regex:/^[\pL\s\-]+$/u",
            "password" => "required|confirmed",
            "handphone" => "required|numeric"
        ]);
        User::create([
            "email" => $req->input("email"),
            "username" => $req->input("username"),
            "password" => Hash::make($req->input("password")),
            "handphone" => $req->input("handphone"),
            "role_id" => "2",
        ]);
        return redirect()->route("login.index");
    }
    public function logout(){
        Session::flush();
        return redirect()->route("login.index");
    }
}
