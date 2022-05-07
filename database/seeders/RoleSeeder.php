<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles::create([
        //     "name" => "Super Admin"
        // ]);

        DB::table("role")->insert([
            [
                "name" => "Superadmin"
            ],
            [
                "name" => "Karyawan"
            ],
            [
                "name" => "Pengajar"
            ]
        ]);
    }
}
