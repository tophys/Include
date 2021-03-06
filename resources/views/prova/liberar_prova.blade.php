@extends('layouts.padrao') 

@section('titulo','Liberação de Prova') 

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
						<div class="card-content row">
							<span class="page-title light-green-text">Liberação de provas</span>
							<hr>
							<form method="post" id="liberar_prova" action="{{ route('liberar.agendamento', ['id' => $id]) }}" class="col s12 m12">
							{{ csrf_field() }}
								<br>
								<div class="row valign-wrapper">
									<input type="hidden" name="prova_id" value="{{$id}}"/>
									<div class="input-field col s12 m3 offset-m2">
									<select name='turma_id' id='turma_id'>
									<option value="" disabled selected>Selecione</option>
                                    @FOREACH ($turmas as $turma)
                                    <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                                    @ENDFOREACH
									</select>
										<label>Turma</label>
									</div>
									<div class="input-field col s12 m2">
										<label>Data de Agendamento</label>
										<input placeholder="&nbsp;" value="{{Carbon\Carbon::today()->format('d-m-Y')}}" name="data_liberada" id="prova_agenda" type="text" class="datepicker" readonly>
									</div>
									<div class="col sm12 m3 center">
										<a onclick="event.preventDefault();document.getElementById('liberar_prova').submit();" class="waves-effect waves-light btn orange lighten-1 modal-trigger" >Liberar Prova</a>
									</div>
									
									</div>
									<div class="col sm12 m2 left">
										&nbsp;
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<table class="highlight centered bordered z-depth-1">
						<thead class="light-green white-text">
                            
                        <tr>
								<th>Turma</th>
								<th>Data do Agendamento</th>
								<th>Prova</th>
								<th>Executada</th>
								<th>Desativar</th>
							</tr>
						</thead>
						<tbody class="white">
                        @FOREACH ($agendamentos as $agendamento)
                        <tr>
								<td>{{$agendamento->turma->nome }}</td>
								<td>{{ Carbon\Carbon::parse($agendamento->data_liberada)->format('d-m-Y') }}</td>
								<td>{{$agendamento->prova->nome}}</td>
								<td>
									@IF ($agendamento->executado == 0)
									<a ><i class="material-icons grey-text text-darken-1">check</i></a>
									@else
									<a ><i class="material-icons grey-text text-darken-1">block</i></a>
									@endif
								</td>
								<td>
									<a class="modal-trigger"  href="{{ route('desativar.agendamento', ['id' => $agendamento->prova_id, 'agendamento' => $agendamento->id]) }}"><i class="material-icons grey-text text-darken-1">block</i></a
								</td>
								<div id="modal{{$agendamento->prova_id}}" class="modal">
										<div class="modal-content">
											<h4>Bloquear Prova</h4>
											<p>Tem certeza de que deseja bloquear esta prova?</p>
										</div>
										<div class="modal-footer">
											<a href="{{ route('desativar.agendamento', ['id' => $agendamento->prova_id, 'agendamento' => $agendamento->id]) }}" class="modal-action modal-close waves-effect waves-green btn-flat">Bloquear</a>
											<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Voltar</a>
										</div>
									</div>
                            </tr>
                            @endforeach
						</tbody>
					</table>
				</div>
				<div class="col s12 m8 offset-m2 center">
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
		<script src="{{ asset('js/configuracoes-datepicker.js') }}"></script>
		<script>
				$(document).ready(function () {
					$('select').material_select();
					$('.modal').modal();
				});
		</script>
@endsection