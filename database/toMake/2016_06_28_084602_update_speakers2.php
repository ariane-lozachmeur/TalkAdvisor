<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSpeakers2 extends Migration
{
    /* 
     * This one is needed to display the average of the speaker on its profile.
     * 
     * I asked you and Matthieu in Line how to do it a few days about.
     * As I said it then, we have 2 different options : 
     * 	
     * 	1. We can calculate this average everytime someone loads the page. But it would take a lot of operations to do this.
     *  2. We can add those fields which will keep those average in memory. Of course, everytime someone posts a new rating, they will be updated.
     *  The variable number_reviews is needed to do that update. Indeed we have this formula :
     *  
     *  newAverage = ( number_reviews * oldAverage + score ) / ( number_reviews + 1 )
     *  
     *  Of course we could calculate number_review each time by counting the reviews, but it would take a lot of operations too.
     * 
     * */
  public function up()
    {
        Schema::table('speakers',function (Blueprint $table){
			$table->float('average_1');
		});
		Schema::table('speakers',function (Blueprint $table){
			$table->float('average_2');
		});
		Schema::table('speakers',function (Blueprint $table){
			$table->float('average_3');
		});
		Schema::table('speakers',function (Blueprint $table){
			$table->float('average_4');
		});
		Schema::table('speakers',function (Blueprint $table){
			$table->float('average_5');
        });
		Schema::table('speakers',function (Blueprint $table){
			$table->integer('number_reviews');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('speakers',function (Blueprint $table){
			Schema::drop('average_1');
		});
		Schema::table('speakers',function (Blueprint $table){
			Schema::drop('average_2');
		});
		Schema::table('speakers',function (Blueprint $table){
			Schema::drop('average_3');
		});
		Schema::table('speakers',function (Blueprint $table){
			Schema::drop('average_4');
		});
		Schema::table('speakers',function (Blueprint $table){
			Schema::drop('average_5');
        });
		Schema::table('speakers',function (Blueprint $table){
			Schema::drop('number_reviews');
		});
    }
}
