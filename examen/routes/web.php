<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\AppointmentController;
use App\Http\Controllers\Frontend\MeetingRoomController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('index', [UserController::class, 'index']);
    Route::get('help', [UserController::class, 'help']);
    Route::get('profile', [UserController::class, 'profile']);
    Route::put('update-profile', [UserController::class, 'updateprofile']);  

    Route::get('mr', [MeetingRoomController::class, 'index']);
    Route::get('btn-insert-mr', [MeetingRoomController::class, 'add']);
    Route::post('insert-mr', [MeetingRoomController::class, 'insert']);
    Route::get('edit-mr/{id}', [MeetingRoomController::class, 'edit']);
    Route::put('update-mr/{id}', [MeetingRoomController::class, 'update']);
    Route::get('delete-mr/{id}', [MeetingRoomController::class, 'destroy']);

    Route::get('customer', [CustomerController::class, 'index']);
    Route::get('btn-insert-customer', [CustomerController::class, 'add']);
    Route::post('insert-customer', [CustomerController::class, 'insert']);
    Route::get('edit-customer/{id}', [CustomerController::class, 'edit']);
    Route::put('update-customer/{id}', [CustomerController::class, 'update']);
    Route::get('delete-customer/{id}', [CustomerController::class, 'destroy']);

    Route::get('appointment', [AppointmentController::class, 'index']);
    Route::get('btn-insert-app/{id}', [AppointmentController::class, 'add']);
    Route::post('insert-app/{id}', [AppointmentController::class, 'insert']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
