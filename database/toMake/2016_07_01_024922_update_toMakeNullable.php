<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateToMakeNullable extends Migration
{
    /* 
     * comment, quote and talk_id should be nullable. Users are authorized to post a reveiw with ratings but no comment or quote.
     * 
     * */
    public function up()
    {
    	Schema::table('reviews', function($table){
   			$table->string('comment')->nullable()->change();
		});
    	Schema::table('reviews', function($table){
    		$table->string('quote')->nullable()->change();
   		});
    	Schema::table('reviews', function($table){
    		$table->string('talk_id')->nullable()->change();
    	});
    	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('reviews', function($table){
   			$table->string('comment')->nullable(false)->change();
		});
       	Schema::table('reviews', function($table){
       		$table->string('quote')->nullable(false)->change();
       	});
       	Schema::table('reviews', function($table){
       		$table->string('talk_id')->nullable(false)->change();
     	});
    }
}
