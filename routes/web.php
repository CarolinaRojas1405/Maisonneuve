<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\EtudiantController;
use \App\Http\Controllers\VilleController;
use \App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DocumentController;
use \App\Http\Controllers\CustomAuthController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

//Route langue
Route::get('/lang/{locale}', [LocalizationController::class, 'index']);


//Routes pour afficher les fonctionnalités étudiants
Route::get('/etudiant', [EtudiantController::class, 'index']);
Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'show']);
Route::get('/etudiant/create/new', [EtudiantController::class, 'create']);
Route::post('/etudiant/create/new', [EtudiantController::class, 'store']);
Route::get('/etudiant/{etudiant}/edit', [EtudiantController::class, 'edit']);
Route::put('/etudiant/{etudiant}/edit', [EtudiantController::class, 'update']);
Route::delete('/etudiant/{etudiant}', [EtudiantController::class, 'destroy']);


//Routes por afficher les fonctionnalités des articles du forum
Route::get('/articles/mes-articles', [ArticleController::class, 'index']);
Route::get('/articles/{article}', [ArticleController::class, 'show']);
Route::get('/articles/create/new', [ArticleController::class, 'create']);
Route::post('/articles/create/new', [ArticleController::class, 'store']);
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->middleware('auth');
Route::put('/articles/{article}/edit', [ArticleController::class, 'update'])->middleware('auth');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->middleware('auth');


//Routes por afficher les fonctionnalités des documents

Route::get('/document', [DocumentController::class, 'index']);
Route::get('/document/{document}', [DocumentController::class, 'show']);
Route::get('/blog/{blogPost}/download', [BlogPostController::class, 'download']);
Route::get('/document/create/doc', [DocumentController::class, 'create']);
Route::post('/document/create/doc', [DocumentController::class, 'store'])->name('addDocument');
Route::get('/document/{document}/edit', [DocumentController::class, 'edit'])->middleware('auth');
Route::put('/document/{document}/edit', [DocumentController::class, 'update'])->middleware('auth');
Route::delete('/document/{document}', [DocumentController::class, 'destroy'])->middleware('auth');


//Routes pour afficher les fonctionnalités de register et connection
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('/register', [CustomAuthController::class, 'create']);
Route::post('/custom-register', [CustomAuthController::class, 'store'])-> name('register.custom');
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');