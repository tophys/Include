@extends('layouts.padrao')

@section('titulo','Criar Questões')

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
						<div class="card-content">
							<span class="page-title light-green-text">Cadastro de questão</span>
							<hr>
							<form method="post" action="{{ route('nova.questao') }}">
             				  {{ csrf_field() }}
								<br>
								<div class="row">
									<div class="input-field col s12 m3 offset-m3">
										<label for="questao_criacao">Data de Criação</label>
										<input id="questao_criacao" type="text" value="{{Carbon\Carbon::today()->format('d-m-Y')}}" disabled readonly>
									</div>
									<div class="input-field col s12 m3">
										<select name='materia_id' id='materia_id'>
											<option value="" disabled selected>Selecione</option>
											@FOREACH ($materias as $materia)
											<option value="{{ $materia->id }}">{{ $materia->nome }}</option>
											@ENDFOREACH
										</select>
										<label>Matéria</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m12">
										<textarea placeholder="&nbsp;" name="descricao" class="materialize-textarea"></textarea>
										<label id="enunciado" for="enunciado_descricao">Enunciado:</label>
									</div>
								</div>
								<div class="row">
									<div class="col sm12 m12">
										<button href="{{ route('nova.questao') }}" class="waves-effect right waves-light btn orange lighten-1">Incluir Alternativas</button>
									</div>
								</div>
							</form>
							<div class="row">
								<br>
								<div class="col s12 m12" id="questions-results">
									<ul class="collection with-header">
										<li class="collection-header light-green">
											<span class="page-title white-text">Alternativas</span>
										</li>
										

										</ul>
									</div>
								</div>
								<div class="row">
									<br>
									<div class="col sm12 m4 right">
										<a class="waves-effect right waves-light btn orange lighten-1" href="alterar_correta.html">Alterar Alternativa Correta</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
			<script src='js/configuracoes-datepicker.js'></script>
			<script>

			$(document).ready(function () {
				$('select').material_select();

				$('.dropdown-button').dropdown({
						hover: false, // Activate on hover
						belowOrigin: true, // Displays dropdown below the button
						alignment: 'right' // Displays dropdown with edge aligned to the left of button
					}
				);
			});
		</script>
@endsection