<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('/schedules', ScheduleController::class);

Route::apiResource('/members', MemberController::class);

Route::apiResource('/roles', RoleController::class);
