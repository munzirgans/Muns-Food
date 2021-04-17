<?php

use Illuminate\Database\Seeder;
use App\Method;

class MethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Method::create([
            "method" => "Cash On Delivery",
        ]);
        Method::create([
            "method" => "OVO",
        ]);
        Method::create([
            "method" => "Go-Pay",
        ]);
        Method::create([
            "method" => "Bank BCA",
        ]);
        Method::create([
            "method" => "Bank Mandiri",
        ]);

    }
}
