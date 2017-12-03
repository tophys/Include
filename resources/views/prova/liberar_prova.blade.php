@extends('layouts.padrao') 

@section('titulo','Dashboard Professor') 

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
							<span class="page-title light-green-text">Liberação de provas</span>
							<hr>
							<form class="col s12 m12">
								<br>
								<div class="row valign-wrapper">
									<div class="input-field col s12 m3 offset-m2">
                                    @FOREACH ($materias as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nome }}</option>
                                    @ENDFOREACH
										<label>Turma</label>
									</div>
									<div class="input-field col s12 m2">
										<label>Data de Agendamento</label>
										<input placeholder="&nbsp;" id="prova_agenda" type="text" class="datepicker" readonly>
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
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody class="white">
                        @FOREACH ($provas as $prova)
                        <tr>
								<td>{{ $prova->materia()->first()->nome }}</td>
								<td>{{$prova -> created_at -> format('d-m-Y')}}</td>
								<td>
									<!-- Se a flag for bloqueada
									<a><i class="material-icons grey-text text-darken-1">block</i></a>-->
									<!-- Se a flag for liberada-->
									<a><i class="material-icons grey-text text-darken-1">check</i></a>
								</td>
                            </tr>
                            @endforeach
							<tr>
								<td>ADS171</td>
								<td>23/05/2017</td>
								<td>
									<a><i class="material-icons grey-text text-darken-1">block</i></a>
								</td>
							</tr>
							<tr>
								<td>ADS171</td>
								<td>23/05/2017</td>
								<td>
									<a><i class="material-icons grey-text text-darken-1">block</i></a>
								</td>
							</tr>
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
		<script src='js/configuracoes-datepicker.js'></script>
		<script>
				$(document).ready(function () {
					$('select').material_select();
				});
		</script>
@endsection