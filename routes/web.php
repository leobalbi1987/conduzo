<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/site', function () {
    return view('site');
})->name('site');

Route::get('/dashboard', function () {
    return redirect()->route('admin.features.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::post('/home/features', [FeatureController::class, 'store'])->middleware(['auth', 'verified'])->name('home.feature.store');
Route::post('/home/features/{index}/delete', [FeatureController::class, 'destroy'])->middleware(['auth', 'verified'])->name('home.feature.delete');

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/administracao/home', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/administracao/usuarios', [AdminUsersController::class, 'index'])->name('admin.users.index');
    Route::post('/administracao/usuarios/{user}/toggle-admin', [AdminUsersController::class, 'toggleAdmin'])->name('admin.users.toggle');
    Route::get('/administracao/funcionalidades', [FeatureController::class, 'index'])->name('admin.features.index');
    Route::post('/administracao/funcionalidades', [FeatureController::class, 'store'])->name('admin.features.store');
    Route::patch('/administracao/funcionalidades/{feature}', [FeatureController::class, 'update'])->name('admin.features.update');
    Route::delete('/administracao/funcionalidades/{feature}', [FeatureController::class, 'destroy'])->name('admin.features.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
