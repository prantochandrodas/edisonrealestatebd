<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectLocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('project_locations')->insert([
            ['name' => 'Bashundhara R/A', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tejgaon', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Khilgaon', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Uttara', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'North Dhanmondi, Dhaka', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jalshiri Abashon', 'created_at' => now(), 'updated_at' => now()],
        ]);
        
    }
}
