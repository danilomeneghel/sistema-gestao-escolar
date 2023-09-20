<?php

use App\Http\Controllers\Api\AlunoController;
use App\Http\Controllers\Api\EscolaController;
use App\Http\Controllers\Api\TurmaController;
use App\Http\Controllers\Api\MateriaController;
use App\Http\Controllers\Api\PeriodoController;
use App\Http\Controllers\Api\NotaController;
use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Rotas API Alunos
Route::get('alunos', [AlunoController::class, 'index']);
Route::get('aluno/{id}', [AlunoController::class, 'show']);
Route::post('aluno', [AlunoController::class, 'store']);
Route::put('aluno/{id}', [AlunoController::class, 'update']);
Route::delete('aluno/{id}', [AlunoController::class, 'destroy']);

//Rotas API Escolas
Route::get('escolas', [EscolaController::class, 'index']);
Route::get('escola/{id}', [EscolaController::class, 'show']);
Route::post('escola', [EscolaController::class, 'store']);
Route::put('escola/{id}', [EscolaController::class, 'update']);
Route::delete('escola/{id}', [EscolaController::class, 'destroy']);

//Rotas API Turmas
Route::get('turmas', [TurmaController::class, 'index']);
Route::get('turma/{id}', [TurmaController::class, 'show']);
Route::post('turma', [TurmaController::class, 'store']);
Route::put('turma/{id}', [TurmaController::class, 'update']);
Route::delete('turma/{id}', [TurmaController::class, 'destroy']);

//Rotas API Materias
Route::get('materias', [MateriaController::class, 'index']);
Route::get('materia/{id}', [MateriaController::class, 'show']);
Route::post('materia', [MateriaController::class, 'store']);
Route::put('materia/{id}', [MateriaController::class, 'update']);
Route::delete('materia/{id}', [MateriaController::class, 'destroy']);

//Rotas API Periodos
Route::get('periodos', [PeriodoController::class, 'index']);
Route::get('periodo/{id}', [PeriodoController::class, 'show']);
Route::post('periodo', [PeriodoController::class, 'store']);
Route::put('periodo/{id}', [PeriodoController::class, 'update']);
Route::delete('periodo/{id}', [PeriodoController::class, 'destroy']);

//Rotas API Notas
Route::get('notas', [NotaController::class, 'index']);
Route::get('nota/{id}', [NotaController::class, 'show']);
Route::post('nota', [NotaController::class, 'store']);
Route::put('nota/{id}', [NotaController::class, 'update']);
Route::delete('nota/{id}', [NotaController::class, 'destroy']);

//Rotas API Usuário
Route::get('users', [UserController::class, 'index']);
Route::get('user/{id}', [UserController::class, 'show']);
Route::post('user', [UserController::class, 'store']);
Route::put('user/{id}', [UserController::class, 'update']);
Route::delete('user/{id}', [UserController::class, 'destroy']);
