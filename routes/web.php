<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('home');
})->name('home');

Auth::routes();

Route::get('/login/{provider}', [LoginController::class, 'socialRedirectToProvider'])->name('client.login.provider');
Route::get('/login/{provider}/callback', [LoginController::class, 'socialHandleProviderCallback']);
