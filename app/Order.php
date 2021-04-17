<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=["datetime","user_id", "courier_id", "product_id", "address_id", "status_id", "vendor_id", "method_id", "total_price", "quantity"];
}

