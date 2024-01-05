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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->float('currentLat')->nullable();
            $table->float('currentLng')->nullable();
            $table->integer('region_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('district')->nullable();
            $table->string('street')->nullable();
            $table->integer('ads_type')->nullable();
            $table->string('license_id')->nullable();
            $table->integer('street_type')->nullable();
            $table->integer('face_type')->nullable();
            $table->float('width')->nullable();
            $table->integer('age')->nullable();
            $table->integer('rooms')->nullable();
            $table->integer('halls')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('flats')->nullable();
            $table->integer('ads_direction')->nullable();
            $table->integer('floors')->nullable();
            $table->integer('stores_number')->nullable();
            $table->string('phone')->nullable();
            $table->string('country_code')->nullable();
            $table->string('question_1')->nullable();
            $table->string('question_2')->nullable();
            $table->string('question_3')->nullable();
            $table->string('link')->nullable();
            $table->string('phone_2')->nullable();
            $table->float('price')->nullable();
            $table->string('location')->nullable();
            $table->boolean('seen')->default(1)->nullable();
            $table->foreignId('user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
