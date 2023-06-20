<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customController;

Route::get('/', function(){ return view('login'); })->name('login_get');
Route::get('/register', function(){ return view('register'); })->name('register_get');
Route::get('/page', [customController::class, 'page_get'])->middleware(['auth', 'ban_mdlwr'])->name('page_get');
Route::get('/admin', [customController::class, 'admin_get'])->middleware(['auth', 'admin_mdlwr'])->name('admin_get');
Route::get('/ban', [customController::class, 'ban_notif'])->middleware('auth')->name('ban_notif');

Route::post('/register/process', [customController::class, 'register_process'])->name('register_process');
Route::post('/process', [customController::class, 'login_process'])->name('login_process');
Route::post('/page/add', [customController::class, 'add_record'])->middleware('auth')->name('page_add');

Route::delete('/logout', [customController::class, 'logout'])->middleware('auth')->name('logout');
Route::delete('/page/drop', [customController::class, 'page_drop'])->middleware('auth')->name('page_drop');

Route::put('/page/update', [customController::class, 'page_update'])->middleware('auth')->name('page_update');
Route::put('/admin/ban', [customController::class, 'admin_ban'])->middleware(['auth', 'admin_mdlwr'])->name('admin_put');
Route::put('/admin/unban', [customController::class, 'admin_unban'])->middleware(['auth', 'admin_mdlwr'])->name('admin_put_unban');