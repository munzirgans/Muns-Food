<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function index($id){
        $category = Category::find($id);
        $category->product = Product::where("category_id", $category->id)->get();
        return view("main.category.index", ["category" => $category]);
    }
}
