<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function(){
    return "Hello World";
});

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::get('/students/search/{name}', [StudentController::class, 'search']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/students', [StudentController::class, 'store']);
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);
    Route::put('/students/{id}', [StudentController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
 
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
