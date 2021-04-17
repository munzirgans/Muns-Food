<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use File;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        foreach($product as $p){
            $p->category = Category::find($p->category_id)->category;
        }
        return view("admin.product.index", ["product" => $product]);
    }
    public function add(){
        $category = Category::all();
        return view("admin.product.add", ["category" => $category]);
    }
    public function store(Request $req){
        $this->validate($req, [
            "photo" => "required|image",
            "name" => "required|regex:/^[\pL\s\-]+$/u",
            "description" => "required|regex:/^[\pL\s\-]+$/u",
            "category_id" => "required",
            "stock" => "required|numeric",
            "price" => "required|numeric",
            "star" => "required|numeric",
        ]);
        $photo = $req->file("photo");
        Product::create([
            "photo" => $photo->getClientOriginalName(),
            "name" => $req->input("name"),
            "description" => $req->input("description"),
            "category_id" => $req->input("category_id"),
            "price" => $req->input("price"),
            "stock" => $req->input("stock"),
            "star" => $req->input("star"),
        ]);
        $photo->move("assets/images/products", $photo->getClientOriginalName());
        return redirect()->route("admin.product");
    }
    public function edit($id){
        $p = Product::find($id);
        $category = Category::all();
        $p->category = Category::find($p->category_id);
        return view("admin.product.edit", ["p" => $p, "category" => $category]);
    }
    public function update(Request $req, $id){
        if($req->has("photo")){
            $this->validate($req, [
                "photo" => "required|image",
                "name" => "required|regex:/^[\pL\s\-]+$/u",
                "description" => "required",
                "category_id" => "required",
                "price" => "required|numeric",
                "stock" => "required|numeric",
                "star" => "required|numeric",
            ]);
            $photo = $req->file("photo");
            $product = Product::find($id);
            File::delete("assets/images/products/".$product->photo);
            $product->photo = $photo->getClientOriginalName();
            $product->name = $req->input("name");
            $product->description = $req->input("description");
            $product->category_id = $req->input("category_id");
            $product->stock = $req->input("stock");
            $product->price = $req->input("price");
            $product->star = $req->input("star");
            $product->save();
            $photo->move("assets/images/products/", $photo->getClientOriginalName());
            return redirect()->route("admin.product");
        }else{
            $this->validate($req, [
                "name" => "required|regex:/^[\pL\s\-]+$/u",
                "description" => "required",
                "category_id" => "required|numeric",
                "price" => "required|numeric",
                "stock" => "required|numeric",
                "star" => "required|numeric",
            ]);
            $product = Product::find($id);
            $product->name = $req->input("name");
            $product->description = $req->input("description");
            $product->category_id = $req->input("category_id");
            $product->stock = $req->input("stock");
            $product->price = $req->input("price");
            $product->star = $req->input("star");
            $product->save();
            return redirect()->route("admin.product");
        }
    }
    public function delete($id){
        Product::find($id)->delete();
        return redirect()->route("admin.product");
    }
}

