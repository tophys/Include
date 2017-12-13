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

Route::get('/perfil','UserController@perfilUsuario');
Route::post('/perfil','UserController@atualizarFotoUsuario');

Route::get('/gerenciar/prova', 'ProvaController@gerenciarProva');
Route::get('/gerenciar/prova/{id}',['as'=> 'alterar.prova', 'uses' => 'ProvaController@alterarProva']);
Route::post('/gerenciar/prova/{id}',['as'=> 'alterar.prova', 'uses' => 'ProvaController@salvarAlteracaoProva']);
Route::get('/gerenciar/prova/{id}/selecionar',['as'=> 'selecionar.questao', 'uses' => 'QuestaoController@selecionarQuestaoProva']);
Route::get('/gerenciar/prova/{id}/excluir',['as'=> 'excluir.prova', 'uses' => 'ProvaController@excluirProva']);
Route::get('/gerenciar/prova/{id}/liberar',['as'=> 'liberar.prova', 'uses' => 'ProvaController@selecionarLiberacaoProva']);
Route::get('/gerenciar/prova/{id}/{agendamento}/desativar',['as'=> 'desativar.agendamento', 'uses' => 'ProvaController@desativarAgendamentoProva']);
Route::post('/gerenciar/prova/{id}/liberar',['as'=> 'liberar.agendamento', 'uses' => 'ProvaController@liberarAgendamentoProva']);
Route::get('/gerenciar/prova/{id}/detalhar', ['as' => 'detalhar.prova', 'uses' => 'ProvaController@detalharProva']);

//Verificar esta rota Luis
//
Route::get('/gerenciar/prova/{id}/desempenho', ['as'=> 'desempenho.prova', 'uses' => 'ProvaController@DesempenhoProva']);
//

Route::get('/gerenciar/questao', 'QuestaoController@gerenciarQuestao');
Route::get('/gerenciar/questao/{id}',['as'=> 'alterar.questao', 'uses' => 'QuestaoController@alterarQuestao']);
Route::put('/gerenciar/questao/{id}',['as'=> 'alterar.questao', 'uses' => 'QuestaoController@salvarAlteracaoQuestao']);
Route::get('/gerenciar/questao/{id}/{alternativa}/excluir', ['as'=> 'excluir.alternativa', 'uses' => 'AlternativaController@excluirAlternativa'] );
Route::get('/gerenciar/questao/{id}/excluir', ['as'=> 'excluir.questao', 'uses' => 'QuestaoController@excluirQuestao']);

Route::get('/gerenciar/turma', 'TurmaController@gerenciarTurma');
Route::get('/gerenciar/turma/{id}/excluir', ['as'=> 'excluir.turma', 'uses' => 'TurmaController@excluirTurma']);

//Verificar esta rota Luis
//
Route::get('/gerenciar/turma/{id}/desempenho', ['as'=> 'desempenho.turma', 'uses' => 'TurmaController@DesempenhoTurma']);
//

Route::get('/gerenciar/alternativa/{id}',['as'=> 'alterar.alternativa', 'uses' => 'AlternativaController@alterarAlternativa']);
Route::put('/gerenciar/alternativa/{id}',['as'=> 'alterar.alternativa', 'uses' => 'AlternativaController@salvarAlteracaoAlternativa']);
Route::get('/gerenciar/alternativa/{id}/correta', ['as'=> 'alterar.alternativa.correta', 'uses' => 'AlternativaController@alterarAlternativaCorreta']);
Route::post('/gerenciar/alternativa/{id}/correta', ['as'=> 'alterar.alternativa.correta', 'uses' => 'AlternativaController@salvarAlternativaCorreta']);


Route::get('/nova/prova','ProvaController@criarProva');
Route::post('/nova/prova',['as'=> 'nova.prova', 'uses' => 'ProvaController@salvarProva']);
Route::get('/nova/questao','QuestaoController@criarQuestao');
Route::post('/nova/questao',['as' => 'nova.questao','uses' =>'QuestaoController@salvarQuestao']);
Route::get('/nova/turma','TurmaController@criarTurma');
Route::post('/nova/turma', [ 'as' => 'nova.turma', 'uses' => 'TurmaController@salvarTurma']);
Route::get('/nova/alternativa/{id}', 'AlternativaController@criarAlternativa');
Route::post('/nova/alternativa/{id}', [ 'as' => 'nova.alternativa', 'uses' => 'AlternativaController@salvarAlternativa']);





