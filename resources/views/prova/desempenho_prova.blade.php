@extends('layouts.padrao')

@section('titulo','Desempenho Prova')

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
						<span class="page-title light-green-text">Provas do {{ $materia->	nome }}</span>
						<hr>
					</div>
			</div>
		</div>
		<div class="row">
			@FOREACH ($provas as $prova)
		  <div class="col s12 m4">
			<div class="card orange lighten-1 white-text">  
			  <div class="card-content valign-wrapper">
				<div class="card-text">
				  <h6>{{ $materia->	nome }}</h6>
				  <p>{{ $prova->	nome }}</p>
				</div>
				<div class="card-icon">
				  <i class="material-icons medium valign">library_books</i>
				</div>
			  </div>
			  <div class="card-action">
				<a href="{{route('desempenho.turma', ['id' => $turma->id])}}">Ver desempenho</a>
			  </div>
			</div>
			</div>
			@ENDFOREACH
		  
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script src='js/configuracoes-datepicker.js'></script>
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