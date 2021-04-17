<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index($id){
        $product = Product::find($id);
        return view("main.product.index", ["product" => $product]);
    }
}
