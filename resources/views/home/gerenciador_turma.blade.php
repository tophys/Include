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
					  <option value="1">DWEI</option>
					  <option value="2">SWII</option>
					  <option value="3">SRCI</option>
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
				  <tr>
					<td class="truncate">ADS171 T1</td>
					<td>Desenvolvimento Web I</td>
					<td>15/05/2017</td>
					<td>Ativa</td>
					<td>
						<a><i class="material-icons activate-toolbar grey-text text-darken-1">more_vert</i></a> 
					</td>
				  </tr>
				  <tr>
						<td class="truncate">ADS171 T2</td>
						<td>Desenvolvimento Web I</td>
						<td>15/05/2017</td>
						<td>Ativa</td>
					<td>
						<a><i class="material-icons activate-toolbar grey-text text-darken-1">more_vert</i></a> 
					</td>
				  </tr>
				  <tr>
						<td class="truncate">ADS271</td>
						<td>Desenvolvimento Web Avançado</td>
						<td>15/05/2017</td>
						<td>Ativa</td>
					<td>
						<a><i class="material-icons activate-toolbar grey-text text-darken-1">more_vert</i></a> 
					</td>
				  </tr>
				</tbody>
			  </table>  
			   <div class="fixed-action-btn toolbar">
				<ul>
				  <li class="waves-effect waves-light orange lighten-1"><a href="#!"><i class="material-icons">search</i></a></li>
				  <li class="waves-effect waves-light orange lighten-1"><a href="#!"><i class="material-icons">edit</i></a></li>
				  <li class="waves-effect waves-light orange lighten-1"><a href="#!"><i class="material-icons">delete</i></a></li>
				</ul>
			  </div>
		</div>
		<div class="col s12 m12 center">
			  <ul class="pagination">
				<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
				<li class="active"><a href="#!">1</a></li>
				<li class="waves-effect"><a href="#!">2</a></li>
				<li class="waves-effect"><a href="#!">3</a></li>
				<li class="waves-effect"><a href="#!">4</a></li>
				<li class="waves-effect"><a href="#!">5</a></li>
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
	<script src='js/configuracoes-datepicker.js'></script>
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