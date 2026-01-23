<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Services Hero Section
        Schema::create('services_hero', function (Blueprint $table) {
            $table->id();
            $table->string('badge')->default('Our Expertise');
            $table->string('heading');
            $table->text('description');
            $table->timestamps();
        });

        // Service Details (IT Consultancy, Software Dev, IoT, AI, Training)
        Schema::create('service_details', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('nav_title');
            $table->string('heading');
            $table->text('description');
            $table->string('image');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Service Features (checkmark items under each service)
        Schema::create('service_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_detail_id')->constrained('service_details')->onDelete('cascade');
            $table->string('feature_text');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Services CTA Section
        Schema::create('services_cta', function (Blueprint $table) {
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
        Schema::dropIfExists('service_features');
        Schema::dropIfExists('service_details');
        Schema::dropIfExists('services_hero');
        Schema::dropIfExists('services_cta');
    }
};
