<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\TimesheetController;


Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::post('logout', [AuthController::class,'logout']);
    Route::resource('users',UserController::class);
    Route::resource('projects',ProjectController::class);
    Route::resource('timesheets',TimesheetController::class);



});
