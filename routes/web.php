<?php
use ReactMVC\App\Core\Routing\Route;

Route::add(['get', 'post'], '/', 'HomeController@index');

Route::add(['get', 'post'], '/send', 'Send@mail');
Route::add(['get', 'post'], '/send/', 'Send@mail');

Route::add(['get', 'post'], '/login', 'LoginController@index');
Route::add(['get', 'post'], '/login/', 'LoginController@index');

Route::add(['get', 'post'], '/register', 'RegisterController@index');
Route::add(['get', 'post'], '/register/', 'RegisterController@index');

Route::add(['get', 'post'], '/logout', 'LogoutController@index');
Route::add(['get', 'post'], '/logout/', 'LogoutController@index');


Route::get('/dashboard', 'UserController@index');