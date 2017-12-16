@extends('layouts.padrao') @section('titulo','Gerenciar Questão') @section('plugins')
<link rel="stylesheet" href="{{asset('/fullcalendar/fullcalendar.min.css')}}" />
<link rel="stylesheet" href="{{asset('/fullcalendar/fullcalendar.print.min.css')}}" />
<link rel="stylesheet" href="{{asset('/fullcalendar/fullcalendar.print.css')}}" />
<link rel="stylesheet" href="{{asset('/fullcalendar/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('/css/dashboard-style.css')}}" /> @endsection @section('conteudo')
<div class="main">
	<div class="container-fluid">
		<div class="row">
			<div class="col s12 m12">
				<div class="card filter-card transparent z-depth-0">
					<div class="card-content">
						<span class="page-title light-green-text">Gerenciar questão</span>
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
										@FOREACH ($materias as $materia) @IF ($materia->id == $questao->materia_id)
										<option selected value="{{ $materia->id }}">{{ $materia->nome }}</option>
										@ELSE
										<option value="{{ $materia->id }}">{{ $materia->nome }}</option>
										@ENDIF @ENDFOREACH
									</select>
									<label>Matéria</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m12">
									<textarea placeholder="&nbsp;" id="enunciado_descricao" class="materialize-textarea">{{ $questao->descricao }}</textarea>
									<label id="descricao" for="enunciado_descricao">Enunciado:</label>
								</div>
							</div>
							<div class="row">
								<div class="col sm12 m12">
									<a href="{{route('nova.alternativa', ['id' => $questao->id])}}" class="waves-effect right waves-light btn orange lighten-1">Incluir Alternativas</a>
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

									@FOREACH ($alternativas as $alternativa)
									<li class="collection-item">
										<div class="radio-button-label">
											@IF ($alternativa->correta == 0)
											<input class="with-gap" name="alternativas" type="radio" id="altdata{{$alternativa->id}}" checked disabled/> @ELSE
											<input class="with-gap" name="alternativas" type="radio" id="altdata{{$alternativa->id}}" disabled/> @ENDIF
											<label id="lbldata{{$alternativa->id}}" for="altdata{{$alternativa->id}}"> {{$alternativa -> descricao}} </label>
										</div>
										<a href="#" class="right dropdown-button" data-activates='data{{$alternativa->id}}'>
											<i class="material-icons grey-text text-darken-1">more_vert</i>
										</a>
										<ul id='data{{$alternativa->id}}' class='dropdown-content'>
											<li>
												<a href="{{route('alterar.alternativa', ['id' => $questao->id, 'alternativa' => $alternativa->id])}}">Alterar</a>
											</li>
											<li>
												<a href="{{route('excluir.alternativa', ['id' => $questao->id, 'alternativa' => $alternativa->id])}}">Excluir</a>
											</li>
										</ul>
									</li>
									@ENDFOREACH
								</ul>
							</div>
						</div>
						<div class="row">
							<br>
							<div class="col sm12 m4 right">
								<a class="waves-effect right waves-light btn orange lighten-1" href="{{route('alterar.correta', ['id' => $questao->id])}}">Alterar Alternativa Correta</a>
							</div>
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

	$(document).ready(function () {
		$('select').material_select();

		$('.dropdown-button').dropdown({
			hover: false, // Activate on hover
			belowOrigin: true, // Displays dropdown below the button
			alignment: 'right' // Displays dropdown with edge aligned to the left of button
		}
		);
	});
</script> @endsection