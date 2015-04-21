<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('ProductsTableSeeder');
		 $this->call('BrandsTableSeeder');
		 $this->call('CategoriesTableSeeder');
		 $this->call('SubCategoriesTableSeeder');
	}

}
