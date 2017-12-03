@extends('layouts.padrao')

@section('titulo','Gerenciar Turmas')

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
			  <span class="page-title light-green-text">Consulta de turmas</span>
			  <hr>
			  <form class="col s12 m12">
			  <br>
			  <div class="row">
				<div class="input-field col s12 m4">
					<input placeholder="&nbsp;" id="prova_titulo" type="text" class="validate">
					<label for="prova_titulo">Nome</label>
				</div>
				<div class="input-field col s12 m2">
					<label>Data de Criação</label>
					<input placeholder="&nbsp;" id="prova_criacao" type="text" class="datepicker" readonly>
				</div>
				<div class="input-field col s12 m3">
					<select>
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
						<option value="1">Ativa</option>
						<option value="2">Inativa</option>
					</select>
					<label>Estado</label>
				</div>
			  </div>
			  <div class="col sm12 m12">
				<a class="waves-effect right waves-light btn orange lighten-1">Pesquisar</a>
			  </div>
			  </form>
			  </div>
			</div>
		</div>
		</div>
		<div class="row">
		<div class="col s12 m12">
			 <table class="highlight centered bordered z-depth-1">
				<thead class="light-green white-text">
				  <tr>
					  <th>Nome</th>
					  <th>Matéria</th>
						<th>Data de Criação</th>
						<th>Estado</th>
					  <th>&nbsp;</th>
				  </tr>
				</thead>

				<tbody class="white">
				@FOREACH ($turmas as $turma)
				<tr>
					<td class="truncate">{{ $turma->nome }}</td>
					<td>{{ $turma->materia()->first()->nome }}</td>
					<td>{{ $turma->	timestamps }}</td>

				@if ($turma->	ativo == 0)
   			  <td> Ativa </td>
        @else
          <td> Inativa </td>
        @endif

					<td>
					<!--Se estiver inativa
					<a><i class="material-icons activate-toolbar grey-text text-darken-1">https</i></a> -->
					<!-- Se estiver ativa-->
					<a><i class="material-icons grey-text text-darken-1">no_encryption</i></a>
					<a href="{{route('excluir.turma', ['id' => $turma->id])}}"><i class="material-icons activate-toolbar grey-text text-darken-1">delete</i></a> 
					</td>
				  </tr>
				@ENDFOREACH
				</tbody>
			  </table>  
		</div>
		<div class="col s12 m12 center">
			  <ul class="pagination">
				<li class="waves-effect disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
				<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
			  </ul>
		</div>
		<div class="fixed-action-btn horizontal">
			<a href="{{ route('nova.turma') }}" class="btn-floating btn-large red">
			  <i class="large material-icons deep-orange lighten-1">add</i>
			</a>
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