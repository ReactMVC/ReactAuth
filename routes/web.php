<?php
use ReactMVC\App\Core\Routing\Route;

Route::add(['get', 'post'], '/', 'Login@index');

Route::add(['get', 'post'], '/register', 'Register@index');

Route::add(['get', 'post'], '/register/', 'Register@index');

Route::get('/dashboard', 'Dashboard@index');

Route::get('/logout', function () {
    view('logout');
});