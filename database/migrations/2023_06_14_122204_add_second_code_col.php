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
        Schema::table('advertisements', function (Blueprint $table) {
            $table->integer('code')->nullable();
            $table->integer('hours')->nullable();
            $table->timestamp('expired_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            if ( Schema::hasColumn('advertisements','code') ) {
                $table->dropColumn('code');
            }
            if ( Schema::hasColumn('advertisements','hours') ) {
                $table->dropColumn('hours');
            }
            if ( Schema::hasColumn('advertisements','expired_at') ) {
                $table->dropColumn('expired_at');
            }
        });
    }
};
