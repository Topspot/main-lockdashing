<?php

class Category extends \Eloquent {

    // Add your validation rules here
    public static $rules = [
            // 'title' => 'required'
    ];
    // Don't forget to fill this array
    protected $fillable = ['name'];

    public function product() {
        return $this->belongsTo('Product');
    }

    public function popular() {
        return $this->belongsTo('Popular');
    }

}
