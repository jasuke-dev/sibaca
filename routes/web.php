<?php

use App\Http\Controllers\JenisController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TypeController;
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

Route::get('/', function () {
    return view('login.index');
});

Route::get('/explore', function () {
    return view('explore.index');
});

Route::get('/admin/dashboard', function () {
    return view('admin.pages.dashboard.index');
});

Route::get('/admin/collections', function () {
    return view('admin.pages.collections.index');
});

Route::get('/admin/users', function () {
    return view('admin.pages.users.index');
});

Route::get('/admin/subject', function () {
    return view('admin.pages.subject.index');
});

Route::get('/admin/pengarang', function () {
    return view('admin.pages.pengarang.index');
});


Route::resource('/admin/type', TypeController::class)->middleware('alert');

Route::resource('/admin/bahasa', LanguageController::class)->middleware('alert');

