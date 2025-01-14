<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaceExpressionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Public routes
// Route::resource('animal',AnimalController::class);
Route::get('/animal',[AnimalController::class,'index']);
Route::get('/animal/{id}',[AnimalController::class,'show']);
Route::get('/status',[FaceExpressionController::class,'index']);
Route::get('/status/{status}',[FaceExpressionController::class,'show']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/animal',[AnimalController::class,'store']);
Route::put('/animal/{id}',[AnimalController::class,'update']);
Route::delete('/animal/{id}',[AnimalController::class,'destroy']);
Route::post('/status',[FaceExpressionController::class,'store']);
Route::put('/status/{status}',[FaceExpressionController::class,'update']);
Route::delete('/status/{status}',[FaceExpressionController::class,'destroy']);


//Protected routes
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('/logout',[AuthController::class,'logout']);

});
