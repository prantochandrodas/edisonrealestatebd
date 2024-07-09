<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsBannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_us_banners')->insert([
            [
                'title' => 'Banner Title',
                'image' => 'path/to/banner_image1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
