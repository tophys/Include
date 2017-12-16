@extends('layouts.padrao') @section('titulo','Liberação de Prova') @section('plugins')
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
						<span class="page-title light-green-text">Cadastro de questão</span>
						<hr>
						<form>
							<br>
							<div class="row">
								<div class="input-field col s12 m3 offset-m3">
									<label for="questao_criacao">Data de Criação</label>
									<input id="questao_criacao" type="text" value="{{Carbon\Carbon::today()->format('d-m-Y')}}" disabled readonly>
								</div>
								<div class="input-field col s12 m3">
									<select disabled name='materia_id' id='materia_id'>
										<option selected value="{{ $questao->materia->id }}">{{ $questao->materia->nome }}</option>
									</select>
									<label>Matéria</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m12">
									<textarea placeholder="&nbsp;" id="enunciado_descricao" class="materialize-textarea"></textarea>
									<label for="enunciado_descricao">Enunciado:</label>
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
							<div class="col s12 m12">
							<table class="highlight centered bordered z-depth-1">
								<thead class="light-green white-text">
								<tr>
									<th>Alternativas</th>
										<th>&nbsp;</th>
										<th>&nbsp;</th>
								</tr>
								</thead>

								<tbody class="white">
								@FOREACH ($alternativas as $alternativa)
								<tr>
									<td class="left"><div class="radio-button-label">
											@IF ($alternativa->correta == 0)
											<input class="with-gap" name="alternativas" type="radio" id="altdata{{$alternativa->id}}" checked disabled/> @ELSE
											<input class="with-gap" name="alternativas" type="radio" id="altdata{{$alternativa->id}}" disabled/> @ENDIF
											<label for="altdata{{$alternativa->id}}"> {{$alternativa -> descricao}} </label>
										</div>
									</td>
									<td>
									<a href="{{route('alterar.alternativa', ['id' => $questao->id, 'alternativa' => $alternativa->id])}}"><i class="material-icons activate-toolbar grey-text text-darken-1">edit</i></a>
									</td>
									<td>
										<a class="modal-trigger" href="#modal{{$alternativa->id}}"><i class="material-icons activate-toolbar grey-text text-darken-1">delete</i></a> 
									</td>
									</tr>
										<div id="modal{{$alternativa->id}}" class="modal">
													<div class="modal-content">
														<h4>Excluir Alternativa</h4>
														<p>Tem certeza de que deseja excluir esta alternativa?</p>
													</div>
													<div class="modal-footer">
														<a href="{{route('excluir.alternativa', ['id' => $questao->id, 'alternativa' => $alternativa->id])}}" class="modal-action modal-close waves-effect waves-green btn-flat">Excluir</a>
														<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Voltar</a>
													</div>
												</div>
								@ENDFOREACH
								</tbody>
							</table>
							</div>
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="{{ asset('js/configuracoes-datepicker.js') }}"></script>
<script>

	$(document).ready(function () {
		$('select').material_select();
		$('.modal').modal();

		$('.dropdown-button').dropdown({
			hover: false, // Activate on hover
			belowOrigin: true // Displays dropdown below the button
		}
		);
	});
</script> @endsection