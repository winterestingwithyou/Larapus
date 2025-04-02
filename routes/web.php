<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\GuestController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
    Route::resource('authors', App\Http\Controllers\AuthorController::class);
    Route::resource('books', App\Http\Controllers\BooksController::class);
    Route::resource('members', App\Http\Controllers\MembersController::class);
    });

Route::get('books/{book}/borrow', [App\Http\Controllers\BooksController::class, 'borrow'])
    ->middleware(['auth', 'role:member'])
    ->name('guest.books.borrow');

Route::put('books/{book}/return', [App\Http\Controllers\BooksController::class, 'returnBack'])
    ->middleware(['auth', 'role:member'])
    ->name('member.books.return');

Route::get('auth/verify/{token}', [App\Http\Controllers\Auth\RegisterController::class, 'verify'])
    ->name('verify');

Route::get('auth/send-verification', [App\Http\Controllers\Auth\RegisterController::class, 'sendVerification'])
    ->name('sendVerification');

Route::get('settings/profile', [App\Http\Controllers\SettingsController::class, 'profile'])
    ->name('profile');

Route::get('settings/profile/edit', [App\Http\Controllers\SettingsController::class, 'editProfile'])
    ->name('editProfile');

Route::post('settings/profile', [App\Http\Controllers\SettingsController::class, 'updateProfile'])
    ->name('updateProfile');

Route::get('settings/password', [App\Http\Controllers\SettingsController::class, 'editPassword'])
    ->name('editPassword');

Route::post('settings/password', [App\Http\Controllers\SettingsController::class, 'updatePassword'])
    ->name('updatePassword');

Route::get('statistics', [App\Http\Controllers\StatisticsController::class, 'index'])
    ->name('statistics.index');