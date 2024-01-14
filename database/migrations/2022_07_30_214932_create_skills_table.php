<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->text('skill_1',25)->nullable();
            $table->integer('skill_1_percentage')->nullable();
            $table->text('skill_2',25)->nullable();
            $table->integer('skill_2_percentage')->nullable();
            $table->text('skill_3',25)->nullable();
            $table->integer('skill_3_percentage')->nullable();
            $table->text('skill_4',25)->nullable();
            $table->integer('skill_4_percentage')->nullable();
            $table->text('skill_5',25)->nullable();
            $table->integer('skill_5_percentage')->nullable();
            $table->text('skill_6',25)->nullable();
            $table->integer('skill_6_percentage')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
};
