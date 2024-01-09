<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// All installer route are here
Route::get('install','Installer\InstallerController@install')->name('install');
Route::get('install/purchase','Installer\InstallerController@purchase')->name('purchase');
Route::post('install/purchase_check','Installer\InstallerController@purchase_check')->name('purchase_check');
Route::get('install/check','Installer\InstallerController@check')->name('install.check');
Route::get('install/info','Installer\InstallerController@info')->name('install.info');
Route::get('install/migrate','Installer\InstallerController@migrate')->name('install.migrate');
Route::get('install/seed','Installer\InstallerController@seed')->name('install.seed');
Route::post('install/store','Installer\InstallerController@send');
Route::get('404',function(){
	return abort(404);
})->name(404);
