@extends('layouts.padrao') 
@section('titulo','Traduzir Questão') 
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
							<span class="page-title light-green-text">Tradução de Questão</span>
							<hr>
							<form class="col s12 m12">
							 {{ csrf_field() }}
								<br>
								<div class="row">
									<div class="input-field col s12 m4">
										<input placeholder="&nbsp;" id="prova_titulo" type="text" class="validate">
										<label for="prova_titulo">Enunciado</label>
									</div>
									<div class="input-field col s12 m2">
										<label>Data de Criação</label>
										<input placeholder="&nbsp;" id="prova_criacao" type="text" class="datepicker" readonly>
									</div>
									<div class="input-field col s12 m2">
									<select>
									<option value="" disabled selected>Selecione</option>
									  @FOREACH ($materias as $materia)
									  <option value="{{ $materia->id }}">{{ $materia->	nome }}</option>
								  	  @ENDFOREACH
									 </select>
										<label>Matéria</label>
									</div>
									<div class="input-field col s12 m2">
										<select>
											<option value="" disabled selected>Selecione</option>
											<option value="1">Traduzida</option>
											<option value="2">Pendente</option>
										</select>
										<label>Estado</label>
									</div>
								</div>
								<div class="col sm12 m12">
									<a class="waves-effect right waves-light btn orange lighten-1">Pesquisar</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
            <div class="row">
            <div class="col s12 m12" id="questions-results">
                <ul class="collection with-header">
                    <li class="collection-header light-green">
                        <span class="page-title white-text">Questões</span>
                    </li>
                    @Foreach($questoes as $questao)
                    <li class="collection-item">
                        <div>
                            <span>{{$questao -> descricao}} </span>
                            <a href="{{ route('traduzir.alternativa', ['id' => $questao->id]) }}" class="secondary-content">
                                <i class="material-icons light-green-text">chevron_right</i>
                            </a>
                        </div>
                    </li>
                 @endforeach   											
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
				});
		</script>
@endsection