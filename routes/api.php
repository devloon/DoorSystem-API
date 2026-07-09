<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accessController;
use App\Http\Controllers\keycardController;
use App\Http\Controllers\doorController;
use App\Http\Controllers\logController;
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

// keycards
Route::get('keycard/all', [keycardController::class, 'getall']);
Route::post('keycard/add', [keycardController::class, 'add']);
Route::put('keycard/update', [keycardController::class, 'update']);
Route::delete('keycard/delete', [keycardController::class, 'delete']);

// Access
Route::get('access/all', [accessController::class, 'getall']);
Route::post('access/add', [accessController::class, 'add']);
Route::post('access/check', [accessController::class, 'check']);
Route::delete('access/delete', [accessController::class, 'delete']);

//Logs
Route::get('log/day', [logController::class, 'getPastDay']);
Route::get('log/week', [logController::class, 'getPastWeek']);
Route::get('log/month', [logController::class, 'getPastMonth']);
Route::get('log/year', [logController::class, 'getPastYear']);
Route::get('log/all', [logController::class, 'getAll']);