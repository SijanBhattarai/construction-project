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
Route::get('/admin', 'AdminController@index')->name('admin');

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


Route::group([ 'as' => 'site.', 'prefix' => 'site' ], function ()

{
    Route::get('', 'SiteController@index')->name('index');
    Route::get('create', 'SiteController@create')->name('create');
    Route::post('store', 'SiteController@store')->name('store');
    Route::get('{site}/edit', 'SiteController@edit')->name('edit');
    Route::put('{site}', 'SiteController@update')->name('update');
    Route::delete('{site}', 'SiteController@delete')->name('destroy');
});
Route::group([ 'as' => 'customer.', 'prefix' => 'customer' ], function ()

{
    Route::get('', 'CustomerController@index')->name('index');
    Route::get('create', 'CustomerController@create')->name('create');
    Route::post('store', 'CustomerController@store')->name('store');
    Route::get('{customer}/edit', 'CustomerController@edit')->name('edit');
    Route::put('{customer}','CustomerController@update')->name('update');
    Route::delete('{customer}', 'CustomerController@delete')->name('destroy');
});

Route::group([ 'as' => 'accounthead.', 'prefix' => 'accounthead' ], function ()

{
    Route::get('', 'AccountHeadController@index')->name('index');
    Route::post('', 'AccountHeadController@store')->name('store');
    Route::put('', 'AccountHeadController@update')->name('update');
    Route::delete('{accounthead}', 'AccountHeadController@destroy')->name('destroy');
});



//logout loigin route

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

//transaction route

Route::group([ 'as' => 'transaction.', 'prefix' => 'transaction' ], function ()

{
    Route::get('', 'TransactionController@index')->name('index');
    Route::get('create', 'TransactionController@create')->name('create');
    Route::post('store', 'TransactionController@store')->name('store');
});

Route::group([ 'as' => 'sales.', 'prefix' => 'sales' ], function ()

{
    Route::get('', 'SalesController@index')->name('index');
    Route::get('create', 'SalesController@create')->name('create');
    Route::post('store', 'SalesController@store')->name('store');
    Route::get('{sales}/edit', 'SalesController@edit')->name('edit');
    Route::put('{sales}', 'SalesController@update')->name('update');
});