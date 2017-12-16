@extends('layouts.padrao')

@section('titulo','Selecionar Prova')

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
						<span class="page-title light-green-text">Provas Disponiveis para {{ $turma->	nome }}</span>
						<hr>
					</div>
			</div>
		</div>
		<div class="row">
		@FOR ($i = 0; $i < count($provas); $i++)
		
		  <div class="col s12 m4">
			<div class="card orange lighten-1 white-text">  
			  <div class="card-content valign-wrapper">
				<div class="card-text">
				  <h6>{{ $provas[$i]->materia->nome }}</h6>
				  <p>{{ $provas[$i]->nome }}</p>
				</div>
				<div class="card-icon">
				  <i class="material-icons medium valign">library_books</i>
				</div>
			  </div>
			  <div class="card-action">
				<a href="{{route('realizar.prova', ['id' => $provas[$i]->id])}}">Realizar esta Prova</a>
			  </div>
			</div>
			</div>
			@ENDFOR	  
			<div class="row">
				<br>
				<div class="col sm12 m3 right">
					<a class="waves-effect right waves-light btn orange lighten-1" href="{{url('/gerenciar/turma')}}">Voltar</a>
				</div>
			</div>
	</div>

	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script src="{{asset('js/configuracoes-datepicker.js')}}"></script>
	<script>
		$(document).ready(function() {
			$(".activate-toolbar").click(function(){
				$('.fixed-action-btn.toolbar').openToolbar();	
			});

			$(document).ready(function() {
				$('select').material_select();
			});
		});
	</script>
@endsection