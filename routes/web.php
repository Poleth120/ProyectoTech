<?php

use App\Http\Controllers\Profile\PasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\Profile\ProfileAvatarController;
use App\Http\Controllers\Profile\ProfileInformationController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('home');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth','verified'])->name('dashboard');



Route::middleware(['auth', 'verified'])->group(function ()
{


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



    Route::get('/profile', [ProfileInformationController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileInformationController::class, 'update'])->name('profile.update');
    Route::put('/password', [PasswordController::class, 'update'])->name('user-password.update');
    Route::put('/user-avatar', [ProfileAvatarController::class, 'update'])->name('user-avatar.update');


    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/create', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{user}', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/admin/update/{user}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/update/{user}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/destroy/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');    





    
    Route::get('/contratos', [ContratoController::class, 'index'])->name('contrato.index');
    Route::get('/contratos/create', [ContratoController::class, 'create'])->name('contrato.create');
    Route::post('/contratos/create', [ContratoController::class, 'store'])->name('contrato.store');
    Route::get('/contratos/{contrato}', [ContratoController::class, 'show'])->name('contrato.show');
    Route::get('/contratos/update/{contrato}', [ContratoController::class, 'edit'])->name('contrato.edit');
    Route::put('/contratos/update/{contrato}', [ContratoController::class, 'update'])->name('contrato.update');
    Route::get('/contratos/destroy/{contrato}', [ContratoController::class, 'destroy'])->name('contrato.destroy');
});




require __DIR__.'/auth.php';