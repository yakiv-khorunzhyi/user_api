<?php

use Illuminate\Support\Facades\Route;

Route::resource('users', \Modules\User\Http\Controllers\UserController::class);
