<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GalleryController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('api')->get('/galleries', [GalleryController::class,'index']);
Route::middleware('api')->get('/galleries/{id}',[GalleryController::class,'show']);
Route::middleware('api')->post('/galleries', [GalleryController::class,'store']);
Route::middleware('api')->put('/galleries/{id}', [GalleryController::class,'update']);
Route::middleware('api')->delete('/galleries/{id}', [GalleryController::class,'destroy']);


