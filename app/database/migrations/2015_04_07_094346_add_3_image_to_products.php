<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add3ImageToProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('products', function($table)
                {
                    $table->string('image1');
                    $table->string('image2');
                    $table->string('image3');
                   
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('products', function($table)
                {
                    $table->dropColumn('image1');
                    $table->dropColumn('image2');
                    $table->dropColumn('image3');                    
                    
                });
	}

}
