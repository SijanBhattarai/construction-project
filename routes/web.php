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
    Route::delete('{site}', 'SiteController@destroy')->name('destroy');
//    Route::post('/datatable','SiteController@datatable')->name('datatable');
});


Route::group([ 'as' => 'accounthead.', 'prefix' => 'accounthead' ], function ()
{
    Route::get('', 'AccountheadController@index')->name('index');
    Route::get('create', 'AccountheadController@create')->name('create');
    Route::post('store', 'AccountheadController@store')->name('store');
    Route::get('{accounthead}/edit', 'AccountheadController@edit')->name('edit');
    Route::put('{accounthead}', 'AccountheadController@update')->name('update');
    Route::delete('{accounthead}', 'AccountheadController@destroy')->name('destroy');


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
    Route::get('edit', 'TransactionController@edit')->name('edit');
    Route::put('{transaction}', 'TransactionController@update')->name('update');
    Route::delete('{transaction}', 'TransactionController@destroy')->name('destroy');
//    Route::post('/datatable','TransactionController@datatable')->name('datatable');
});
//admin route


Auth::routes();
Route::get('/home', 'HomeController@index');
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});