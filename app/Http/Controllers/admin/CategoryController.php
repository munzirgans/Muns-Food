<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use File;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view("admin.category.index", ["category" => $category]);
    }
    public function add(){
        return view("admin.category.add");
    }
    public function store(Request $req){
        $this->validate($req, [
            "photo" => "required|image",
            "category" => "required|regex:/^[\pL\s\-]+$/u"
        ]);
        $photo = $req->file("photo");
        Category::create([
            "photo" => $photo->getClientOriginalName(),
            "category" => $req->input("category"),
        ]);
        $photo->move("assets/images/category", $photo->getClientOriginalName());
        return redirect()->route("admin.category");
    }
    public function edit($id){
        $c = Category::find($id);
        return view("admin.category.edit", ["c" => $c]);
    }
    public function update(Request $req, $id){
        if($req->has("photo")){
            $this->validate($req, [
                "photo" => "required|image",
                "category" => "required|regex:/^[\pL\s\-]+$/u",
            ]);
            $photo = $req->file("photo");
            $category = Category::find($id);
            File::delete("assets/images/category/".$category->photo);
            $category->photo = $photo->getClientOriginalName();
            $category->category = $req->input("category");
            $category->save();
            $photo->move("assets/images/category", $photo->getClientOriginalName());
            return redirect()->route("admin.category");
        }else{
            $this->validate($req, [
                "category" => "required|regex:/^[\pL\s\-]+$/u",
            ]);
            $category = Category::find($id);
            $category->category = $req->input("category");
            $category->save();
            return redirect()->route("admin.category");
        }
    }
    public function delete($id){
        Category::find($id)->delete();
        return redirect()->route("admin.category");
    }
}
