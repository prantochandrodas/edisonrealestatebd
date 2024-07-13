<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('about_us_information', function (Blueprint $table) {
            $table->longText('long_description')->after('short_description')->nullable()->change();
            $table->string('thumbnail_image')->nullable()->after('long_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us_information', function (Blueprint $table) {
            $table->dropColumn('thumbnail_image');
            $table->longText('long_description')->after('updated_at')->nullable()->change();
        });
    }
};
