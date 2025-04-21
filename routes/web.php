<?php

use App\Http\Controllers\AuthControlller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\PengajarController;
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
Route::post('/user/assign/pengajar/{id}', [UserController::class, 'user_assign_pengajar']);

Route::get('/category', [CategoryController::class, 'category_view']);
Route::get('/category/create', [CategoryController::class, 'category_view_create']);
Route::get('/category/update/{id}', [CategoryController::class, 'category_view_update']);

Route::post('/category/create', [CategoryController::class, 'category_create']);
Route::post('/category/update/{id}', [CategoryController::class, 'category_update']);
Route::post('/category/delete/{id}', [CategoryController::class, 'category_delete']);
Route::post('/category/restore/{id}', [CategoryController::class, 'category_restore']);


Route::get('/pengajar', [PengajarController::class, 'pengajar_view']);
Route::get('/pengajar/create', [PengajarController::class, 'pengajar_view_create']);
Route::get('/pengajar/update/{id}', [PengajarController::class, 'pengajar_view_update']);

// Route::post('/pengajar/create', [PengajarController::class, 'pengajar_create']);
Route::post('/pengajar/update/{id}', [PengajarController::class, 'pengajar_update']);
Route::post('/pengajar/delete/{id}', [PengajarController::class, 'pengajar_delete']);
Route::post('/pengajar/restore/{id}', [PengajarController::class, 'pengajar_restore']);

Route::get('/kursus', [KursusController::class, 'kursus_view']);
Route::get('/kursus/create', [KursusController::class, 'kursus_view_create']);
Route::get('/kursus/update/{id}', [KursusController::class, 'kursus_view_update']);

Route::post('/kursus/create', [KursusController::class, 'kursus_create']);
Route::post('/kursus/update/{id}', [KursusController::class, 'kursus_update']);
Route::post('/kursus/delete/{id}', [KursusController::class, 'kursus_delete']);
Route::post('/kursus/restore/{id}', [KursusController::class, 'kursus_restore']);