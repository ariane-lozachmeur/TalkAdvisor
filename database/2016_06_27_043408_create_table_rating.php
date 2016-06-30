<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

public function up()
{
        Schema::create('ratings', function (Blueprint $table) {
            $table->integer('review_id');
            $table->integer('rating_option_id');
            $table->integer('score');
            $table->timestamp('updated_at');
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
    	Schema::drop('ratings');
    }
}
