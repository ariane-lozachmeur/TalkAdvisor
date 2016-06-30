<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('reviews', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('user_name');
            $table->string('user_email');
            $table->integer('talk_id');
            $table->integer('speaker_id');
            $table->text('comment');
            $table->text('quote');
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
    	Schema::drop('reviews');
    }
}
