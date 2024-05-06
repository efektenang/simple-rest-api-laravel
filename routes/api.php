<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

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

//API Routes
Route::get('students', [StudentController::class, 'listStudent']);
Route::get('students/{id}', [StudentController::class, 'getStudentById']);
Route::post('students', [StudentController::class, 'createStudent']);
Route::put('students/{id}', [StudentController::class, 'updateStudent']);
Route::delete('students/{id}', [StudentController::class, 'deleteStudent']);
