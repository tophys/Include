@extends('layouts.padrao') 
@section('titulo','Traduzir Prova') 
@section('plugins')
<link rel="stylesheet" href="../../fullcalendar/fullcalendar.min.css" />
<link rel="stylesheet" href="../../fullcalendar/fullcalendar.print.min.css" />
<link rel="stylesheet" href="../../fullcalendar/fullcalendar.print.css" />
<link rel="stylesheet" href="../../fullcalendar/fullcalendar.css" />
<link rel="stylesheet" href="../../css/dashboard-style.css" /> 
@endsection 
@section('conteudo')
<div class="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col s12 m12">
					<div class="card filter-card transparent z-depth-0">
						<div class="card-content row">
							<span class="page-title light-green-text">Tradução de prova</span>
							<hr>
							<form class="col s12 m12">
								<br>
								<div class="row">
									<div class="input-field col s12 m4">
										<input placeholder="&nbsp;" id="prova_titulo" type="text" class="validate">
										<label for="prova_titulo">Título</label>
									</div>
									<div class="input-field col s12 m2">
										<label>Data de Criação</label>
										<input placeholder="&nbsp;" id="prova_criacao" type="text" class="datepicker" readonly>
									</div>
									<div class="input-field col s12 m2">
										<label>Data de Agendamento</label>
										<input placeholder="&nbsp;" id="prova_agenda" type="text" class="datepicker" readonly>
									</div>
									<div class="input-field col s12 m2">
									<select>
									<option value="" disabled selected>Selecione</option>
									  @FOREACH ($materias as $materia)
									  <option value="{{ $materia->id }}">{{ $materia->	nome }}</option>
								  	  @ENDFOREACH
									 </select>
										<label>Matéria</label>
									</div>
									<div class="input-field col s12 m2">
										<select>
											<option value="" disabled selected>Selecione</option>
											<option value="1">Traduzida</option>
											<option value="2">Pendente</option>
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
								<th>Título</th>
								<th>Matéria</th>
								<th>Data de Criação</th>
								<th>Agendada</th>
								<th>&nbsp;</th>
							</tr>
						</thead>

						<tbody class="white">
						@FOREACH ($provas as $prova)
							<tr>
								<td>{{ $prova-> nome }}</td>
								<td>{{ $materia->	nome }}</td>
								<td>{{$prova -> created_at-> format('d-m-Y')}}</td>
								<td>{{$agendamento -> data_liberada}}</td>
								<td>
									<a href="traduzir_selecionar_questao.html"><i class="material-icons grey-text text-darken-1">chevron_right</i></a>
								</td>
							</tr>
							@Endforeach
							
						</tbody>
					</table>
				</div>
				<div class="col s12 m12 center">
					<ul class="pagination">
						<li class="disabled waves-effect">
							<a href="#!">
								<i class="material-icons">chevron_left</i>
							</a>
						</li>
						<li class="waves-effect">
							<a href="#!">
								<i class="material-icons">chevron_right</i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
		<script src='js/configuracoes-datepicker.js'></script>
		<script>
				$(document).ready(function () {
					$('select').material_select();
				});
		</script>
@endsection