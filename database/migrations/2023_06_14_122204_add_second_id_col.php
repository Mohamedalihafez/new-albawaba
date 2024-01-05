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
        Schema::table('gallaries', function (Blueprint $table) {
            $table->integer('second_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gallaries', function (Blueprint $table) {
            if ( Schema::hasColumn('gallaries','second_id') ) {
                $table->dropColumn('second_id');
            }
        });
    }
};
