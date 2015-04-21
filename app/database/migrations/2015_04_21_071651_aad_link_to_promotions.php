<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AadLinkToPromotions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('promotions', function($table)
                {
                    $table->string('link');
                    
                   
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('promotions', function($table)
                {
                    $table->string('link');
                    
                   
                });
	}

}
