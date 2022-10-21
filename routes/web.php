<?php

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
    return view('welcome');
});
Route::middleware('auth:sanctum')->group(static function () {
    Route::prefix('dashboard')->group(static function () {
        Route::get('/{any?}', static function (){
            return view('layouts.dashboard');
        })->where('any','.*')->name('dashboard');
    });
});
Route::get('auth-check', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'authCheck']);

require __DIR__.'/auth.php';
