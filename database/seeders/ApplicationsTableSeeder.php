<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('applications')->insert([
            'company_name' => 'Putul Properties Limited',
            'email' => 'info@putulproperties.com',
            'address' => 'Road 10, House 517/3, Baridhara DOHS, Dhaka 1206, Bangladesh',
            'hotline' => '01310817493',
            'logo' => '1722059464_.png',
            'map' => null,
            'footer_bg_image' => 'footer_bg_1.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
