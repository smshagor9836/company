<?php 


Route::group(['namespace'=>'Amcoders\Plugin\services\http\controllers','middleware'=>['web','auth','admin'],'prefix'=>'admin/', 'as'=>'admin.service.'],function(){

	Route::resource('category','CategoryController');
	Route::post('categorys/destroy','CategoryController@destroy')->name('categorys.destroy');

	Route::get('service/category','CategoryController@index')->name('services.category');

	Route::resource('service','ServiceController');
	Route::post('services/destroy','ServiceController@destroy')->name('services.destroy');

});