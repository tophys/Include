@extends('layouts.padrao')

@section('titulo','Gerenciar Questões')

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
			  <span class="page-title light-green-text">Consulta de questões</span>
			  <hr>
			  <form class="col s12 m12">
			  <br>
			  <div class="row">
				<div class="input-field col s12 m4">
					<input placeholder="&nbsp;" id="prova_titulo" type="text" class="validate">
					<label for="prova_titulo">Enunciado</label>
				</div>
				<div class="input-field col s12 m2">
					<label>Data de Criação</label>
					<input placeholder="&nbsp;" id="prova_criacao" type="text" class="datepicker" readonly>
				</div>
				<div class="input-field col s12 m3">
					<select>
					  <option value="" disabled selected>Selecione</option>
						@FOREACH ($materias as $materia)
						<option value="{{ $materia->id }}">{{ $materia->nome }}</option>
					@ENDFOREACH
					</select>
					<label>Matéria</label>
				</div>
				<div class="input-field col s12 m3">
					<select>
					  <option value="" disabled selected>Selecione</option>
					  <option value="1">Múltipla-escolha</option>
					</select>
					<label>Tipo</label>
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
					  <th>Enunciado</th>
					  <th>Matéria</th>
						<th>Data de Criação</th>
						<th>Tipo</th>
					  <th>&nbsp;</th>
				  </tr>
				</thead>

				<tbody class="white">
				@FOREACH ($questoes as $questao)
				<tr>
					<td>{{ $questao->descricao }}</td>
					<td>{{ $questao->materia()->first()->nome }}</td>
					<td>{{ $questao->timestamps }}</td>
					<td>Múltipla-escolha</td>
					<td>
					<a><i class="material-icons grey-text text-darken-1">more_vert</i></a> 
					<ul id='data{{$questao->id}}' class='dropdown-content'>
							<li>
								<a href="#!">Detalhar</a>
							</li>
							<li>
								<a href="{{route('alterar.questao', ['id' => $questao->id])}}">Alterar</a>
							</li>
							<li>
								<a href="#!">Excluir</a>
							</li>
						</ul> 
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
			<a href="#" class="btn-floating btn-large red">
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