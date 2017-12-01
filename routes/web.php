<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dashboard/aluno', 'HomeController@dashboardAluno');
Route::get('/dashboard/professor', 'HomeController@dashboardProfessor');
Route::get('/dashboard/interprete', 'HomeController@dashboardInterprete');

Route::get('/gerenciar/prova', 'ProvaController@gerenciarProva');
Route::get('/gerenciar/novaprova','ProvaController@criarProva');

Route::get('/gerenciar/questao', 'QuestaoController@gerenciarQuestao');
Route::get('/gerenciar/novaquestao','QuestaoController@criarQuestao');

Route::get('/gerenciar/turma', 'TurmaController@gerenciarTurma');
Route::get('/gerenciar/novaturma','TurmaController@criarTurma');