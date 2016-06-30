<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSpeakers2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
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
