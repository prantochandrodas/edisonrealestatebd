<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandownerDescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('landowner_descriptions')->insert([
            [
                'title' => 'About Landowners',
                'description' => 'This section provides detailed information about landowners and their roles in the property market. It includes insights into land ownership, management practices, and opportunities for collaboration with developers.',
                'image' => 'sdfj',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
