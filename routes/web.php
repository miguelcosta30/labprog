<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::get('/', function () {return view('mainpage');});

Route::get('/catalogue/phones',[ProductController::class,'indexPhone']);
Route::get('/catalogue/consoles',[ProductController::class,'indexConsole']);
Route::get('/catalogue/graphics',[ProductController::class,'indexGraphic']);
Route::get('/catalogue/processors',[ProductController::class,'indexProcessor']);
Route::get('/catalogue/displaySearch',[ProductController::class,'indexSearch']);


Route::get('/account/settings',[UserController::class,'indexMorada']);
Route::get('/account/settings.php',[UserController::class,'updateMorada']);
Route::post('/account/settings.php',[UserController::class,'updateMorada']);

Route::get('/account/addAddress',function() { return view ('account.addAddress');});
Route::post('/account/addAddress',[UserController::class,'updateMorada']);    

Route::get('/account/shoppingCart',function() {return view ('account.shoppingCart');})->middleware('auth');
Route::get('/addToCart/{id}',[ProductController::class,'addToCart'])->middleware('auth');
Route::post('/removeFromCart',[ProductController::class,'removeFromCart'])->name('shoppingCart.remove')->middleware('auth');
Route::post('/updateCart',[ProductController::class,'updateCart'])->name('shoppingCart.update')->middleware('auth');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout']); //logout route
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/form',[AdminController::class,'create'])->middleware('isAdmin');
Route::post('/form', [AdminController::class,'store'])->middleware('isAdmin');

Route::delete('/formEditRemove/{id}',[AdminController::class,'removeProducts'])->middleware('isAdmin')->name('product.remove'); //passar ir para saber qual remover
Route::get('/formEditRemove',[AdminController::class,'idexAllProducts'])->middleware('isAdmin');
Route::put('/formEditRemove/{id}',[AdminController::class,'editProducts'])->middleware('isAdmin')->name('product.edit');


