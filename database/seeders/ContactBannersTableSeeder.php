<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactBannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contact_banners')->insert([
            [
                'title' => 'Contact Us',
                'image' => 'contact_banner_1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
