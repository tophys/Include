@extends('layouts.padrao')

@section('titulo','Dashboard Professor')

@section('plugins')
    <link rel="stylesheet" href="../fullcalendar/fullcalendar.min.css" />
	<link rel="stylesheet" href="../fullcalendar/fullcalendar.print.min.css" />
	<link rel="stylesheet" href="../fullcalendar/fullcalendar.print.css" />
	<link rel="stylesheet" href="../fullcalendar/fullcalendar.css" />
	<link rel="stylesheet" href="../css/dashboard-style.css" />
@endsection

@section('conteudo')
<div class="main">
	  <div class="container-fluid">
		<div class="row">
		<div class="col s12 m12">
			<div class="card filter-card transparent z-depth-0">  
			  <div class="card-content row">
			  <span class="page-title light-green-text">Alteração de prova</span>
			  <hr>
              <form method="post" action="{{ route('alterar.prova') }}">
              {{ csrf_field() }}
			  <br>
			  <div class="row">
                <div class="input-field col s12 m7">
                    <input placeholder="&nbsp;" id="nome" type="text" class="validate" value="{{$prova -> nome}}">
                    <label for="nome">Título</label>
                </div>
                <div class="input-field col s12 m3">
                        <select name='materia_id'>
                          <option value="" disabled>Selecione</option>
                          @FOREACH ($materias as $materia)
                          <option value="{{ $materia->id }}">{{ $materia->	nome }}</option>
                         @ENDFOREACH
                        </select>
                        <label>Matéria</label>
                    </div>
                    <div class="input-field col s12 m2">
                            <label for="prova_criacao">Data de Criação</label>
                            <input id="prova_criacao" type="text" value="{{$prova -> created_at-> format('d-m-Y')}}" disabled readonly>
                        </div>
              </div>
              <div class="row">
                  <div class="col s12 m12" id="questions-results">
                    <ul class="collection with-header">
                        <li class="collection-header light-green"><span class="page-title white-text">Questões</span></li>
                        @FOREACH ($provas as $prova)
                        <li class="collection-item">
                        <div>
                                <span>{{ $prova -> questao()-> first() -> descricao }} </span>
                                <button href="#!" class="secondary-content"><i class="material-icons light-green-text">add</i></button>
                            </div>
                            </li>
                       @ENDFOREACH                        
                    </ul>
                    </div>
              </div>
              <div class="row">
                    <br>
                    <div class="col sm12 m3 right">
                      <button class="waves-effect right waves-light btn orange lighten-1" href="gerenciar_prova.html">Salvar Alterações</button>
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
	<script src='../js/configuracoes-datepicker.js'></script>
	<script>
		$(document).ready(function() {
			$(".activate-toolbar").click(function(){
				$('.fixed-action-btn.toolbar').openToolbar();	
			});

			$(document).ready(function() {
				$('select').material_select();
			});
		});
	</script>
@endsection