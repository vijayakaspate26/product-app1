<?php

use App\Http\Controllers\Productcontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[Productcontroller::class,'index']);
Route::get('/login',[Productcontroller::class,'login'])->name('login');
Route::get('/register',[Productcontroller::class,'register'])->name('register');
Route::post('/register',[Productcontroller::class,'process_register'])->name('process_register');
Route::post('/login/POST',[Productcontroller :: class,'post_login'])->name('POSTlogin'); 
Route::get('/productform',[Productcontroller::class,'productform'])->name('form');

//geting product data
Route::post('/productform',[Productcontroller::class,'add_product'])->name('add_product');
Route::get('/productlist',[Productcontroller::class,'productlist'])->name('list');

Route::get('/edit/{id}',[Productcontroller::class,'edit'])->name('edit');
Route::post('update/{id}',[Productcontroller::class,'update'])->name('update');

Route::get('/view/{id}',[Productcontroller::class,'view'])->name('view');


