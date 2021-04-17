<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ["photo","username","email", "password", "vendor_id", "role_id", "handphone"];
}
