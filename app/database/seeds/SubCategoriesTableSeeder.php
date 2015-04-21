<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SubCategoriesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 50) as $index)
		{
			SubCategory::create([
                            'name' => $faker->name(),
                            'category_id' => rand(1, 10),
			]);
		}
	}

}