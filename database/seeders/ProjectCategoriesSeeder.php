<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ProjectCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Ongoing', 'slug' => Str::slug('ongoing'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Upcoming', 'slug' => Str::slug('upcoming'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Completed', 'slug' => Str::slug('completed'), 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('project_categories')->insert($categories);
    }
}
