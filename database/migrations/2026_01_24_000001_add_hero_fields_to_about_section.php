<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('about_section', function (Blueprint $table) {
            $table->string('hero_title')->nullable()->after('image');
            $table->text('hero_description')->nullable()->after('hero_title');
            $table->string('hero_button_text')->nullable()->after('hero_description');
            $table->string('hero_button_link')->nullable()->after('hero_button_text');
            $table->string('hero_image')->nullable()->after('hero_button_link');
        });
    }

    public function down(): void
    {
        Schema::table('about_section', function (Blueprint $table) {
            $table->dropColumn(['hero_title', 'hero_description', 'hero_button_text', 'hero_button_link', 'hero_image']);
        });
    }
};
