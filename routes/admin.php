<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ViolenceController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserlistController;
use App\Http\Controllers\admin\ReportController;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'violence'], function(){
        Route::get('violenceRule', [ViolenceController::class, 'index'])->name('violence');
        Route::get('violenceRule/create', [ViolenceController::class, 'store'])->name('violence.store');
        Route::get('violenceRule/delete/{id}', [ViolenceController::class, 'delete'])->name('violence.delete');
        Route::get('violenceRule/editForm/{id}', [ViolenceController::class, 'editForm'])->name('violence.editForm');
        Route::get('violenceRule/edit/{id}', [ViolenceController::class, 'edit'])->name('violence.edit');
    });

    Route::group(['prefix' => 'userlist'], function(){
        Route::get('/', [UserlistController::class, 'index'])->name('userlist');
        Route::get('/ban/{id}', [UserlistController::class, 'ban'])->name('userlist.ban');
        Route::get('/banlist', [UserlistController::class, 'banlist'])->name('banlist');
        Route::get('/unban/{id}', [UserlistController::class, 'unban'])->name('banlist.unban');
        Route::get('/details/{id}', [UserlistController::class, 'detail'])->name('userlist.detail');
    });

    Route::group(['prefix'=>'report'], function(){
        Route::get('/', [ReportController::class, 'index'])->name('report');
        Route::get('/view/post/{id}', [ReportController::class, 'viewpost'])->name('viewpost');

    });
});
