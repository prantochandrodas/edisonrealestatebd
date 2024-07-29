<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandownerBannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('landowner_banners')->insert([
            [
                'title' => 'Landowner Banner 1',
                'image' => 'landowner_banner_1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
