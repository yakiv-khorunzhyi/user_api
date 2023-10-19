<?php

use Illuminate\Support\Facades\Route;

Route::resource('users', \Modules\User\Controllers\ResourceController::class);
