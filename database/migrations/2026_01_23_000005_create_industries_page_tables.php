<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Industries Hero Section
        Schema::create('industries_hero', function (Blueprint $table) {
            $table->id();
            $table->string('badge')->default('Sectors We Serve');
            $table->string('heading');
            $table->text('description');
            $table->timestamps();
        });

        // Industries Intro Section
        Schema::create('industries_intro', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('description');
            $table->string('stat_1_number');
            $table->string('stat_1_label');
            $table->string('stat_2_number');
            $table->string('stat_2_label');
            $table->timestamps();
        });

        // Industry Cards
        Schema::create('industry_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->string('link')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Industries Why Section
        Schema::create('industries_why', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('description');
            $table->string('image');
            $table->timestamps();
        });

        // Why Items
        Schema::create('industries_why_items', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('description');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Industries CTA Section
        Schema::create('industries_cta', function (Blueprint $table) {
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
        Schema::dropIfExists('industries_why_items');
        Schema::dropIfExists('industries_why');
        Schema::dropIfExists('industry_cards');
        Schema::dropIfExists('industries_intro');
        Schema::dropIfExists('industries_hero');
        Schema::dropIfExists('industries_cta');
    }
};
