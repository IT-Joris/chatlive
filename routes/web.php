<?php

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

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified' ])->group(function () {
    Route::get('/dashboard',  ['App\Http\Controllers\SendMessageController', 'index'])->name('dashboard');

    Route::get('/dashboard/file',  ['App\Http\Controllers\FileController', 'index'])->name('dashboard.file');
    Route::post('/dashboard/file',  ['App\Http\Controllers\FileController', 'store'])->name('dashboard.file.post');
    Route::get('/dashboard/file/{file}',  ['App\Http\Controllers\FileController', 'download'])->name('dashboard.file.download');
});
