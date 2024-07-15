<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DreamTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dream_teams')->insert([
            [
                'image' => 'image1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
            // Add more entries as needed
        ]);
    }
}
