@extends('layouts.padrao') 
@section('titulo','Traduzir Alternativa') 
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
						<div class="card-content">
							<span class="page-title light-green-text">Tradução de Alternativa</span>
							<hr>
							<br>
							<div class="row">
								<div class="input-field col s12 m12">
									<textarea placeholder="&nbsp;" id="enunciado_descricao" class="materialize-textarea" disabled>{{ $questao -> descricao}}</textarea>
									<label for="enunciado_descricao">Enunciado:</label>
									<form enctype="multipart/form-data" id="formQuestao" action="{{route('traduzir.questao', ['id' => $questao->id] )}}" method="post">
										<input type="file" name="alternativa" />
										<input type="hidden" name="questao_id" value="{{$questao->id}}" />
										{{ csrf_field() }}
									</form>
									<a onclick="event.preventDefault();document.getElementById('formQuestao').submit();" class="btn-floating halfway-fab waves-effect waves-light right light-green"><i class="material-icons">file_upload</i></a>
								</div>
							<div class="row">
								<div class="col s12 m12" id="questions-results">
										<br>
									<ul class="collection with-header">
										<li class="collection-header light-green">
											<span class="page-title white-text">Alternativas</span>
                                        </li>
                                        @FOREACH($questao->alternativas as $alternativa)
										<li class="collection-item">
											<div>
												<form enctype="multipart/form-data" id="form{{$alternativa->id}}" action="{{route('traduzir.alternativa', ['id' => $questao->id] )}}" method="post">
													{{ csrf_field() }}
													<input type="hidden" name="questao_id" value="{{$questao->id}}" />
													<input type="hidden" name="alternativa_id" value="{{$alternativa->id}}" />
													<span>{{ $alternativa->	descricao }} </span>
													<input type="file" name="alternativa" />
													<a class="secondary-content" onclick="event.preventDefault();document.getElementById('form{{$alternativa->id}}').submit();">
														<i class="material-icons light-green-text">file_upload</i>
													</a>
												</form> 
											</div>
                                        </li>
                                        @ENDFOREACH
										
									</ul>
								</div>
							</div>
							<div class="row">
								<br>
								<div class="col sm12 m3 right">
									<a class="waves-effect right waves-light btn orange lighten-1" href="{{ url('/gerenciar/questao')}}">Voltar</a>
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