<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateReviews extends Migration
{
    /*
     * Matthieu told me to do this one since we don't need the name and the email of the user but just its id.
     * 
     * Then we can find this user and use its name, email or any other information about him.
     * 
     * */
    public function up()
    {
    	Schema::table('reviews', function (Blueprint $table) {
    		$table->integer('user_id');
    	});
    	Schema::table('reviews', function (Blueprint $table) {
    		$table->dropColumn('user_name');
    	});
    	Schema::table('reviews', function (Blueprint $table) {
    		$table->dropColumn('user_email');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('reviews', function (Blueprint $table) {
    		Schema::drop('user_id');
    	});
    	Schema::table('reviews', function (Blueprint $table) {
    		$table->text('user_name');
    	});
    	Schema::table('reviews', function (Blueprint $table) {
    		$table->text('user_email');
    	});
    }
}
