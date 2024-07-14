<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvestorInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('investor_information')->insert([
            [
                'thumbnail_image' => 'path/to/thumbnail1.jpg',
                'video' => 'path/to/video1.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ]
            // Add more records as needed
        ]);
    }
}
