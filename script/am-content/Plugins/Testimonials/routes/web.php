<?php 


Route::group(['namespace'=>'Amcoders\Plugin\Testimonials\http\controllers','middleware'=>['web','auth','admin'],'prefix'=>'admin/', 'as'=>'admin.'],function(){

	Route::resource('testimonial','TestimonialController');
	Route::post('testimonials/destroy','TestimonialController@destroy')->name('testimonials.destroy');

});