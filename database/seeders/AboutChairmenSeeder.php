<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AboutChairmenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_chairmen')->insert([
            'title' => 'Chairman Title',
            'name' => 'John Doe',
            'company_information' => 'Information about the company.',
            'chairman_information' => 'Information about the chairman.',
            'chairman_image' => 'path/to/chairman_image.jpg',
            'institute_logo' => 'path/to/institute_logo.png',
            'reference' => Str::random(10), // or any reference you prefer
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
