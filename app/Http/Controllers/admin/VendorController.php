<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor;

class VendorController extends Controller
{
    public function index(){
        $vendor = Vendor::all();

        return view("admin.vendor.index", ["vendor" => $vendor]);
    }
    public function add(){
        return view("admin.vendor.add");
    }
    public function store(Request $req){
        $this->validate($req,[
            "vendor" => "required|regex:/^[\pL\s\-]+$/u",
        ]);
        Vendor::create([
            "vendor" => $req->input("vendor")
        ]);
        return redirect()->route("admin.vendor");
    }
    public function edit($id){
        $v = Vendor::find($id);
        return view("admin.vendor.edit", ["v" => $v]);
    }
    public function update(Request $req, $id){
        $vendor = Vendor::find($id);
        $vendor->vendor = $req->input('vendor');
        $vendor->save();
        return redirect()->route("admin.vendor");
    }
    public function delete($id){
        Vendor::find($id)->delete();
        return redirect()->route("admin.vendor");
    }
}
