<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cats')->insert([
            [
            'title' => 'M1',
            'description' => '',
            ],
            [
            'title' => 'M2',
            'description' => '',
            ],
            [
            'title' => 'M3',
            'description' => '',
            ],
            [
            'title' => 'N1',
            'description' => '',
            ],
            [
            'title' => 'N2',
            'description' => '',
            ],
            [
            'title' => 'N3',
            'description' => '',
            ],
            [
            'title' => 'O1',
            'description' => '',
            ],
            [
            'title' => 'O2',
            'description' => '',
            ],
            [
            'title' => 'O3',
            'description' => '',
            ],
            [
            'title' => 'O4',
            'description' => '',
            ],
        ]);
    }
}