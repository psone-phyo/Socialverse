<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\PostController;
use App\Http\Controllers\client\ProfileController;

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'user']], function(){
    Route::get('/home', [HomeController::class, 'home'])->name('home');

    Route::group(['prefix' => 'post'],  function(){
        Route::get('createPage', [PostController::class, 'index'])->name('post');
        Route::post('create', [PostController::class, 'store'])->name('post.store');
        Route::post('like', [PostController::class, 'like'])->name('post.like');
        Route::post('unlike', [PostController::class, 'unlike'])->name('post.unlike');
    });

    Route::group(['prefix' => 'profile'],  function(){
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    });
});
