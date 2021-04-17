<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "photo" => "donald.jpg",
            "email" => "munzirmz36@gmail.com",
            "username" => "Muhammad Munzir",
            "handphone" => "081220304127",
            "password" => Hash::make("munzirdev"),
            "role_id" => '1',
        ]);
        User::create([
            "photo" => "donald.jpg",
            "email" => "munzirzoldyck09@yahoo.co.id",
            "username" => "Munzir",
            "handphone" => "081220304127",
            "password" => Hash::make("munzirdev"),
            "role_id" => '2',
        ]);
    }
}
