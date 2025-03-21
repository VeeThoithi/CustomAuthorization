<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

Route::get('/', function () {
    return view('welcome');
}) ->name('home');

Route::get('/login', [AuthManager::class, 'login'])->name('login');

Route::post('/login', [AuthManager::class, 'loginpost'])->name('login.post');

Route::get('/registration',[AuthManager::class, 'registration'])->name('registration');

Route::post('/registration',[AuthManager::class, 'registrationpost'])->name('registration.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::group(['Middleware'=>'auth'], function(){
   Route::get('/profile', function(){
    return "Hey";
   });
});