<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Admin::updateOrCreate(
            [
                "email" => "admin@mymetickets.com"],
            [
                "name" => "Mymetickets Admin",
                "password" => "Mymetickets@1100"
            ]
        );
    }
}
