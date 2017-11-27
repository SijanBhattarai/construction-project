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

Route::group([ 'as' => 'menu.', 'prefix' => 'menu' ], function ()
{
    Route::get('', 'MenuController@index')->name('index');
    Route::post('', 'MenuController@store')->name('store');
    Route::put('', 'MenuController@update')->name('update');
    Route::delete('{menu}', 'MenuController@destroy')->name('destroy');

    Route::group([ 'as' => 'subMenu.' ], function ()
    {
        Route::post('{menu}/sub-menu', 'MenuController@storeSubMenu')->name('store');
        Route::delete('{menu}/sub-menu/{subMenu}', 'MenuController@destroySubMenu')->name('destroy');
    });
});

Route::group([ 'as' => 'gallery.', 'prefix' => 'gallery' ], function ()
{
    Route::get('', 'GalleryController@index')->name('index');
    Route::get('create', 'GalleryController@create')->name('create');
    Route::post('', 'GalleryController@store')->name('store');
    Route::put('{gallery}', 'GalleryController@update')->name('update');
    Route::get('{gallery}/edit', 'GalleryController@edit')->name('edit');
    Route::delete('{gallery}', 'GalleryController@delete')->name('destroy');
});


Route::group([ 'as' => 'document.', 'prefix' => 'document' ], function ()
{
    Route::get('', 'DocumentController@index')->name('index');
    Route::get('create', 'DocumentController@create')->name('create');
    Route::post('store', 'DocumentController@store')->name('store');
    Route::put('{document}', 'DocumentController@update')->name('update');
    Route::get('{document}/edit', 'DocumentController@edit')->name('edit');
    Route::delete('{document}', 'DocumentController@destroy')->name('destroy');
    Route::put('{document}/publish','DocumentController@publishUpdate')->name('publish');
});