<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRatings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {Schema::table('ratings', function (Blueprint $table) {
    		$table->integer('speaker_id');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('ratings', function (Blueprint $table) {
    		Schema::drop('speaker_id');
    	});    }
}
