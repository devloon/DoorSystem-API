<?php

use App\Http\Controllers\AccessCtrl;
use App\Http\Controllers\CardCtrl;
use App\Http\Controllers\DoorCtrl;
use App\Http\Controllers\LogCtrl;
use App\Http\Controllers\UserCtrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//user
Route::post('user/add', [UserCtrl::class, 'add']);
Route::post('user/auth', [UserCtrl::class, 'authenticate']);
Route::put('user/update', [UserCtrl::class, 'update']);
Route::delete('user/delete', [UserCtrl::class, 'delete']);

// doors
Route::get('door/all', [DoorCtrl::class, 'getall']);
Route::post('door/add', [DoorCtrl::class, 'add']);
Route::put('door/update', [DoorCtrl::class, 'update']);
Route::delete('door/delete', [DoorCtrl::class, 'delete']);

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
Route::get('log/week', [LogCtrl::class, 'getPastWeek']);
Route::get('log/month', [LogCtrl::class, 'getPastMonth']);
Route::get('log/year', [LogCtrl::class, 'getPastYear']);
Route::get('log/all', [LogCtrl::class, 'getAll']);