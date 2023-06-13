<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customController;

Route::get('/', function(){ return view('login'); })->name('login_get');
Route::get('/register', function(){ return view('register'); })->name('register_get');
Route::get('/page', [customController::class, 'page_get'])->name('page_get');

Route::post('/register/process', [customController::class, 'register_process'])->name('register_process');
Route::post('/process', [customController::class, 'login_process'])->name('login_process');

