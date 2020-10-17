<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @author Bekmurod Khujamuratov
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table("users")->insert([
            [
                "username" => "super_admin",
                "first_name" => "super_admin",
                "last_name" => "Khusinov",
                "role" => "super_admin",
                "phone" => "123",
                "email" => "super_admin@mail.ru",
                "password" => \Illuminate\Support\Facades\Hash::make("123456789"),
            ],
            [
                "username" => "shop_admin",
                "first_name" => "shopadmin",
                "last_name" => "shopadmin",
                "role" => "shop_admin",
                "phone" => "1234556",
                "email" => "shop_admin@mail.ru",
                "password" => \Illuminate\Support\Facades\Hash::make("123456789"),
            ],

            [
                "username" => "customer",
                "first_name" => "customer",
                "last_name" => "customer",
                "role" => "customer",
                "phone" => "991",
                "email" => "customer@mail.ru",
                "password" => \Illuminate\Support\Facades\Hash::make("123456789"),
            ]
        ]);
    }
}
