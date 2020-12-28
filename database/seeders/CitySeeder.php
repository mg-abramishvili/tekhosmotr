<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            [
            'city_code' => 'ufa',
            'city' => 'Уфа',
            ],
            [
            'city_code' => 'agidel',
            'city' => 'Агидель',
            ],
            [
            'city_code' => 'baimak',
            'city' => 'Баймак',
            ],
            [
            'city_code' => 'belebey',
            'city' => 'Белебей',
            ],
            [
            'city_code' => 'beloretsk',
            'city' => 'Белорецк',
            ],
            [
            'city_code' => 'birsk',
            'city' => 'Бирск',
            ],
            [
            'city_code' => 'blagoveschensk',
            'city' => 'Благовещенск',
            ],
            [
            'city_code' => 'davlekanovo',
            'city' => 'Давлеканово',
            ],
            [
            'city_code' => 'dyurtyuli',
            'city' => 'Дюртюли',
            ],
            [
            'city_code' => 'ishimbai',
            'city' => 'Ишимбай',
            ],
            [
            'city_code' => 'kumertau',
            'city' => 'Кумертау',
            ],
            [
            'city_code' => 'mezhgoryie',
            'city' => 'Межгорье',
            ],
            [
            'city_code' => 'meleuz',
            'city' => 'Мелеуз',
            ],
            [
            'city_code' => 'neftekamsk',
            'city' => 'Нефтекамск',
            ],
            [
            'city_code' => 'oktyabrskiy',
            'city' => 'Октябрьский',
            ],
            [
            'city_code' => 'priyutovo',
            'city' => 'Приютово',
            ],
            [
            'city_code' => 'salavat',
            'city' => 'Салават',
            ],
            [
            'city_code' => 'sibay',
            'city' => 'Сибай',
            ],
            [
            'city_code' => 'sterlitamak',
            'city' => 'Стерлитамак',
            ],
            [
            'city_code' => 'tuymazy',
            'city' => 'Туймазы',
            ],
            [
            'city_code' => 'uchaly',
            'city' => 'Учалы',
            ],
            [
            'city_code' => 'chishmy',
            'city' => 'Чишмы',
            ],
            [
            'city_code' => 'yanaul',
            'city' => 'Янаул',
            ],
        ]);
    }
}