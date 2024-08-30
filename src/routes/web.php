<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeStampController;
use App\Http\Controllers\RestTimeStampController;
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

Route::get('/', [AuthenticatedSessionController::class, 'login']);
Route::get('/register', [RegisteredUserController::class, 'register']);

Route::middleware('auth')->group(function () {
Route::get('/index', [TimeStampController::class, 'index']);
Route::get('/attendance', [AttendanceController::class, 'attendance']);
Route::get('attendance/{date?}', [AttendanceController::class, 'showByDate'])->name('attendance.showByDate');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/attendance_start', [TimeStampController::class, 'attendance_start']);
    Route::post('/attendance_end', [TimeStampController::class, 'attendance_end']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/rest_start', [RestTimeStampController::class, 'rest_start']);
    Route::post('/rest_end', [RestTimeStampController::class, 'rest_end']);
});
