<?php 


Route::group(['namespace'=>'Amcoders\Plugin\portfolio\http\controllers','middleware'=>['web','auth','admin'],'prefix'=>'admin/', 'as'=>'admin.'],function(){

	Route::resource('portfolio','PortfolioController');
	Route::post('portfolios/destroy','PortfolioController@destroy')->name('portfolios.destroy');


	Route::resource('portfoliocategory','CategoryController');
	Route::post('portfoliocategory/destroy','CategoryController@destroy')->name('portfoliocategorys.destroy');

	Route::resource('Experience','ExperienceController');
	Route::post('Experiences/destroy','ExperienceController@destroy')->name('Experiences.destroy');

	Route::resource('Education','EducationController');
	Route::post('Educations/destroy','EducationController@destroy')->name('Educations.destroy');

});