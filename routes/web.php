<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\SearchController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/admin/dashboard', [DashboardController::class , 'index'])->name('admin')->middleware('admin');
Route::get('/admin/dashboard/ajax', [DashboardController::class , 'ajax'])->middleware('admin');
Route::get('/search/ajax', [SearchController::class , 'ajax'])->middleware('auth');

Route::resource('/admin/type', TypeController::class)->middleware(['alert','admin']);

Route::resource('/admin/language', LanguageController::class)->middleware(['alert','admin']);

Route::resource('/admin/subject', SubjectController::class)->middleware(['alert','admin']);

Route::resource('/admin/author', AuthorController::class)->middleware(['alert','admin']);

Route::resource('/admin/users', UserController::class)->middleware(['alert','admin']);

Route::resource('/admin/collections', CollectionController::class)->middleware(['alert','admin']);

Route::resource('/admin/publisher', PublisherController::class)->middleware(['alert','admin']);

Route::resource('/admin/procurement', ProcurementController::class)->middleware(['alert','admin']);

Route::post('/import/{import}', [ImportController::class, 'import'])->middleware('admin');

Route::get('/search', [SearchController::class, 'index'])->name('user')->middleware('auth');

Route::get('/details/{id}', [DetailsController::class, 'index'])->middleware('auth');


Route::get('/pdf/{collection}', [PDFController::class, 'viewer'])->name('pdf')->middleware('auth');

Route::get('/addAuthor', [AuthorController::class, 'addAuthor']);
