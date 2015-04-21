<?php

class Popular extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name','price','category_id','subcategory_id'];
        
        public function categories(){
        return $this->hasMany('Category');
        }

}