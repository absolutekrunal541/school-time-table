<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\TimetableController;

Route::get('/generate-timetable', [TimetableController::class, 'index']);
