<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColoumToPopular extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('populars', function($table)
                {
                    $table->integer('subcategory_id');
                   
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('populars', function($table)
                {
                    $table->dropColumn('subcategory_id');
                    
                });
	}

}
