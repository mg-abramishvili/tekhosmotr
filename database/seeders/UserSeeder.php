<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => '$2y$10$FOltn22eC0tUSVFcOp9ufu5nt6PGUvXBAzTKBA0wTgT.2cNWXHD8C',
        ]);
    }
}