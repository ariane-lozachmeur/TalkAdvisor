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
    {
    	Schema::table('ratings', function (Blueprint $table) {
    		$table->timestamp('updated_at');
    	});
    		Schema::table('ratings', function (Blueprint $table) {
    			$table->timestamp('created_at');
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
    		Schema::drop('updated_at');
    	});
    		Schema::table('ratings', function (Blueprint $table) {
    			Schema::drop('created_at');
    		});
    }
}
