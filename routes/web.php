<?php

use App\Core\Http\Route;

Route::get('/user/id', [UserController::class, 'index']);
