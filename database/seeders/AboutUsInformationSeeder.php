<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_us_information')->insert([
            [
                'title' => 'Welcome to Our Company',
                'short_description' => 'We strive to deliver the best service to our customers.',
                'long_description' => 'Our company was founded with the mission to provide outstanding services in the field of parcel delivery. Over the years, we have grown significantly and expanded our reach globally. We are committed to maintaining high standards and continuously improving our services to meet the needs of our customers.',
                'thumbnail_image' => 'path/to/banner_image1.jpg',
                'video_url' => 'https://www.example.com/intro-video',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more records if necessary
        ]);
    }
}
