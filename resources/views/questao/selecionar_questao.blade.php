@extends('layouts.padrao')

@section('titulo','Selecionar Questões')

@section('plugins')
    <link rel="stylesheet" href="{{asset('/fullcalendar/fullcalendar.min.css')}}" />
	<link rel="stylesheet" href="{{asset('/fullcalendar/fullcalendar.print.min.css')}}" />
	<link rel="stylesheet" href="{{asset('/fullcalendar/fullcalendar.print.css')}}" />
	<link rel="stylesheet" href="{{asset('/fullcalendar/fullcalendar.css')}}" />
	<link rel="stylesheet" href="{{asset('/css/dashboard-style.css')}}" />
@endsection

@section('conteudo')
<div class="main">
	  <div class="container-fluid">
		<div class="row">
		<div class="col s12 m12">
			<div class="card filter-card transparent z-depth-0">  
			  <div class="card-content row">
			  <div class="row">
			  <div class="col s12 m12">
                  <span class="page-title light-green-text">Seleção de questões</span>
                  <hr>
				</div>	
              </div>
              <div class="row">
                  <form method="post" id="select-questao" action="">
                  {{ csrf_field() }}
                    <div class="col s12 m12 card transparent z-depth-0">
                        <div class="card-content">
                            <div class="row">
                            <div class="input-field col s12 m4">
                                <input placeholder="&nbsp;" id="descricao" type="text" class="validate">
                                <label for="descricao">Enunciado</label>
                            </div>
                            <div class="input-field col s12 m2">
                                <label>Data de Criação</label>
                                <input placeholder="&nbsp;" id="prova_criacao" type="text" class="datepicker"  value="{{Carbon\Carbon::today()->format('d-m-Y')}}" disabled readonly>
                            </div>
                            <div class="input-field col s12 m3">
                                <select name='materia_id'>
                                  <option value="" disabled selected>Selecione</option>
                                  @FOREACH ($materias as $materia)
                                  <option value="{{ $materia->id }}">{{ $materia->	nome }}</option>
                                 @ENDFOREACH
                                </select>
                                <label>Matéria</label>
                            </div>
                            <div class="input-field col s12 m3">
                                <select>
                                  <option value="" disabled selected>Selecione</option>
                                  <option value="1">Alternativa</option>
                                </select>
                                <label>Tipo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12">
                                <button class="btn btn-small right waves-effect waves-light deep-orange" id="open-results">Buscar questões</button>                                    
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
                    <div class="col s12 m12" id="questions-results">
                    <ul class="collection with-header">
                        <li class="collection-header light-green"><span class="page-title white-text">Resultado da busca</span></li>
                        @FOREACH ($questoes as $questao)
                        
                        <li class="collection-item">
                            <div>
                            <form id="selectQuestao" action="{{route('selecionar.questao.professor', ['id' => $prova->id])}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="prova_id" value="{{$prova->id}}" />
                                <input type="hidden" name="questao_id" value="{{$questao->id}}" />
                                <span>{{ $questao->	descricao }} </span>
                                <a href="#modal{{$questao->id}}" class="secondary-content modal-trigger"><i class="material-icons light-green-text">add</i></a>
                            </form>
                            </div>
                        </li>
                        <div id="modal{{$questao->id}}" class="modal">
									<div class="modal-content">
										<h4>Adicionar questão na prova</h4>
										<p>Tem certeza de que deseja adicionar esta questão?</p>
									</div>
									<div class="modal-footer">
										<a onclick="event.preventDefault();document.getElementById('select-questao').submit();" class="modal-action modal-close waves-effect waves-green btn-flat">Adicionar</a>
										<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Voltar</a>
									</div>
								</div>
                       @ENDFOREACH                       
                    </ul>
                    </div>
                    <div class="col s12 m12 center">
                        <ul class="pagination">
                            <li class="waves-effect disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                        </ul>
                    </div>
                </div>
			  <div class="row">
                  <br>
                  <div class="col sm12 m3 offset-m3">
					<a class="waves-effect right waves-light btn orange lighten-1" href="{{route('nova.questao')}}">Criar nova questão</a>
                  </div>
                  <div class="col sm12 m3">
					<a class="waves-effect right waves-light btn orange lighten-1" href="{{route('alterar.prova', ['id' => $prova->id])}}">Voltar</a>
                  </div>
                  <div class="col sm12 m3">
					<a class="waves-effect right waves-light btn orange lighten-1 modal-trigger" href="#modalSalvar">Salvar Prova</a>
                  </div>
                  <div id="modalSalvar" class="modal">
									<div class="modal-content">
										<h4>Prova salva com sucesso!</h4>
									</div>
									<div class="modal-footer">
										<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
									</div>
								</div>
			  </div>
			  </form>
			  </div>
			</div>
		</div>
		</div>
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script src="{{asset('js/configuracoes-datepicker.js')}}"></script>
	<script>
		$(document).ready(function() {
			$(".activate-toolbar").click(function(){
				$('.fixed-action-btn.toolbar').openToolbar();	
			});

			$(document).ready(function() {
				$('select').material_select();
                $('.modal').modal();
			});
		});
	</script>
@endsection