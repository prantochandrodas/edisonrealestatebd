<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projectypes')->insert([
            ['name' => 'Residential', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Commercial', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
