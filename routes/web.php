<?php

use App\Http\Controllers\JenisController;
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

Route::get('/dashboard', function () {
    return view('admin.pages.dashboard.index');
});

Route::get('/collections', function () {
    return view('admin.pages.collections.index');
});

Route::get('/users', function () {
    return view('admin.pages.users.index');
});

Route::get('/subject', function () {
    return view('admin.pages.subject.index');
});

Route::get('/bahasa', function () {
    return view('admin.pages.bahasa.index');
});

Route::get('/pengarang', function () {
    return view('admin.pages.pengarang.index');
});

Route::get('/jenis', [JenisController::class, 'index']);

