<?php

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect()->route('welcome', app()->getLocale());
});

Route::middleware('setlocale')
    ->prefix('{locale}')
    ->group(function () {

        Route::get('/', function () {
            return view('welcome');
        })->name('welcome');

        Auth::routes();

        Route::middleware('auth')
            ->prefix('personal')
            ->name('personal.')
            ->group(function () {
                Route::get('/', [App\Http\Controllers\PersonalController::class, 'index'])->name('index');
                Route::get('/profile', [App\Http\Controllers\PersonalController::class, 'profile'])->name('profile');
                Route::resource('link', App\Http\Controllers\LinkController::class)
                    ->only(['index', 'store', 'create']);
                Route::middleware('user.has.link')
                    ->group(function () {
                        Route::resource('link', App\Http\Controllers\LinkController::class)
                            ->except(['index', 'create', 'store']);
                    });
            });
    });
Route::get('/{link:back_halve}', [App\Http\Controllers\LinkController::class, 'link'])->name('link');
Route::post('/locale', [App\Http\Controllers\LocaleController::class, 'change'])->name('locale.update');
