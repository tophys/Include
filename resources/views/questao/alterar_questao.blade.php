@extends('layouts.padrao')

@section('titulo','Alterar Questões')

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
						<div class="card-content">
							<span class="page-title light-green-text">Alteração de Questão</span>
							<hr>
							<form method="PUT" id="alterar-questao" action="{{ route('alterar.questao', ['id' => $questao->id]) }}">
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
										<a href="{{route('alterar.alternativa', ['id' => $questao->id, 'alternativa' => $alternativa->id])}}" class="waves-effect right waves-light btn orange lighten-1">Alterar Alternativas</a>
									</div>
									<div class="col sm12 m3">
										<a href="{{route('alterar.correta', ['id' => $questao->id, 'alternativa' => $alternativa->id])}}" class="waves-effect right waves-light btn orange lighten-1">Alterar Correta</a>
									</div>
									<div class="col sm12 m2">
										<a href="#modalSalvar" class="waves-effect right waves-light btn orange lighten-1">Salvar</a>
									</div>
									<div id="modalSalvar" class="modal">
										<div class="modal-content">
											<h4>Alterar Questão</h4>
											<p>Tem certeza de que deseja alterar esta questão?</p>
										</div>
										<div class="modal-footer">
											<a onclick="event.preventDefault();document.getElementById('alterar-questao').submit();" href="{{ url('gerenciar/questao')}}" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar</a>
											<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Voltar</a>
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
		<script src="{{ asset('js/configuracoes-datepicker.js') }}"></script>
		<script>

			$(document).ready(function () {
				$('select').material_select();
				$('.modal').modal();

				$('.dropdown-button').dropdown({
					hover: false, // Activate on hover
					belowOrigin: true, // Displays dropdown below the button
					alignment: 'right' // Displays dropdown with edge aligned to the left of button
				}
				);
			});
		</script>
@endsection