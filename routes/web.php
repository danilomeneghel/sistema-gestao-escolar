<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\NotaController;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{

	Route::group(['middleware' => ['guest']], function() {
		/**
		 * Register Routes
		 */
		Route::get('/register', 'RegisterController@show')->name('register.show');
		Route::post('/register', 'RegisterController@register')->name('register.perform');

		/**
		 * Login Routes
		 */
		Route::get('/login', 'LoginController@show')->name('login.show');
		Route::post('/login', 'LoginController@login')->name('login.perform');
	});

	Route::group(['middleware' => ['auth']], function() {

		/**
		* Home Routes
		*/
		Route::get('/', 'HomeController@index')->name('home.index');

		/**
		 * Logout Routes
		 */
		Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

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

        Route::prefix('materias')->group(function(){
            Route::get('/', [MateriaController::class, 'index'])->name('materias.index');
            Route::get('/create', [MateriaController::class, 'create'])->name('materias.create');
            Route::post('/', [MateriaController::class, 'store'])->name('materias.store');
            Route::get('/{id}/edit', [MateriaController::class, 'edit'])->name('materias.edit');
            Route::put('/{id}', [MateriaController::class, 'update'])->name('materias.update');
            Route::get('/{id}', [MateriaController::class, 'destroy'])->name('materias.destroy');
        });

        Route::prefix('periodos')->group(function(){
            Route::get('/', [PeriodoController::class, 'index'])->name('periodos.index');
            Route::get('/create', [PeriodoController::class, 'create'])->name('periodos.create');
            Route::post('/', [PeriodoController::class, 'store'])->name('periodos.store');
            Route::get('/{id}/edit', [PeriodoController::class, 'edit'])->name('periodos.edit');
            Route::put('/{id}', [PeriodoController::class, 'update'])->name('periodos.update');
            Route::get('/{id}', [PeriodoController::class, 'destroy'])->name('periodos.destroy');
        });

		Route::prefix('notas')->group(function(){
            Route::get('/', [NotaController::class, 'index'])->name('notas.index');
            Route::get('/create', [NotaController::class, 'create'])->name('notas.create');
            Route::post('/', [NotaController::class, 'store'])->name('notas.store');
            Route::get('/{id}/edit', [NotaController::class, 'edit'])->name('notas.edit');
            Route::put('/{id}', [NotaController::class, 'update'])->name('notas.update');
            Route::get('/{id}', [NotaController::class, 'destroy'])->name('notas.destroy');
        });
	});
});
