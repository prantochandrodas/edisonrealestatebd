<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivacyPoliciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('privacy_policies')->insert([
            [
                'description' => 'This is our privacy policy. We are committed to protecting your privacy and ensuring that your personal information is handled in a safe and responsible manner.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more records if necessary
        ]);
    }
}
