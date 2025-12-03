<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rotas públicas
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('home')
        : redirect()->route('login');
});

Route::get('/site', function () {
    return view('site');
})->name('site');


/*
|--------------------------------------------------------------------------
| Rotas de usuário autenticado
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return redirect()->route('admin.features.index');
    })->name('dashboard');

    Route::get('/home', [HomeController::class, 'index'])
        ->name('home');

    Route::post('/home/features', [FeatureController::class, 'store'])
        ->name('home.feature.store');

    Route::delete('/home/features/{feature}', [FeatureController::class, 'destroy'])
        ->name('home.feature.delete');

    /*
    |--------------------------------------------------------------------------
    | Perfil do usuário
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| Rotas administrativas
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'admin'])
    ->prefix('administracao')
    ->name('admin.')
    ->group(function () {

        Route::get('/home', [AdminController::class, 'home'])
            ->name('home');

        // Usuários
        Route::get('/usuarios', [AdminUsersController::class, 'index'])
            ->name('users.index');

        Route::post('/usuarios', [AdminUsersController::class, 'store'])
            ->name('users.store');

        Route::patch('/usuarios/{user}/toggle-admin', [AdminUsersController::class, 'toggleAdmin'])
            ->name('users.toggle');

        // Funcionalidades
        Route::get('/funcionalidades', [FeatureController::class, 'index'])
            ->name('features.index');

        Route::post('/funcionalidades', [FeatureController::class, 'store'])
            ->name('features.store');

        Route::patch('/funcionalidades/{feature}', [FeatureController::class, 'update'])
            ->name('features.update');

        Route::delete('/funcionalidades/{feature}', [FeatureController::class, 'destroy'])
            ->name('features.destroy');
    });


/*
|--------------------------------------------------------------------------
| Rotas de autenticação
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
