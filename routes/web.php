<?php

use App\Http\Controllers\DataController;
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

Route::get('/', [DataController::class, 'index'])->name('data.index');

Route::any('/search', [DataController::class, 'search'])->name('data.search');

Route::get('/details/{type}/{id}', [DataController::class, 'view'])->name('data.details');

