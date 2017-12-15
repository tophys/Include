@extends('layouts.padrao')

@section('titulo','Alterar alternativa Correta')

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
							<span class="page-title light-green-text">Alterar Alternativa correta</span>
							<hr>
							<br>
							<form method="POST"  action="{{route('alterar.correta', ['id' => $id])}}">
							{{ csrf_field() }}
								<div class="row">
								<div class="col s12 m12" id="questions-results">
									<ul class="collection with-header">
										<li class="collection-header light-green">
											<span class="page-title white-text">Alternativas</span>
										</li>
										@FOREACH ($alternativas as $alternativa)
										<li class="collection-item">
											<div class="radio-button-label">
												@IF ($alternativa->correta == 0)
													<input class="with-gap" checked name="alternativas" id="{{$alternativa->id}}" type="radio" value="{{$alternativa->id}}" />
												@ELSE
													<input class="with-gap" name="alternativas" type="radio" id="{{$alternativa->id}}" value="{{$alternativa->id}}" />
												@ENDIF
													<label for="{{$alternativa->id}}" >{{$alternativa->descricao}}
													</label>
											</div>
										</li>
										@ENDFOREACH	
										<input type="hidden" name="questao_id" value="{{$id}}"/>
									</ul>
								</div>
							</div>
							<div class="row">
									<br>
									<div class="col sm12 m3 right">
										<button class="waves-effect right waves-light btn orange lighten-1">Salvar Alterações</button>
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
				});
		</script>
@endsection