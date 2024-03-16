<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\WorkController;
use App\Http\Controllers\Api\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

Route::apiResource('users', UserController::class);

Route::apiResource('companies', CompanyController::class) ;

Route::apiResource('groups', GroupController::class);

Route::middleware('auth:sanctum')->apiResource('works', WorkController::class)->middleware('auth:sanctum');
/* ACESSO  */


Route::post("/register", function (Request $request) {
    $validator = Validator::make($request->all(), [
        "name" => "required|string",
        "email" => "required|string|email",
        "password" => "required|string|min:6"
    ]);
    if ($validator->fails()) {
        return response()->json([
            "message" => "Validation Error",
            "errors" => $validator->errors()
        ]);
    }

    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();

    return response()->json([
        "message" => "Usuario criado com sucesso"
    ]);
});

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = $request ->user();
        $token = $user->createToken('auth_token')->plainTextToken;
        
    
    return response()->json([
        "access_token" => $token,
        "token_type" => "Bearer"

        
    ]);
    
    }
    return response()->json([
        "error" => "Invalid Credentials"
    ], 401);
});

Route::middleware('auth:sanctum')->get('/user/profile', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();
    return response()->json([
        "message" => "Logout com sucesso"
    ]);
});