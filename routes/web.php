<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", "main\HomeController@index")->name("home");
Route::get("menu", "main\MenuController@index")->name('menu');
Route::get("category/{id}", "main\CategoryController@index")->name("category");
Route::get("product/{id}", "main\ProductController@index")->name("product");

Route::group(["middleware" => "LoggedMiddleware"],function(){
    Route::get("/login", "LogController@index")->name("login.index");
    Route::get("/register", "LogController@index_register")->name("register.index");
    Route::post("/login", "LogController@login")->name("login.login");
    Route::post("/regist", "LogController@register")->name("register.register");
});

Route::group(["middleware" => "LoginMiddleware"],function(){
    Route::get("logout", "LogController@logout")->name("login.logout");
    Route::prefix("order")->group(function(){
        Route::get("/", "main\OrderController@index")->name("order");
    });
    Route::prefix("orders")->group(function(){
        Route::get("/", "main\OrdersController@index")->name("orders");
        Route::post("order", "main\OrdersController@order")->name("orders.order");
    });
    Route::prefix("profile")->group(function(){
        Route::get("/", "main\ProfileController@index")->name("profile");
        Route::post("update", "main\ProfileController@update")->name("profile.update");
        Route::prefix("address")->group(function(){
            Route::get("/", "main\AddressController@index")->name("address");
            Route::get("add", "main\AddressController@add")->name("address.add");
            Route::get("edit/{id}", "main\AddressController@edit")->name("address.edit");
            Route::post("update/{id}", "main\AddressController@update")->name("address.update");
            Route::post("store", "main\AddressController@store")->name("address.store");
            Route::get("delete/{id}", "main\AddressController@delete")->name("address.delete");
        });
        //
    });
    Route::prefix("cart")->group(function(){
        Route::get("/", "main\CartController@index")->name("cart");
        Route::post("store", "main\CartController@store")->name("cart.store");
        Route::get("edit/{id}", "main\CartController@edit")->name("cart.edit");
        Route::post("update/{id}", "main\CartController@update")->name("cart.update");
        Route::get("delete/{id}", "main\CartController@delete")->name("cart.delete");
    });
    Route::prefix("courier")->group(function(){
        Route::get("/", "courier\DashboardController@index")->name('courier.dashboard');
        Route::post("accept", "courier\DashboardController@acc")->name("courier.acc");
    });
    Route::prefix("admin")->group(function(){
        Route::get("/", "admin\DashboardController@index")->name("admin.dashboard");
        Route::prefix("order")->group(function(){
            Route::get("/", "admin\OrderController@index")->name("admin.order");
            Route::post("detail", "admin\OrderController@detail")->name("admin.order.detail");
            Route::post("selected", "admin\OrderController@selected")->name('admin.order.selected');
            Route::post("cancel", "admin\OrderController@cancel")->name("admin.order.cancel");
        });
        Route::prefix("category")->group(function(){
            Route::get("/", "admin\CategoryController@index")->name("admin.category");
            Route::get("add", "admin\CategoryController@add")->name("admin.category.add");
            Route::post("store", "admin\CategoryController@store")->name("admin.category.store");
            Route::get("edit/{id}", "admin\CategoryController@edit")->name("admin.category.edit");
            Route::post("update/{id}", "admin\CategoryController@update")->name("admin.category.update");
            Route::get("delete/{id}", "admin\CategoryController@delete")->name("admin.category.delete");
        });
        Route::prefix("product")->group(function(){
            Route::get("/", "admin\ProductController@index")->name("admin.product");
            Route::get("add", "admin\ProductController@add")->name("admin.product.add");
            Route::post("store", "admin\ProductController@store")->name("admin.product.store");
            Route::get("edit/{id}", "admin\ProductController@edit")->name("admin.product.edit");
            Route::post("update/{id}", "admin\ProductController@update")->name("admin.product.update");
            Route::get("delete/{id}", "admin\ProductController@delete")->name("admin.product.delete");
        });
        Route::prefix("courier")->group(function(){
            Route::get("/", "admin\CourierController@index")->name("admin.courier");
            Route::get("add", "admin\CourierController@add")->name("admin.courier.add");
            Route::get("edit/{id}", "admin\CourierController@edit")->name("admin.courier.edit");
            Route::post("store", "admin\CourierController@store")->name("admin.courier.store");
            Route::post("update/{id}", "admin\CourierController@update")->name("admin.courier.update");
            Route::get("delete/{id}", "admin\CourierController@delete")->name("admin.courier.delete");
        });
        Route::prefix("vendor")->group(function(){
            Route::get("/", "admin\VendorController@index")->name("admin.vendor");
            Route::get("add", "admin\VendorController@add")->name('admin.vendor.add');
            Route::post("store", "admin\VendorController@store")->name("admin.vendor.store");
            Route::get("edit/{id}", "admin\VendorController@edit")->name("admin.vendor.edit");
            Route::post("update/{id}", "admin\VendorController@update")->name("admin.vendor.update");
            Route::get("delete/{id}", "admin\VendorController@delete")->name("admin.vendor.delete");
        });
    });
});
