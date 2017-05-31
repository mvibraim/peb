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
    return view('usuario.auth.login');
});

Route::group(['prefix' => 'usuario'], function () {
  Route::get('/login', 'UsuarioAuth\LoginController@showLoginForm');
  Route::post('/login', 'UsuarioAuth\LoginController@login');
  Route::post('/logout', 'UsuarioAuth\LoginController@logout');

  Route::get('/register', 'UsuarioAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'UsuarioAuth\RegisterController@register');

  Route::post('/password/email', 'UsuarioAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'UsuarioAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'UsuarioAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'UsuarioAuth\ResetPasswordController@showResetForm');
});