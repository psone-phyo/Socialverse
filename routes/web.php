<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    return to_route('login');
});



Route::get('/icons', function () {
    return view('pages.icons');
})->name('pages.icons');

Route::get('/maps', function () {
    return view('pages.map');
})->name('pages.maps');

Route::get('/notifications', function () {
    return view('pages.notifications');
})->name('pages.notifications');

Route::get('/tables', function () {
    return view('pages.tables');
})->name('pages.tables');

Route::get('/typography', function () {
    return view('pages.typography');
})->name('pages.typography');

Route::get('/rtl', function () {
    return view('pages.rtl');
})->name('pages.rtl');

Route::get('/upgrade', function () {
    return view('pages.upgrade');
})->name('pages.upgrade');

Route::get('/pusher/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard.test');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/pushertest', function () {
    return view('pushertest');
})->name('pusher');

Route::get('/form', function () {
    return view('form');
});

Route::post('/formpost', [FileController::class, 'index'])->name('form');

require __DIR__.'/auth.php';
require __DIR__ .'/admin.php';
require __DIR__ .'/user.php';

