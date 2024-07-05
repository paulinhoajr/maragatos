<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [SiteController::class, 'inicial'])->name('inicial');
Route::get('/sobre', [SiteController::class, 'sobre'])->name('sobre');
Route::get('/contato', [SiteController::class, 'contato'])->name('contato');
Route::post('/contato', [SiteController::class, 'enviar_email'])->name('enviar_email');

Auth::routes();

Route::group(['prefix' => '/admin', 'middleware' => ['auth'], 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('/backup', [SiteController::class, 'backupDatabase'])->name('backupDatabase');
    Route::controller(RoleController::class)
        ->name('roles.')
        ->prefix('/roles')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/show/{id}', 'show')->name('show');
            Route::put('/store', 'store')->name('store');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });
    Route::controller(PermissionController::class)
        ->name('permissions.')
        ->prefix('/permissions')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/show/{id}', 'show')->name('show');
            Route::put('/store', 'store')->name('store');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });
    Route::controller(UserController::class)
        ->name('users.')
        ->prefix('/users')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/show/{id}', 'show')->name('show');
            Route::put('/store', 'store')->name('store');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });
    Route::controller(ProductController::class)
        ->name('products.')
        ->prefix('/products')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/show/{id}', 'show')->name('show');
            Route::put('/store', 'store')->name('store');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
            Route::delete('/pimage/{id}', 'destroyImage')->name('destroyImage');
        });
    Route::controller(SlidersController::class)
        ->name('sliders.')
        ->prefix('/sliders')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/show/{id}', 'show')->name('show');
            Route::put('/store', 'store')->name('store');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });
});

Route::get('/admin', [HomeController::class, 'index'])->name('dashboard');
