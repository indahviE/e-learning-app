<?php

use App\Http\Controllers\AuthControlller;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthControlller::class, 'login_view']); // kslo user cari url / link di chrome
Route::post('/login', [AuthControlller::class, 'login']); // kalo user submit form

Route::get('/register', [AuthControlller::class, 'register_view']); // kslo user cari url / link di chrome
Route::post('/register', [AuthControlller::class, 'register']); 
Route::post('/logout', [AuthControlller::class, 'logout']); 

Route::get('/user', [UserController::class, 'user_view']);
Route::get('/user/create', [UserController::class, 'user_view_create']);
Route::get('/user/update/{id}', [UserController::class, 'user_view_update']);

Route::post('/user/create', [UserController::class, 'user_create']);
Route::post('/user/update/{id}', [UserController::class, 'user_update']);
Route::post('/user/delete/{id}', [UserController::class, 'user_delete']);