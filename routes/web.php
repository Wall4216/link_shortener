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
Route::get('/links', [\App\Http\Controllers\LinkController::class,'show'])->name('links.show');
Route::post('/links', [\App\Http\Controllers\LinkController::class,'send'])->name('links.send');
Route::get('/links/{prefix}', [\App\Http\Controllers\LinkController::class, 'away'])->name('links.away')->where('prefix', '\w+');
