<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRatings extends Migration
{
    /* 
     * We need this one since we will not use talk_id at the beginning.
     * 
     * Moreover, even when we use talk_id, Matthieu told me that 2 speakers can be attached to a single talk.
     * In that case, we can't know which speaker is concerned by the review if we don't have speaker_id in the review.
     * So I think we will need it anyway
     * 
     * 
     * */
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
