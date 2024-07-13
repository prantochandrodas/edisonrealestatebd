<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

         // Call the AboutChairmenSeeder
        //  $this->call(AboutChairmenSeeder::class);
        //  $this->call(AboutUsBannersSeeder::class);
         $this->call(AboutUsInformationSeeder::class);
        // $this->call(PrivacyPoliciesSeeder::class);
        // $this->call(ProjectCategoriesSeeder::class,);
        // $this->call(ProjectTypesSeeder::class,);
        // $this->call(ProjectLocationsSeeder::class,);
        
    }
}
