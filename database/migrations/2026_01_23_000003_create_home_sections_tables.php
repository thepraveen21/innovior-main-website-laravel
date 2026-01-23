<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // About Section
        Schema::create('about_section', function (Blueprint $table) {
            $table->id();
            $table->string('sub_heading')->default('Who We Are');
            $table->string('heading')->default('Building Long-Term Value Through Innovation');
            $table->text('paragraph_1');
            $table->text('paragraph_2')->nullable();
            $table->string('stat_1_number')->default('50+');
            $table->string('stat_1_label')->default('Projects');
            $table->string('stat_2_number')->default('100%');
            $table->string('stat_2_label')->default('Success');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // Services
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('icon')->nullable();
            $table->string('link')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Process Steps
        Schema::create('process_steps', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Stats Banner
        Schema::create('stats_banner', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('label');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // CTA Section
        Schema::create('cta_section', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('description');
            $table->string('button_text');
            $table->string('button_link');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_section');
        Schema::dropIfExists('services');
        Schema::dropIfExists('process_steps');
        Schema::dropIfExists('stats_banner');
        Schema::dropIfExists('cta_section');
    }
};
