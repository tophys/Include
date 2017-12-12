@extends('layouts.padrao') 

@section('titulo','Liberação de Prova') 

@section('plugins')
<link rel="stylesheet" href="../../../fullcalendar/fullcalendar.min.css" />
<link rel="stylesheet" href="../../../fullcalendar/fullcalendar.print.min.css" />
<link rel="stylesheet" href="../../../fullcalendar/fullcalendar.print.css" />
<link rel="stylesheet" href="../../../fullcalendar/fullcalendar.css" />
<link rel="stylesheet" href="../../../css/dashboard-style.css" /> 
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
							<form method="post" action="{{ route('liberar.agendamento', ['id' => $id]) }}" class="col s12 m12">
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
										<input placeholder="&nbsp;" name="data_liberada" id="prova_agenda" type="text" class="datepicker" readonly>
									</div>
									<div class="col sm12 m3 center">
										<button class="waves-effect waves-light btn orange lighten-1">Liberar Prova</button>
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
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody class="white">
                        @FOREACH ($agendamentos as $agendamento)
                        <tr>
								<td>{{$agendamento->turma->nome }}</td>
								<td>{{ Carbon\Carbon::parse($agendamento->data_liberada)->format('d-m-Y') }}</td>
								<td>{{$agendamento->prova->nome}}</td>
								<td>
									<!-- Se a flag for bloqueada
									<a><i class="material-icons grey-text text-darken-1">block</i></a>-->
									<!-- Se a flag for liberada-->
									@IF ($agendamento->executado == 0)
									<a href="{{ route('desativar.agendamento', ['id' => $agendamento->prova_id, 'agendamento' => $agendamento->id]) }}"><i class="material-icons grey-text text-darken-1">check</i></a>
									@else
									<a href="{{ route('desativar.agendamento', ['id' => $agendamento->prova_id, 'agendamento' => $agendamento->id]) }}"><i class="material-icons grey-text text-darken-1">block</i></a>
									@endif
								</td>
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
		<script src='../../../js/configuracoes-datepicker.js'></script>
		<script>
				$(document).ready(function () {
					$('select').material_select();
				});
		</script>
@endsection