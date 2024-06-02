<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeStampController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [AuthenticatedSessionController::class, 'login']);
Route::get('/register', [RegisteredUserController::class, 'register']);
Route::post('/logout', [AttendanceController::class, 'destroy']);

Route::middleware('auth')->group(function () {
Route::get('/index', [TimeStampController::class, 'index']);
Route::get('/attendance', [AttendanceController::class, 'attendance']);
});