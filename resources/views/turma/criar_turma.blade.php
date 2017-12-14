@extends('layouts.padrao')

@section('titulo','Criar Turmas')

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
		<form method="post" action="{{ route('nova.turma') }}">
		{{ csrf_field() }}
			<div class="card filter-card transparent z-depth-0">  
			  <div class="card-content row">
			  <span class="page-title light-green-text">Cadastro de turma</span>
			  <hr>
			  <div class="card col s12 m10 offset-m1">
			  <div class="card-content row">
			  <form class="col s12 m12">
			  <br>
			  <div class="row">
				<div class="input-field col s12 m5 offset-m1">
					<input placeholder="&nbsp;" id="nome" name='nome' type="text" class="validate">
					<label for="nome">Nome</label>
				</div>
				<div class="input-field col s12 m2">
					<label>Data de Criação</label>
					<input id="turma_criacao" type="text" value="{{Carbon\Carbon::today()->format('d-m-Y')}}" disabled readonly>
				</div>
				<div class="input-field col s12 m3">
					<select name='materia_id' id='materia_id'>
					  <option value="" disabled selected>Selecione</option>
						@FOREACH ($materias as $materia)
						<option value="{{ $materia->id }}">{{ $materia->	nome }}</option>
						@ENDFOREACH
					</select>
					<label>Matéria</label>
				</div>
              </div>
              <div class="row">
                <div class="input-field col s12 m10 offset-m1">
                    <textarea placeholder="&nbsp;" id="descricao" name='descricao' class="materialize-textarea"></textarea>
                    <label for="descricao">Descrição:</label>
                </div>
              </div>
			  <div class="col sm12 m10 offset-m1">
				<button class="waves-effect right waves-light btn orange lighten-1">Salvar</button>
			  </div>
			  </form>
			  </div>
			  </div>
			  </div>
			</div>
		</div>
		</div>
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script src="{{ asset('js/configuracoes-datepicker.js') }}"></script>
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