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

//create
Route::get('/admin/file/create', [FileController::class, 'create'])->name('file.create');
Route::post('/admin/file/store', [FileController::class, 'store'])->name('file.store');
//delete
Route::delete('/admin/file/{id}/destroy', [FileController::class, 'destroy'])->name('file.destroy');
//Edit
Route::get('/admin/file/{id}/edit', [FileController::class, 'edit'])->name('file.edit');
Route::put('/admin/file/{id}', [FileController::class, 'update'])->name('file.update');
//Download
Route::get('/download/{id}/files', [FileController::class, 'download'])->name('file.download');