<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::group(array('prefix' => 'admin'), function(){
 Route::resource('products', 'AdminProductsController', array('except' => array('show')));
 Route::post('products/currentActiveMenu', 'AdminProductsController@currentActiveMenu');
 Route::get('products/destroy/{id}', 'AdminProductsController@destroy');
 Route::get('products/addLikes/{id}', 'AdminProductsController@addLikes');
 Route::get('products/featuredItems/{id}', 'AdminProductsController@featuredItems');

 
 Route::resource('categories', 'AdminCategoriesController', array('except' => array('show')));
 Route::get('categories/destroy/{id}', 'AdminCategoriesController@destroy');
  
 Route::resource('brands', 'AdminBrandsController', array('except' => array('show')));
 Route::get('brands/destroy/{id}', 'AdminBrandsController@destroy');
   
 Route::resource('populars', 'AdminPopularsController', array('except' => array('show')));   
 Route::get('populars/destroy/{id}', 'AdminPopularsController@destroy');
  
 Route::resource('subcategories', 'AdminSubCategoriesController', array('except' => array('show')));   
 Route::get('subcategories/destroy/{id}', 'AdminSubCategoriesController@destroy');
 Route::get('subcategories/getSubCategories/{id}', 'AdminSubCategoriesController@getSubCategories');
 Route::get('subcategories/getSubCategoriesPopular/{id}', 'AdminSubCategoriesController@getSubCategoriesPopular');
 
 Route::resource('sliders', 'AdminSlidersController', array('except' => array('show')));   
 Route::get('sliders/destroy/{id}', 'AdminSlidersController@destroy');
  
 Route::resource('promotions', 'AdminPromotionsController', array('except' => array('show')));   
 Route::get('promotions/destroy/{id}', 'AdminPromotionsController@destroy');
 });
//Route::get('/', array('as' => 'home', 'uses' => 'ProductsController@getIndex'));
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));
Route::get('details/{id}', array('as' => 'details', 'uses' => 'HomeController@getDetails'));
Route::get('cart/{id}', array('as' => 'cart', 'uses' => 'HomeController@getCart'));
Route::get('getCategories', array('as' => 'categories', 'uses' => 'HomeController@getCategories'));
Route::get('brands', array('as' => 'brand', 'uses' => 'HomeController@getBrands'));
Route::get('featureditem', array('as' => 'featureditem', 'uses' => 'HomeController@getFeatureditem'));
  