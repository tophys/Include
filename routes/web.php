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
Route::get('/gerenciar/prova/{id}',['as'=> 'alterar.prova', 'uses' => 'ProvaController@alterarProva']);
Route::put('/gerenciar/prova/{id}',['as'=> 'alterar.prova', 'uses' => 'ProvaController@salvarAlteracaoProva']);
Route::get('/gerenciar/prova/{id}/selecionar',['as'=> 'selecionar.questao', 'uses' => 'QuestaoController@selecionarQuestaoProva']);
Route::get('/gerenciar/questao', 'QuestaoController@gerenciarQuestao');
Route::get('/gerenciar/turma', 'TurmaController@gerenciarTurma');
Route::get('/gerenciar/questao/{id}',['as'=> 'alterar.questao', 'uses' => 'QuestaoController@alterarQuestao']);
Route::put('/gerenciar/questao/{id}',['as'=> 'alterar.questao', 'uses' => 'QuestaoController@salvarAlteracaoQuestao']);
Route::get('/gerenciar/alternativa/{id}',['as'=> 'alterar.alternativa', 'uses' => 'AlternativaController@alterarAlternativa']);
Route::put('/gerenciar/alternativa/{id}',['as'=> 'alterar.alternativa', 'uses' => 'AlternativaController@salvarAlteracaoAlternativa']);
Route::get('/gerenciar/alternativa/{id}/correta', ['as'=> 'alterar.alternativa.correta', 'uses' => 'AlternativaController@alterarAlternativaCorreta']);

Route::get('/nova/prova','ProvaController@criarProva');
Route::post('/nova/prova',['as'=> 'nova.prova', 'uses' => 'ProvaController@salvarProva']);
Route::get('/nova/questao','QuestaoController@criarQuestao');
Route::post('/nova/questao',['as' => 'nova.questao','uses' =>'QuestaoController@salvarQuestao']);
Route::get('/nova/turma','TurmaController@criarTurma');
Route::post('/nova/turma', [ 'as' => 'nova.turma', 'uses' => 'TurmaController@salvarTurma']);
Route::get('/nova/alternativa/{id}', 'AlternativaController@criarAlternativa');
Route::post('/nova/alternativa/{id}', [ 'as' => 'nova.alternativa', 'uses' => 'AlternativaController@salvarAlternativa']);





