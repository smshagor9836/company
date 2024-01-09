<?php 


Route::group(['namespace'=>'Amcoders\Plugin\Faq\http\controllers','middleware'=>['web','auth','admin'],'prefix'=>'admin/', 'as'=>'admin.'],function(){

	Route::resource('faq','FaqController');
	Route::post('faqs/destroy','FaqController@destroy')->name('faqs.destroy');

});