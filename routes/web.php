<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/account/login', function () {
    return view('account.login');
});

Route::get('/account/register', function () {
    return view('account.register');
});

Route::get('/account/recoverpw', function () {
    return view('account.recoverpw');
});

Route::get('/account/settings', function () {
    return view('account.settings');
});

Route::get('/account/newpw', function () {
    return view('account.newpw');
});

Route::get('/catalogue/graphics', function () {
    return view('catalogue.graphics');
});

Route::get('/catalogue/processors', function () {
    return view('catalogue.processors');
});

Route::get('/catalogue/consoles', function () {
    return view('catalogue.consoles');
});

Route::get('/catalogue/phones', function () {
    return view('catalogue.phones');
});


Route::get('/', function () {
    return view('mainpage');
});







