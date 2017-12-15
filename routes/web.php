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

//Rota Comum
Route::get('/', function () {
    return view('bemvindo');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/perfil','UserController@perfilUsuario');
Route::post('/perfil','UserController@atualizarFotoUsuario');

//Rotas Professor
Route::group(['middleware' => ['professor']], function () 
{

    Route::get('/dashboard/professor', 'HomeController@dashboardProfessor');

    Route::get('/gerenciar/prova', 'ProvaController@gerenciarProva');
    Route::get('/gerenciar/prova/{id}',['as'=> 'alterar.prova', 'uses' => 'ProvaController@alterarProva']);
    Route::post('/gerenciar/prova/{id}',['as'=> 'alterar.prova', 'uses' => 'ProvaController@salvarAlteracaoProva']);
    Route::get('/gerenciar/prova/{id}/selecionar',['as'=> 'selecionar.questao', 'uses' => 'QuestaoController@selecionarQuestaoProva']);
    Route::post('/gerenciar/prova/{id}/selecionar',['as'=> 'selecionar.questao', 'uses' => 'QuestaoController@salvarQuestaoSelecionada']);
    Route::get('/gerenciar/prova/{id}/{questao}/deselecionar', ['as' => 'deselecionar.questao' , 'uses' => 'QuestaoController@deselecionarQuestao']);
    Route::get('/gerenciar/prova/{id}/excluir',['as'=> 'excluir.prova', 'uses' => 'ProvaController@excluirProva']);
    Route::get('/gerenciar/prova/{id}/liberar',['as'=> 'liberar.prova', 'uses' => 'ProvaController@selecionarLiberacaoProva']);
    Route::get('/gerenciar/prova/{id}/{agendamento}/desativar',['as'=> 'desativar.agendamento', 'uses' => 'ProvaController@desativarAgendamentoProva']);
    Route::post('/gerenciar/prova/{id}/liberar',['as'=> 'liberar.agendamento', 'uses' => 'ProvaController@liberarAgendamentoProva']);
    Route::get('/gerenciar/prova/{id}/detalhar', ['as' => 'detalhar.prova', 'uses' => 'ProvaController@detalharProva']);
    Route::get('/gerenciar/provas/{id}/desempenho', ['as'=> 'desempenho.prova', 'uses' => 'ProvaController@desempenhoProva']);

    Route::get('/gerenciar/questao', 'QuestaoController@gerenciarQuestao');
    Route::get('/gerenciar/questao/{id}',['as'=> 'alterar.questao', 'uses' => 'QuestaoController@alterarQuestao']);
    Route::post('/gerenciar/questao/{id}',['as'=> 'alterar.questao', 'uses' => 'QuestaoController@salvarAlteracaoQuestao']);
    Route::get('/gerenciar/questao/{id}/{alternativa}/excluir', ['as'=> 'excluir.alternativa', 'uses' => 'AlternativaController@excluirAlternativa'] );
    Route::get('/gerenciar/questao/{id}/excluir', ['as' => 'excluir.questao', 'uses' => 'QuestaoController@excluirQuestao']);
    Route::get('/gerenciar/questao/{id}/detalhar', ['as' => 'detalhar.questao', 'uses' => 'QuestaoController@detalharQuestao']);

    Route::get('/gerenciar/turma', 'TurmaController@gerenciarTurma');
    Route::get('/gerenciar/turma/{id}/excluir', ['as'=> 'excluir.turma', 'uses' => 'TurmaController@excluirTurma']);
    Route::get('/gerenciar/turma/{id}/desempenho', ['as'=> 'desempenho.turma', 'uses' => 'TurmaController@desempenhoTurma']);

    Route::get('/gerenciar/alternativa/{id}/correta', ['as'=> 'alterar.correta', 'uses' => 'AlternativaController@alterarAlternativaCorreta']);
    Route::post('/gerenciar/alternativa/{id}/correta', ['as'=> 'alterar.correta', 'uses' => 'AlternativaController@salvarAlternativaCorreta']);
    
    Route::get('/gerenciar/alternativa/{id}/{alternativa}',['as'=> 'alterar.alternativa', 'uses' => 'AlternativaController@alterarAlternativa']);
    Route::post('/gerenciar/alternativa/{id}/{alternativa}',['as'=> 'alterar.alternativa', 'uses' => 'AlternativaController@salvarAlteracaoAlternativa']);
    

    Route::get('/nova/prova','ProvaController@criarProva');
    Route::post('/nova/prova',['as'=> 'nova.prova', 'uses' => 'ProvaController@salvarProva']);
    Route::get('/nova/questao','QuestaoController@criarQuestao');
    Route::post('/nova/questao',['as' => 'nova.questao','uses' =>'QuestaoController@salvarQuestao']);
    Route::get('/nova/turma','TurmaController@criarTurma');
    Route::post('/nova/turma', [ 'as' => 'nova.turma', 'uses' => 'TurmaController@salvarTurma']);
    Route::get('/nova/alternativa/{id}', 'AlternativaController@criarAlternativa');
    Route::post('/nova/alternativa/{id}', [ 'as' => 'nova.alternativa', 'uses' => 'AlternativaController@salvarAlternativa']);

});


//Rotas Aluno
Route::group(['middleware' => ['aluno']], function () 
{

    Route::get('/dashboard/aluno', 'HomeController@dashboardAluno');

});

//Rotas Interprete
Route::group(['middleware' => ['interprete']], function () 
{

    Route::get('/dashboard/interprete', 'HomeController@dashboardInterprete');
    Route::get('/seleciomar/prova', 'UploadController@showProvas');
    Route::get('/selecionar/prova/{id}/questao', ['as' => 'selecionar.questao', 'uses' => 'UploadController@showQuestoesProva']);
    Route::get('/traduzir/alternativa/{id}', ['as' => 'traduzir.alternativa', 'uses' => 'UploadController@showAlternativa']);
    Route::post('/traduzir/alternativa/{id}', ['as' => 'traduzir.alternativa', 'uses' => 'UploadController@uploadAlternativa']);
    Route::get('/traduzir/questao/{id}', ['as' => 'traduzir.questao', 'uses' => 'UploadController@showQuestao']);
    Route::post('/traduzir/questao/{id}', ['as' => 'traduzir.questao', 'uses' => 'UploadController@uploadQuestao']);
    Route::get('/traduzir/questao/{id}/show', ['as' => 'show.questao', 'uses' => 'UploadController@showTrazudirQuestao']);
    Route::get('/selecionar/questao', 'UploadController@selecionarQuestao');
});










