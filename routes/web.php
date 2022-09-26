<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EixoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\DisciplinaController;


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
    return view('menu');
})->name('menu');


Route::get('/alunos/listar', [AlunoController::class, 'listar'])->name('alunos.listar');
Route::get('/alunos/criar', [AlunoController::class, 'criar'])->name('alunos.criar');
Route::get('/alunos/editar/{id}', [AlunoController::class, 'editar'])->name('alunos.editar');
Route::get('/alunos/deletar/{id}', [AlunoController::class, 'deletar'])->name('alunos.deletar');
Route::get('/alunos/vincular_disciplinas/{id}', [AlunoController::class, 'vincular'])->name('alunos.vincular_disciplinas');
Route::post('/alunos/criar_aluno', [AlunoController::class, 'criarAluno'])->name('alunos.criar_aluno');
Route::post('/alunos/editar_aluno', [AlunoController::class, 'editarAluno'])->name('alunos.editar_aluno');


Route::get('/cursos/listar', [CursoController::class, 'listar'])->name('cursos.listar');
Route::get('/cursos/criar', [CursoController::class, 'criar'])->name('cursos.criar');
Route::get('/cursos/editar/{id}', [CursoController::class, 'editar'])->name('cursos.editar');
Route::get('/cursos/deletar/{id}', [CursoController::class, 'deletar'])->name('cursos.deletar');
Route::post('/cursos/criar_curso', [CursoController::class, 'criarCurso'])->name('cursos.criar_curso');
Route::post('/cursos/editar_curso', [CursoController::class, 'editarCurso'])->name('cursos.editar_curso');


Route::get('/eixos/listar', [EixoController::class, 'listar'])->name('eixos.listar');
Route::get('/eixos/criar', [EixoController::class, 'criar'])->name('eixos.criar');
Route::get('/eixos/editar/{id}', [EixoController::class, 'editar'])->name('eixos.editar');
Route::get('/eixos/deletar/{id}', [EixoController::class, 'deletar'])->name('eixos.deletar');
Route::post('/eixos/criar_eixo', [EixoController::class, 'criarEixo'])->name('eixos.criar_eixo');
Route::post('/eixos/editar_eixo', [EixoController::class, 'editarEixo'])->name('eixos.editar_eixo');


Route::get('/professores/listar', [ProfessorController::class, 'listar'])->name('professores.listar');
Route::get('/professores/criar', [ProfessorController::class, 'criar'])->name('professores.criar');
Route::get('/professores/editar/{id}', [ProfessorController::class, 'editar'])->name('professores.editar');
Route::get('/professores/deletar/{id}', [ProfessorController::class, 'deletar'])->name('professores.deletar');
Route::get('/professores/vincular_disciplinas', [ProfessorController::class, 'vincular'])->name('professores.vincular_disciplinas');
Route::post('/professores/criar_professores', [ProfessorController::class, 'criarProfessor'])->name('professores.criar_professor');
Route::post('/professores/editar_professores', [ProfessorController::class, 'editarProfessor'])->name('professores.editar_professor');


Route::get('/disciplinas/listar', [DisciplinaController::class, 'listar'])->name('disciplinas.listar');
Route::get('/disciplinas/criar', [DisciplinaController::class, 'criar'])->name('disciplinas.criar');
Route::get('/disciplinas/editar/{id}', [DisciplinaController::class, 'editar'])->name('disciplinas.editar');
Route::get('/disciplinas/deletar/{id}', [DisciplinaController::class, 'deletar'])->name('disciplinas.deletar');
Route::post('/disciplinas/criar_disciplinas', [DisciplinaController::class, 'criarDisciplina'])->name('disciplinas.criar_disciplina');
Route::post('/disciplinas/editar_disciplinas', [DisciplinaController::class, 'editarDisciplina'])->name('disciplinas.editar_disciplina');

Route::post('/vincular/aluno_disciplinas', [AlunoController::class, 'vincularDisciplinas'])->name('alunos.vincular_disciplinas_post');
Route::post('/vincular/professores_disciplinas', [ProfessorController::class, 'vincularDisciplinas'])->name('professores.vincular_disciplinas_post');

