<?php 

use Illuminate\Http\Request;

Route::group(['namespace'=>'Amcoders\Theme\monkey\http\controllers','middleware'=>'web'],function(){

	Route::get('/','WelcomeController@index')->name('welcome');
	Route::get('/about','AboutController@index')->name('about');
	Route::get('/team','TeamController@index')->name('team');
	Route::get('/whychoose','WhychooseController@index')->name('whychoose');
	Route::get('/mission','MissionController@index')->name('mission');
	Route::get('/contact','ContactController@index')->name('contact');
	Route::post('contact','ContactController@store')->name('contact');
	Route::get('/faq','FaqController@index')->name('faq');
	Route::get('/shop','ProductController@index');
	Route::get('/product/{slug}','ProductController@show')->name('product.show');
	Route::get('/cart','CartController@index')->name('cart.index');
	Route::get('/checkout','CheckoutController@index')->name('checkout.index');
	Route::post('checkout','CheckoutController@store')->name('checkout.store');
	Route::get('payment/{data}','PaymentController@index')->name('payment.index');
	Route::post('payment/send','PaymentController@store')->name('payment.store');
	Route::get('orderconfirm','CheckoutController@orderconfirm')->name('orderconfirm');
	Route::get('service','ServiceController@index')->name('service.index');
	Route::get('service/{slug}','ServiceController@show')->name('service.show');
	Route::get('service/category/{slug}','ServiceController@category')->name('service.category');
	Route::get('blog','BlogController@index')->name('blog.index');
	Route::get('blog/{slug}','BlogController@show')->name('blog.show');
	Route::post('search','BlogController@search')->name('blog.search');
	Route::get('category/{slug}','CategoryController@show')->name('category.show');
	Route::get('tag/{slug}','TagController@show')->name('tag.show');
	Route::post('count','OptionController@count')->name('post.view');

	Route::get('/page/{slug}','PageController@index')->name('page.show');

	Route::get('off',function(Request $request){
		if(!\Session::has('off')){
			\Session::put('off', 'value');
			return "ok";
		}
	})->name('off');
});

Route::group(['namespace'=>'Amcoders\Theme\monkey\http\controllers','middleware'=>['web','auth','admin'],'prefix'=>'admin/', 'as'=>'admin.'],function(){

	Route::resource('theme-option','OptionController');
});	