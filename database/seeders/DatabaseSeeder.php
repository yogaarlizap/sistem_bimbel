<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(1)->create();
        Siswa::factory(10)->create();
        // $this->call(
        //     [
        //         UserSeeder::class,
        //         RoleSeeder::class,
        //     ]
        // );
    }
}
