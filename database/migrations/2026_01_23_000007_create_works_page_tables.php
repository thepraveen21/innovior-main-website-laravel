<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Works Hero Section
        Schema::create('works_hero', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->default('Our Works');
            $table->text('description')->nullable();
            $table->string('background_image')->nullable();
            $table->timestamps();
        });

        // Project Categories (for filter)
        Schema::create('project_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Projects
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('project_categories')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('client')->nullable();
            $table->string('duration')->nullable();
            $table->string('link')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Works Stats Section
        Schema::create('works_stats', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->default('Our Impact');
            $table->timestamps();
        });

        // Works Stat Items
        Schema::create('works_stat_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('works_stats_id')->constrained('works_stats')->onDelete('cascade');
            $table->string('icon_svg')->nullable();
            $table->string('color')->default('blue'); // blue, purple, red, green
            $table->string('number');
            $table->string('label');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Works CTA Section
        Schema::create('works_cta', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->default('Ready to Transform Your Business?');
            $table->text('description')->nullable();
            $table->string('button_text')->default('Start Your Project');
            $table->string('button_link')->default('/contact');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('works_cta');
        Schema::dropIfExists('works_stat_items');
        Schema::dropIfExists('works_stats');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('project_categories');
        Schema::dropIfExists('works_hero');
    }
};
