<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LanguageController;

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
    return view('login.index');
});

Route::get('/explore', function () {
    return view('explore.index');
});

Route::get('/admin/dashboard', function () {
    return view('admin.pages.dashboard.index');
});

Route::get('/admin/author', function () {
    return view('admin.pages.author.index');
});


Route::resource('/admin/type', TypeController::class)->middleware('alert');

Route::resource('/admin/language', LanguageController::class)->middleware('alert');

Route::resource('/admin/subject', SubjectController::class)->middleware('alert');

Route::resource('/admin/author', AuthorController::class)->middleware('alert');

Route::resource('/admin/users', UserController::class)->middleware('alert');

Route::resource('/admin/collections', EbookController::class)->middleware('alert');

