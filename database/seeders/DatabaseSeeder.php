<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nama' => 'Resepsionis',
                'username' => 'resepsionis',
                'password' => Hash::make('admin123'),
                'role' => 'resepsionis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pelayanan',
                'username' => 'pelayanan',
                'password' => Hash::make('admin123'),
                'role' => 'pelayanan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Apoteker',
                'username' => 'apoteker',
                'password' => Hash::make('admin123'),
                'role' => 'apoteker',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Owner',
                'username' => 'owner',
                'password' => Hash::make('admin123'),
                'role' => 'owner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
