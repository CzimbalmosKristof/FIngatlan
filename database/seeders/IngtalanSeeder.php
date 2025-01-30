<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngtalanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoriak')->insert([
            ['nev' => 'Ház'],
            ['nev' => 'Lakás'],
            ['nev' => 'építési telek'],
            ['nev' => 'Garázs'],
            ['nev' => 'Mezőgazdasági terület'],
            ['nev' => 'Ipari ingtalan'],
        ]);
        DB::table('ingatlanok')->insert([
            [
                'kategoria' => 1,
                'leiras' => 'Családi ház omaldozó', 
                'hirdetesDatuma'=>'2025-01-15',
                'tehermentes'=>true,
                'ar'=>450000,
                'kepUrl' => 'https://ingatlanok.hu/65874.jpg'
            ],
            [
                'kategoria' => 2,
                'leiras' => '4. emeleti lakás',
                'hirdetesDatuma'=>'2025-01-20',
                'tehermentes'=>false,
                'ar'=>1800000,
                'kepUrl' => 'https://ingatlanok.hu/65875.jpg'
            ],
        ]);
    }
}
