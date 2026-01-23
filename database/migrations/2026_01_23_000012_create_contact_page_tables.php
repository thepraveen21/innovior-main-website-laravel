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
        // Contact Hero Section
        Schema::create('contact_hero', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('description');
            $table->string('background_image')->nullable();
            $table->timestamps();
        });

        // Contact Info Section
        Schema::create('contact_info', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('description');
            $table->timestamps();
        });

        // Contact Info Cards
        Schema::create('contact_info_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('icon_color'); // blue, purple, red, etc.
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Contact Form Settings
        Schema::create('contact_form_settings', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('submit_button_text')->default('Send Message');
            $table->string('success_message')->default('Thank you! Your message has been sent successfully.');
            $table->timestamps();
        });

        // Contact Map Section
        Schema::create('contact_map', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('map_embed_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_map');
        Schema::dropIfExists('contact_form_settings');
        Schema::dropIfExists('contact_info_cards');
        Schema::dropIfExists('contact_info');
        Schema::dropIfExists('contact_hero');
    }
};
