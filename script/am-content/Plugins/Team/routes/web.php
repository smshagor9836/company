<?php 


Route::group(['namespace'=>'Amcoders\Plugin\Team\http\controllers','middleware'=>['web','auth','admin'],'prefix'=>'admin/', 'as'=>'admin.'],function(){

	Route::resource('team','TeamController');
	Route::post('teams/destroy','TeamController@destroy')->name('teams.destroy');

});