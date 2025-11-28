<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('landing');
});

Route::fallback(fn() => view('404'))->name('404');
    
Route::post('/login', [AuthController::class, 'login'])
    ->name('login');
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
Route::get('/login', [AuthController::class, 'getLoginPage'])
    ->name('login.page');

Route::post('/contacts', [ContactController::class, 'create'])->name('create');

// Admin Routes
Route::group(['auth:sanctum', 'middleware' => IsAdmin::class], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/contacts', [ContactController::class, 'getAllContacts'])->name('getAllContacts');
    Route::get('/contacts/export/excel', [ContactController::class, 'exportExcel'])->name('exportExcel');
    Route::get('/contacts/{id}', [ContactController::class, 'getcontactById'])->name('getcontactById');
    Route::delete('/contacts/{id}', [ContactController::class, 'delete'])->name('deleteContact');
});

// User Routes
Route::group(['auth:sanctum', 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/contacts', [UserController::class, 'indexContacts'])->name('contacts.index');
    Route::get('/contacts/{id}', [UserController::class, 'showContact'])->name('contacts.show');
    Route::get('/export', [UserController::class, 'exportContacts'])->name('export');
});