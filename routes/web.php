<?php

use App\Http\Controllers\AbonneController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\articleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\statistiqueController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/history', [HomeController::class, 'history'])->name('history')->middleware('auth');


Route::post('/articles/{article}/rate', [ArticleController::class, 'rate'])->name('articles.rate');



Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::patch('/home', [HomeController::class, 'updatePassword']);
Route::patch('/theme', [HomeController::class, 'updatetheme'])->name('theme.update');


Route::resource('/admin/articles', AdminController::class)->except('show')->names('admin.articles');
Route::get('/admin/static', [statistiqueController::class, 'index'])->name('admin.static');


//Route::get('/guest/themes', [GuestController::class, 'index'])->name('guest.themes')->middleware('role:guest');
Route::get('/', [GuestController::class, 'indexGuest'])->name('guest.themes')->middleware('guest');



Route::get('/accueuil', [articleController::class, 'index'])->name('index');
Route::get('/themes/{theme}', [articleController::class, 'articlesByTheme'])->name('Articles.byTheme');
Route::get('/Numeros/{Numero}', [articleController::class, 'articlesByNumero'])->name('Articles.byNumero');
Route::get('/tags/{tag}', [articleController::class, 'articlesByTag'])->name('Articles.byTag');
Route::get('/{article}', [articleController::class, 'show'])->name('Articles.show');
Route::post('/{article}/comment', [articleController::class, 'comment'])->name('articles.comment');
Route::get('/abonnement/{theme}', [articleController::class, 'articlesByTheme'])->name('Articles.byTheme');






