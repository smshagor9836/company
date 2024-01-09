<?php 


Route::group(['namespace'=>'Amcoders\Plugin\zoom\http\controllers','middleware'=>'web'],function(){

	Route::post('admin/create_metting','ZoomController@create_metting')->name('zoom.create_metting')->middleware('admin');
	Route::get('admin/zoom/type={upcoming}/page={id}','ZoomController@index')->middleware('admin')->name('zoom');
	Route::get('admin/metting/create','ZoomController@create')->name('admin.metting.create')->middleware('admin');
	Route::get('zoom/live_meeting/{meetingid}','ZoomController@view')->name('zoom.view')->middleware('auth');
	Route::get('zoom/edit/{meetingid}','ZoomController@edit')->name('zoom.edit')->middleware('auth');
	Route::post('zoom/update/{meetingid}','ZoomController@update')->name('zoom.update')->middleware('auth');
	Route::get('zoom/delete/{meetingid}','ZoomController@delete')->name('zoom.delete')->middleware('auth');
	Route::get('zoom/live_host/{meetingid}','ZoomController@host')->name('zoom.host')->middleware('auth');
	Route::get('author/zoom/type/{status}','UserController@index')->name('zoom.user.index')->middleware('auth');
	Route::get('zoom/callback/{id}','ZoomController@callback')->name('zoom.callback')->middleware('auth');
});