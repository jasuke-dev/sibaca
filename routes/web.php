<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\SearchController;
use App\Models\Procurement;
use App\Models\Publisher;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

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



// Route::get('/admin/author', function () {
//     return view('admin.pages.author.index');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/admin/dashboard', [DashboardController::class , 'index'])->middleware('auth');
Route::get('/admin/dashboard/ajax', [DashboardController::class , 'ajax'])->middleware('auth');
Route::get('/search/ajax', [SearchController::class , 'ajax'])->middleware('auth');

Route::resource('/admin/type', TypeController::class)->middleware(['alert','auth']);

Route::resource('/admin/language', LanguageController::class)->middleware(['alert','auth']);

Route::resource('/admin/subject', SubjectController::class)->middleware(['alert','auth']);

Route::resource('/admin/author', AuthorController::class)->middleware(['alert','auth']);

Route::resource('/admin/users', UserController::class)->middleware(['alert','auth']);

Route::resource('/admin/collections', CollectionController::class)->middleware(['alert','auth']);

Route::resource('/admin/publisher', PublisherController::class)->middleware(['alert','auth']);

Route::resource('/admin/procurement', ProcurementController::class)->middleware(['alert','auth']);

Route::post('/import/{import}', [ImportController::class, 'import'])->middleware('auth');

Route::get('/search', [SearchController::class, 'index'])->middleware('auth');

Route::get('/details/{id}', [DetailsController::class, 'index'])->middleware('auth');


Route::get('/pdf/{file}', function ($file) {
    // file path
   $path = public_path('storage/files/collections' . '/' . $file);
    // header
   $header = [
     'Content-Type' => 'application/pdf',
     'Content-Disposition' => 'inline; filename="' . $file . '"'
   ];
  return response()->file($path);
  
 
})->name('pdf')->middleware('auth');
