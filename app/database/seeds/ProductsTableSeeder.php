<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 20) as $index)
		{
			Product::create([
                            'title' => $faker->name(),
                            'subtitle' => $faker->sentence(),
                            'likes' => rand(1, 1000),
                            'star' => rand(1, 5),
                            'price' => rand(1, 500),
                            'image' => $faker->sentence(),
                            'brand_id' => rand(1, 10),
                            'category_id' => rand(1, 10),
			]);
		}
	}

}