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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => 'Manija\Http\Middleware\AdminMiddleware'], function () {
        Route::get('/admin', function () {return dd(Auth());});
        Route::get('/user', 'UserController@index')->name('listUsers');
        Route::get('/user/{id}', 'UserController@show')->name('showUser');

      // Registration Routes...
      Route::get('/admin/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
      Route::post('/admin/register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);
    });

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

Route::get('/home', 'HomeController@index')->name('userMainPage');
// Route::get('/user/{id}', 'HomeController@showUserPage')->name('userWall');

Route::put('/home', 'MessageController@sendMessage');
