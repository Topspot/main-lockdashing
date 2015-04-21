<?php

class Cart extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['session_id', 'product_id', 'quality', 'title', 'subtitle', 'price', 'image', 'image2', 'image3', 'image4', 'category_id', 'brand_id','user_id','featured','subcategory_id'];


}