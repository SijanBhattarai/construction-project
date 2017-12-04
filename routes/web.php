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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group( ['prefix' => 'user', 'as' => 'user.' ], function ()
{
    Route::get('', 'UserController@index')->name('index');
    Route::get('create', 'UserController@create')->name('create');
    Route::post('', 'UserController@store')->name('store');
    Route::get('{user}', 'UserController@show')->name('show');
    Route::get('{user}/edit', 'UserController@edit')->name('edit');
    Route::put('{user}', 'UserController@update')->name('update');
    Route::delete('{user}', 'UserController@destroy')->name('destroy');

});


Route::get('settings', 'SettingController@index')->name('setting.index');
Route::put('settings/update', 'SettingController@update')->name('setting.update');

Route::get('account', 'AccountController@index')->name('account.index');

Route::get('reports', 'ReportsController@index')->name('report.index');


Route::group([ 'as' => 'site.', 'prefix' => 'post' ], function ()

{
    Route::get('', 'SiteController@index')->name('index');
    Route::get('create', 'SiteController@create')->name('create');
    Route::post('store', 'SiteController@store')->name('store');
    Route::get('{site}/edit', 'SiteController@edit')->name('edit');
    Route::put('{site}', 'SiteController@update')->name('update');
    Route::delete('{site}', 'SiteController@destroy')->name('destroy');
//    Route::post('/datatable','SiteController@datatable')->name('datatable');
});
Route::group([ 'as' => 'accounthead.', 'prefix' => 'accounthead' ], function () {
    Route::get('', 'AccountHeadController@index')->name('index');
    Route::post('', 'AccountHeadController@store')->name('store');
    Route::put('', 'AccountHeadController@update')->name('update');
    Route::delete('{accounthead}', 'AccountHeadController@destroy')->name('destroy');

//    Route::group(['as' => 'subMenu.'], function () {
//        Route::post('{accounthead}/sub-accounthead', 'AccountHead@storeSubMenu')->name('store');
//        Route::delete('{accounthead}/sub-accounthead/{subMenu}', 'AccountHead@destroySubMenu')->name('destroy');
//    });
});