<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PersonalController;
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

Route::middleware('setlocale')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Auth::routes();

    Route::middleware('auth')
        ->prefix('personal')
        ->name('personal.')
        ->group(function () {
            Route::get('/', [PersonalController::class, 'index'])->name('index');
            Route::get('/profile', [PersonalController::class, 'profile'])->name('profile');
            Route::resource('link', LinkController::class)
                ->only(['index', 'store', 'create']);
            Route::middleware('user.has.link')
                ->group(function () {
                    Route::resource('link', LinkController::class)
                        ->except(['index', 'create', 'store']);
                });
        });
});
Route::get('/{link:back_halve}', [LinkController::class, 'link'])->name('link');

Route::post('/locale', [LocaleController::class, 'change'])->name('locale.update');
