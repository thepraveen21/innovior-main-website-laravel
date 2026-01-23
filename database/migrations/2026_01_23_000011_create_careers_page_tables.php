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
        // Careers Hero Section
        Schema::create('careers_hero', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->default('Careers at Innovior');
            $table->string('heading');
            $table->text('description');
            $table->string('button_text')->default('Explore Opportunities');
            $table->string('button_link')->default('#openings');
            $table->timestamps();
        });

        // Company Culture Section
        Schema::create('careers_culture', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('description');
            $table->timestamps();
        });

        // Culture Cards
        Schema::create('careers_culture_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Job Openings
        Schema::create('careers_openings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('job_type'); // Full-Time, Part-Time, Internship
            $table->string('location'); // On-site, Remote, Hybrid
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Why Join Section
        Schema::create('careers_why_section', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->timestamps();
        });

        // Why Join Items
        Schema::create('careers_why_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Hiring Process Section
        Schema::create('careers_process', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->timestamps();
        });

        // Process Steps
        Schema::create('careers_process_steps', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // CTA Section
        Schema::create('careers_cta', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('description');
            $table->string('email');
            $table->string('button_text');
            $table->string('button_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers_process_steps');
        Schema::dropIfExists('careers_process');
        Schema::dropIfExists('careers_why_items');
        Schema::dropIfExists('careers_why_section');
        Schema::dropIfExists('careers_openings');
        Schema::dropIfExists('careers_culture_cards');
        Schema::dropIfExists('careers_culture');
        Schema::dropIfExists('careers_cta');
        Schema::dropIfExists('careers_hero');
    }
};
