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

Route::group(['middleware' => ['web']], function () {
    Route::resource('user', 'UserController');

// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});

Route::get('/', 'HomeController@welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{id}', 'HomeController@parentHome')->name('home.user');
Route::post('/home', 'MessageController@create');
Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/users/search', 'UserController@search')->name('user.search');
Route::delete('/message/{id}', 'MessageController@destroy')->name('message.destroy');
Route::get('/message/{id}/edit' , 'MessageController@edit')->name('message.edit');
Route::patch('/message/{id}' , 'MessageController@update')->name('message.update');
