<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;

class MenuController extends Controller
{
    public function index(){
        $category = Category::orderBy("category", "asc")->get();
        foreach($category as $c){
            $c->product = Product::where("category_id", $c->id)->get();
        }
        return view("main.menu.index", ["category" => $category]);
    }
}
