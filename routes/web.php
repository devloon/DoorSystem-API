<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessCtrl;
use App\Http\Controllers\CardCtrl;
use App\Http\Controllers\DoorCtrl;
use App\Http\Controllers\LogCtrl;
use App\Http\Controllers\UserCtrl;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';