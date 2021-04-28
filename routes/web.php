<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FileController;
use App\Models\File;
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
    $files = File::all();
    return view('home', compact('files'));
})->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/admin/file/create', [FileController::class, 'create'])->name('file.create');
Route::post('/admin/file/store', [FileController::class, 'store'])->name('file.store');
