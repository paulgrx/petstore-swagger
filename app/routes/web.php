<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

Route::resource('pet', PetController::class)->except(['show']);
