<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add hero_image to services_hero
        Schema::table('services_hero', function (Blueprint $table) {
            $table->string('hero_image')->nullable()->after('description');
        });

        // Add hero_image to industries_hero
        Schema::table('industries_hero', function (Blueprint $table) {
            $table->string('hero_image')->nullable()->after('description');
        });

        // Add hero_image to about_hero
        Schema::table('about_hero', function (Blueprint $table) {
            $table->string('hero_image')->nullable()->after('description');
        });

        // Add hero_image to careers_hero
        Schema::table('careers_hero', function (Blueprint $table) {
            $table->string('hero_image')->nullable()->after('button_link');
        });
    }

    public function down(): void
    {
        Schema::table('services_hero', function (Blueprint $table) {
            $table->dropColumn('hero_image');
        });

        Schema::table('industries_hero', function (Blueprint $table) {
            $table->dropColumn('hero_image');
        });

        Schema::table('about_hero', function (Blueprint $table) {
            $table->dropColumn('hero_image');
        });

        Schema::table('careers_hero', function (Blueprint $table) {
            $table->dropColumn('hero_image');
        });
    }
};
