<?php

use App\Core\Http\Route;

Route::get('/user', [UserController::class, 'index']);
