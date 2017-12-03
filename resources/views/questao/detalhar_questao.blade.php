@extends('layouts.padrao')

@section('titulo','Criar Questão')

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
							<span class="page-title light-green-text">Detalhes da Questão</span>
							<hr>
							<br>
							<div class="row">
									<div class="input-field col s12 m3 offset-m3">
										<label for="questao_criacao">Data de Criação</label>
										<input id="questao_criacao" type="text" value="{{$questao -> created_at -> format('d-m-Y')}}" disabled readonly>
									</div>
									<div class="input-field col s12 m3">
										<select disabled>
											<option value="" disabled>Selecione</option>
                                            @FOREACH ($materias as $materia)
                                            <option value="{{ $materia->id }}">{{ $materia->nome }}</option>
                                            @ENDFOREACH
										</select>
										<label>Matéria</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m12">
										<textarea placeholder="&nbsp;" id="enunciado_descricao" class="materialize-textarea" disabled>Um malware (software malicioso) é um software ilegal destinado a se infiltrar nos computadores. Vírus, trojanhorses, worms e spywares são considerados malwares, mas softwares legais podem ser considerados indevidamente como malwares quando:</textarea>
										<label for="enunciado_descricao">Enunciado:</label>
									</div>
								</div>
								<div class="row">
								<div class="col s12 m12" id="questions-results">
									<ul class="collection with-header">
										<li class="collection-header light-green">
											<span class="page-title white-text">Alternativas</span>
                                        </li>
                                        @foreach($questoes as $questao)
										<li class="collection-item">
												<div class="radio-button-label">
														<input class="with-gap" name="alternativas" type="radio" id="alt1" checked disabled/>
														<label for="alt1">{{$questao -> descricao}}  </label>
												</div>
                                        </li>
                                        @endforeach										
									</ul>
								</div>
							</div>
							<div class="row">
									<br>
									<div class="col sm12 m3 right">
										<a class="waves-effect right waves-light btn orange lighten-1" href="{{url('gerenciar/questao')}}">Voltar</a>
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
				});
		</script>
@endsection