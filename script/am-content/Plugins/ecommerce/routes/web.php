<?php 

Route::group(['namespace'=>'Amcoders\Plugin\ecommerce\http\controllers','middleware'=>['web'],'prefix'=>'product', 'as'=>'product.'],function(){

	//here create your routes
	Route::get('cart/store','CartController@store')->name('cart.store');
	Route::get('wishlist/store','CartController@wishlist_store')->name('wishlist.store');
	Route::get('compare/store','CartController@compare_store')->name('compare.store');
	Route::get('pricing/cart/store/{id}','CartController@pricingstore')->name('cart.pricingstore');
	Route::get('cart/remove','CartController@remove')->name('cart.remove');
	Route::get('cart/update','CartController@update')->name('cart.update');

});


Route::group(['namespace'=>'Amcoders\Plugin\ecommerce\http\controllers','middleware'=>['web','auth','admin'],'prefix'=>'admin/ecommerce/', 'as'=>'admin.ecommerce.'],function(){

	Route::resource('pricing','PriceingtableController');
	Route::post('pricings/destroy','PriceingtableController@destroy')->name('pricings.destroy');

	Route::resource('product','ProductController');
	Route::post('products/destroy','ProductController@destroy')->name('products.destroy');

	Route::resource('order','OrderController');

	Route::resource('category','CategoryController');
	Route::post('categorys/destroy','CategoryController@destroy')->name('categorys.destroy');


	Route::get('settings','ProductController@settingView')->name('settings');
	Route::post('settings/update','ProductController@settingsUpdate')->name('settings.update');

	Route::get('reports','ReportController@index')->name('report');

	

});