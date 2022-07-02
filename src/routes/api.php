<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiControllers\CursoController;
use App\Http\Controllers\ApiControllers\AlumnoController;
use App\Http\Controllers\ApiControllers\ProfesorController;
use App\Http\Controllers\ApiControllers\CamadaController;
use App\Http\Controllers\ApiControllers\CategoriaCursoController;

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

Route::apiResource('profesores', ProfesorController::class);
Route::apiResource('alumnos', AlumnoController::class);
Route::apiResource('cursos', CursoController::class);
Route::apiResource('camadas', CamadaController::class);
Route::apiResource('categorias_curso', CategoriaCursoController::class);