<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Session;

class ProfileController extends Controller
{
    public function index(){
        $user = User::find(Session::get("user")->id);
        return view("main.profile.index", ["user" => $user]);
    }
    public function update(Request $req){
        $user = User::find(Session::get("user")->id);
        $user->username = $req->input("username");
        $user->email = $req->input("email");
        $user->handphone = $req->input("handphone");
        $user->save();
        return redirect()->route("profile");
    }
}
