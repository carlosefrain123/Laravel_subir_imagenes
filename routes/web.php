<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/admin/files', [FileController::class, 'index'])->name('admin.files.index');
    Route::get('/admin/files/create', [FileController::class, 'create'])->name('admin.files.create');
    Route::post('/admin/files', [FileController::class, 'store'])->name('admin.files.store');
    Route::get('/admin/files/{file}/edit', [FileController::class, 'edit'])->name('admin.files.edit');
});

require __DIR__.'/auth.php';
