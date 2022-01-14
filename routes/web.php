<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HomeController;

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
//     return view('upload.layout');
// });

Route::get('/',                     [ HomeController::class, 'index' ]);
Route::get('/audio', 				[ HomeController::class, 'getAudio']);
Route::get('/image', 				[ HomeController::class, 'getImage']);



Route::get('admin',                  [ CustomAuthController::class, 'index'] )->name('login');
Route::get('admin/login',            [ CustomAuthController::class, 'dashboard'] );
Route::post('admin/login',           [ CustomAuthController::class, 'login'] )->name('login.custom');
Route::post('admin/registeration',   [ CustomAuthController::class, 'registeration'] )->name('registeration.custom');
Route::get('admin/logout',           [ CustomAuthController::class, 'signOut'])->name('signout');
Route::post('admin/changepassword',  [ CustomAuthController::class, 'changePassword']);



Route::get('admin/upload',               [ UploadController::class, 'index' ]);
Route::post('admin/upload-medias',       [ UploadController::class, 'storeMedia']);
Route::post('admin/unlink-sounds',       [ UploadController::class, 'destroySound']);
Route::post('admin/unlink-images',       [ UploadController::class, 'destroyImage']);
Route::get('admin/get-images',           [ UploadController::class, 'getImages']);
Route::get('admin/get-audios',           [ UploadController::class, 'getSounds']);



Route::get('admin/changepassword',       [ PagesController::class, 'showChangePasswordSection']);
Route::get('admin/profile',              [ PagesController::class, 'showChangePasswordSection']);
Route::get('admin/addmedia',             [ PagesController::class, 'showDropArea']);
Route::get('admin/library',              [ PagesController::class, 'showLibrary']);



// Route::get('auth',                  [ CustomAuthController::class, 'index'] )->name('login');
// Route::get('auth/login',            [ CustomAuthController::class, 'dashboard'] );
// Route::post('auth/login',           [ CustomAuthController::class, 'login'] )->name('login.custom');
// Route::post('auth/registeration',   [ CustomAuthController::class, 'registeration'] )->name('registeration.custom');
// Route::get('auth/logout',           [ CustomAuthController::class, 'signOut'])->name('signout');
// Route::post('changepassword',       [ CustomAuthController::class, 'changePassword']);




