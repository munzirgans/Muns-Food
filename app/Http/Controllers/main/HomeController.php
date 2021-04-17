<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class HomeController extends Controller
{
    public function index(){
        $category = Category::all();
        return view("main.home.index", ["category" => $category]);
    }
}
