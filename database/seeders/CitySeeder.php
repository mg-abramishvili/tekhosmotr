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
            'sort' => 1,
            ],
            [
            'city_code' => 'agidel',
            'city' => 'Агидель',
            'sort' => 1,
            ],
            [
            'city_code' => 'baimak',
            'city' => 'Баймак',
            'sort' => 1,
            ],
            [
            'city_code' => 'belebey',
            'city' => 'Белебей',
            'sort' => 1,
            ],
            [
            'city_code' => 'beloretsk',
            'city' => 'Белорецк',
            'sort' => 1,
            ],
            [
            'city_code' => 'birsk',
            'city' => 'Бирск',
            'sort' => 1,
            ],
            [
            'city_code' => 'blagoveschensk',
            'city' => 'Благовещенск',
            'sort' => 1,
            ],
            [
            'city_code' => 'davlekanovo',
            'city' => 'Давлеканово',
            'sort' => 1,
            ],
            [
            'city_code' => 'dyurtyuli',
            'city' => 'Дюртюли',
            'sort' => 1,
            ],
            [
            'city_code' => 'ishimbai',
            'city' => 'Ишимбай',
            'sort' => 1,
            ],
            [
            'city_code' => 'kumertau',
            'city' => 'Кумертау',
            'sort' => 1,
            ],
            [
            'city_code' => 'mezhgoryie',
            'city' => 'Межгорье',
            'sort' => 1,
            ],
            [
            'city_code' => 'meleuz',
            'city' => 'Мелеуз',
            'sort' => 1,
            ],
            [
            'city_code' => 'neftekamsk',
            'city' => 'Нефтекамск',
            'sort' => 1,
            ],
            [
            'city_code' => 'oktyabrskiy',
            'city' => 'Октябрьский',
            'sort' => 1,
            ],
            [
            'city_code' => 'priyutovo',
            'city' => 'Приютово',
            'sort' => 1,
            ],
            [
            'city_code' => 'salavat',
            'city' => 'Салават',
            'sort' => 1,
            ],
            [
            'city_code' => 'sibay',
            'city' => 'Сибай',
            'sort' => 1,
            ],
            [
            'city_code' => 'sterlitamak',
            'city' => 'Стерлитамак',
            'sort' => 1,
            ],
            [
            'city_code' => 'tuymazy',
            'city' => 'Туймазы',
            'sort' => 1,
            ],
            [
            'city_code' => 'uchaly',
            'city' => 'Учалы',
            'sort' => 1,
            ],
            [
            'city_code' => 'chishmy',
            'city' => 'Чишмы',
            'sort' => 1,
            ],
            [
            'city_code' => 'yanaul',
            'city' => 'Янаул',
            'sort' => 1,
            ],
        ]);
    }
}