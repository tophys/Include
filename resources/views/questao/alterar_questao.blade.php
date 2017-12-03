@extends('layouts.padrao')

@section('titulo','Alterar Questões')

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
							<form method="PUT" action="{{ route('alterar.questao', ['id' => $questao->id]) }}">
                            {{ method_field('PUT') }} {{ csrf_field() }}
								<br>
								<div class="row">
									<div class="input-field col s12 m3 offset-m3">
										<label for="questao_criacao">Data de Criação</label>
										<input id="questao_criacao" type="text" value="{{$prova -> created_at-> format('d-m-Y')}}" disabled readonly>
									</div>
									<div class="input-field col s12 m3">
									<select name='materia_id' id='materia_id'>
									<option value="" disabled selected>Selecione</option>
									@FOREACH ($materias as $materia)
										@IF ($materia->id == $questao->materia_id)
										<option selected value="{{ $materia->id }}">{{ $materia->nome }}</option>
										@ELSE
										<option value="{{ $materia->id }}">{{ $materia->nome }}</option>
										@ENDIF
									@ENDFOREACH
									</select>
										<label>Matéria</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m12">
										<textarea placeholder="&nbsp;" id="descricao" class="materialize-textarea">{{$questao -> descricao}}</textarea>
										<label for="descricao">Enunciado:</label>
									</div>
								</div>
								<div class="row">
									<div class="col sm12 m3 offset-m4">
										<a href="alterar_alternativa.html" class="waves-effect right waves-light btn orange lighten-1">Alterar Alternativas</a>
									</div>
									<div class="col sm12 m3">
										<a href="alterar_correta.html" class="waves-effect right waves-light btn orange lighten-1">Alterar Correta</a>
									</div>
									<div class="col sm12 m2">
										<button href="gerenciador_questao.html" class="waves-effect right waves-light btn orange lighten-1">Salvar</button>
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