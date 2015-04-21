<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('session_id');
                        $table->integer('product_id')->unsigned();
			$table->string('title');
			$table->string('subtitle');
			$table->integer('price');
			$table->integer('quality')->unsigned();
			$table->string('image');
			$table->string('image2');
			$table->string('image3');
			$table->string('image4');
			$table->integer('brand_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('subcategory_id')->unsigned();
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
		Schema::create('carts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('session_id');
			$table->string('title');
			$table->string('subtitle');
			$table->integer('price');
			$table->integer('quality');
			$table->string('image');
			$table->string('image2');
			$table->string('image3');
			$table->string('image4');
			$table->integer('brand_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('subcategory_id')->unsigned();
			$table->timestamps();
		});
	}

}
