<?php

use App\Http\Controllers\Api\GroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;




Route::apiResource('companies', CompanyController::class);

Route::apiResource('groups', GroupController::class);