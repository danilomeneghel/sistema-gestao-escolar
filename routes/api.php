<?php

use App\Http\Controllers\Api\AlunoController;
use App\Http\Controllers\Api\EscolaController;
use App\Http\Controllers\Api\TurmaController;
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