<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // About Hero Section
        Schema::create('about_hero', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle')->default('Our Story');
            $table->string('heading')->default('About Innovior');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // About Overview Section
        Schema::create('about_overview', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->default('Who We Are');
            $table->text('description')->nullable();
            $table->string('button_text')->default('Work With Us');
            $table->string('button_link')->default('#contact');
            $table->string('stat1_number')->default('100+');
            $table->string('stat1_label')->default('Projects Delivered');
            $table->string('stat2_number')->default('50+');
            $table->string('stat2_label')->default('Happy Clients');
            $table->string('stat3_number')->default('15+');
            $table->string('stat3_label')->default('Team Members');
            $table->string('stat4_number')->default('5+');
            $table->string('stat4_label')->default('Years Experience');
            $table->timestamps();
        });

        // Mission, Vision, Values
        Schema::create('about_mvv', function (Blueprint $table) {
            $table->id();
            $table->string('mission_title')->default('Our Mission');
            $table->text('mission_description')->nullable();
            $table->string('mission_icon')->default('fas fa-bullseye');
            $table->string('vision_title')->default('Our Vision');
            $table->text('vision_description')->nullable();
            $table->string('vision_icon')->default('fas fa-eye');
            $table->string('values_title')->default('Our Values');
            $table->text('values_description')->nullable();
            $table->string('values_icon')->default('fas fa-heart');
            $table->timestamps();
        });

        // Why Choose Innovior Section
        Schema::create('about_why', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->default('Why Choose Innovior');
            $table->string('subtitle')->default('We bring more than just code to the table.');
            $table->timestamps();
        });

        // Why Choose Items
        Schema::create('about_why_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_why_id')->constrained('about_why')->onDelete('cascade');
            $table->string('icon')->default('fas fa-check');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Team & Culture Section
        Schema::create('about_culture', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->default('Our Team & Culture');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Culture Highlights
        Schema::create('about_culture_highlights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_culture_id')->constrained('about_culture')->onDelete('cascade');
            $table->string('title');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Offices Section
        Schema::create('about_offices', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->default('Our Presence');
            $table->string('subtitle')->default('Connecting with clients locally and globally.');
            $table->timestamps();
        });

        // Office Locations
        Schema::create('about_office_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_offices_id')->constrained('about_offices')->onDelete('cascade');
            $table->string('icon')->default('fas fa-map-marker-alt');
            $table->string('title');
            $table->string('role')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->string('contact1_icon')->nullable();
            $table->string('contact1_text')->nullable();
            $table->string('contact2_icon')->nullable();
            $table->string('contact2_text')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Partners Section
        Schema::create('about_partners', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->default('Strategic Partners');
            $table->string('subtitle')->default('Collaborating with industry leaders to deliver world-class solutions.');
            $table->timestamps();
        });

        // Partner Items
        Schema::create('about_partner_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_partners_id')->constrained('about_partners')->onDelete('cascade');
            $table->string('icon')->default('fas fa-handshake');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_partner_items');
        Schema::dropIfExists('about_partners');
        Schema::dropIfExists('about_office_locations');
        Schema::dropIfExists('about_offices');
        Schema::dropIfExists('about_culture_highlights');
        Schema::dropIfExists('about_culture');
        Schema::dropIfExists('about_why_items');
        Schema::dropIfExists('about_why');
        Schema::dropIfExists('about_mvv');
        Schema::dropIfExists('about_overview');
        Schema::dropIfExists('about_hero');
    }
};
