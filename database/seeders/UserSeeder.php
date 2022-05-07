<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
            "name" => "SuperAdmin",
            "email" => "admin@admin.com",
            "role_id" => 1,
            "password" => Hash::make("admin123"),
            "photo_profile" => "public/images/user.png"
        ]);
    }
}
