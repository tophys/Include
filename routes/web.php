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
    return view('bemvindo');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dashboard/aluno', 'HomeController@dashboardAluno');
Route::get('/dashboard/professor', 'HomeController@dashboardProfessor');
Route::get('/dashboard/interprete', 'HomeController@dashboardInterprete');

Route::get('/gerenciar/prova', 'ProvaController@gerenciarProva');
Route::get('/nova/prova','ProvaController@criarProva');
Route::post('/nova/prova',['as'=> 'nova.prova', 'uses' => 'ProvaController@salvarProva']);
Route::post('/alterar/prova',['as'=> 'alterar.prova', 'uses' => 'ProvaController@alterarProva']);

Route::get('/gerenciar/questao', 'QuestaoController@gerenciarQuestao');
Route::get('/nova/questao','QuestaoController@criarQuestao');
Route::post('/nova/questao',['as' => 'nova.questao','uses' =>'QuestaoController@salvarQuestao']);

Route::get('/gerenciar/turma', 'TurmaController@gerenciarTurma');
Route::get('/nova/turma','TurmaController@criarTurma');
Route::post('/nova/turma', [ 'as' => 'nova.turma', 'uses' => 'TurmaController@salvarTurma']);