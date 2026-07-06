<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessCtrl;
use App\Http\Controllers\CardCtrl;
use App\Http\Controllers\doorController;
use App\Http\Controllers\LogCtrl;
use App\Http\Controllers\userController;

//user
Route::post('user/add', [userController::class, 'add']);
Route::post('user/auth', [userController::class, 'authenticate']);
Route::put('user/update', [userController::class, 'update']);
Route::delete('user/delete', [userController::class, 'delete']);

// doors
Route::get('door/all', [doorController::class, 'getall']);
Route::post('door/add', [doorController::class, 'add']);
Route::put('door/update', [doorController::class, 'update']);
Route::delete('door/delete', [doorController::class, 'delete']);

// cards
Route::get('card/all', [CardCtrl::class, 'getall']);
Route::post('card/add', [CardCtrl::class, 'add']);
Route::put('card/update', [CardCtrl::class, 'update']);
Route::delete('card/delete', [CardCtrl::class, 'delete']);

// Access
Route::get('access/all', [AccessCtrl::class, 'getall']);
Route::post('access/add', [AccessCtrl::class, 'add']);
Route::post('access/check', [AccessCtrl::class, 'check']);
Route::delete('access/delete', [AccessCtrl::class, 'delete']);

//Logs
Route::get('log/day', [LogCtrl::class, 'getPastDay']);
Route::get('log/week', [LogCtrl::class, 'getPastWeek']);
Route::get('log/month', [LogCtrl::class, 'getPastMonth']);
Route::get('log/year', [LogCtrl::class, 'getPastYear']);
Route::get('log/all', [LogCtrl::class, 'getAll']);