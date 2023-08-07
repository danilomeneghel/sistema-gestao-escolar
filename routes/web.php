<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\TurmaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::prefix('alunos')->group(function(){
    Route::get('/', [AlunoController::class, 'index'])->name('alunos.index');
    Route::get('/create', [AlunoController::class, 'create'])->name('alunos.create');
    Route::post('/', [AlunoController::class, 'store'])->name('alunos.store');
    Route::get('/{id}/edit', [AlunoController::class, 'edit'])->name('alunos.edit');
    Route::put('/{id}', [AlunoController::class, 'update'])->name('alunos.update');
    Route::get('/{id}', [AlunoController::class, 'destroy'])->name('alunos.destroy');
});

Route::prefix('escolas')->group(function(){
    Route::get('/', [EscolaController::class, 'index'])->name('escolas.index');
    Route::get('/create', [EscolaController::class, 'create'])->name('escolas.create');
    Route::post('/', [EscolaController::class, 'store'])->name('escolas.store');
    Route::get('/{id}/edit', [EscolaController::class, 'edit'])->name('escolas.edit');
    Route::put('/{id}', [EscolaController::class, 'update'])->name('escolas.update');
    Route::get('/{id}', [EscolaController::class, 'destroy'])->name('escolas.destroy');
});

Route::prefix('turmas')->group(function(){
    Route::get('/', [TurmaController::class, 'index'])->name('turmas.index');
    Route::get('/create', [TurmaController::class, 'create'])->name('turmas.create');
    Route::post('/', [TurmaController::class, 'store'])->name('turmas.store');
    Route::get('/{id}/edit', [TurmaController::class, 'edit'])->name('turmas.edit');
    Route::put('/{id}', [TurmaController::class, 'update'])->name('turmas.update');
    Route::get('/{id}', [TurmaController::class, 'destroy'])->name('turmas.destroy');
});