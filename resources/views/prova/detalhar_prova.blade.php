@extends('layouts.padrao') 

@section('titulo','Detalhar Prova') 

@section('plugins')
<link rel="stylesheet" href="{{asset('fullcalendar/fullcalendar.min.css')}}" />
<link rel="stylesheet" href="{{asset('fullcalendar/fullcalendar.print.min.css')}}" />
<link rel="stylesheet" href="{{asset('fullcalendar/fullcalendar.print.css')}}" />
<link rel="stylesheet" href="{{asset('fullcalendar/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('css/dashboard-style.css')}}" /> 
@endsection 

@section('conteudo')
<div class="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col s12 m12">
					<div class="card filter-card transparent z-depth-0">
						<div class="card-content row">
							<span class="page-title light-green-text">Detalhes da Prova</span>
							<hr>
                            <form >
             				  
								<br>
								<div class="row">
									<div class="input-field col s12 m7">
										<input placeholder="&nbsp;" id="prova_titulo" type="text" class="validate" value="{{$prova->nome}}" disabled>
										<label for="prova_titulo">Título</label>
									</div>
									<div class="input-field col s12 m3">
									<select disable name='materia_id' id='materia_id'>
                                    <option  disabled selected>{{$prova->materia->nome}}</option>
                                    </select>
										<label>Matéria</label>
									</div>
									<div class="input-field col s12 m2">
										<label for="prova_criacao">Data de Criação</label>
										<input id="prova_criacao" type="text" value="{{$prova -> created_at -> format('d-m-Y')}}" disabled readonly>
									</div>
								</div>
								<div class="row">
									<div class="col s12 m12" id="questions-results">
										<ul class="collapsible popout" data-collapsible="accordion">
                                        @FOREACH ($questoes as $questao)
                                        <li>
                                        <div class="collapsible-header">
                                            <span>{{$questao -> descricao}}</span>
                                        </div>
                                        
                                        <div class="collapsible-body">
                                        @FOREACH ($alternativas as $alternativa)
                                            <span class="question-content">{{$alternativa -> descricao}}</span>
                                            <br>
                                            @endforeach
                                        </div>
                                      
                                        </li>
                                        @ENDFOREACH                                           
										</ul>
									</div>
								</div>
								<div class="row">
									<br>
									<div class="col sm12 m3 right">
										<a class="waves-effect right waves-light btn orange lighten-1" href="{{url('gerenciar/prova')}}">Voltar</a>
									</div>
								</div>
							</form>
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