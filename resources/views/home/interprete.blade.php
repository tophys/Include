@extends('layouts.padrao')

@section('titulo','Dashboard Interprete')

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
		  <div class="col s12 m4">
			<div class="card deep-orange lighten-1 white-text">  
			  <div class="card-content valign-wrapper">
				<div class="card-text">
				  <h6>Traduzir Prova</h6>
				  <p>Traduza toda uma prova.</p>
				</div>
				<div class="card-icon">
				  <i class="material-icons medium valign">add_to_queue</i>
				</div>
			  </div>
			  <div class="card-action">
				<a href="traduzir_prova.html">Traduzir agora</a>
			  </div>
			</div>
		  </div>
		  <div class="col s12 m4">
			<div class="card light-green white-text">  
			  <div class="card-content valign-wrapper">
				<div class="card-text">
				  <h6>Traduzir Questão</h6>
				  <p>Traduza toda uma questão.</p>
				</div>
				<div class="card-icon">
				  <i class="material-icons medium valign">add_to_photos</i>
				</div>
			  </div>
			  <div class="card-action">
				<a href="traduzir questao.html">Traduzir agora</a>
			  </div>
			</div>
		  </div>
		  <div class="col s12 m4">
			<div class="card orange lighten-1 white-text">  
			  <div class="card-content valign-wrapper">
				<div class="card-text">
				  <h6>Traduzir Alternativa</h6>
				  <p>Traduza apenas uma alternativa.</p>
				</div>
				<div class="card-icon">
				  <i class="material-icons medium valign">event_available</i>
				</div>
			  </div>
			  <div class="card-action">
				<a href="traduzir_alternativa.html">Traduzir</a>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script src='fullcalendar/lib/moment.min.js'></script>
	<script src='fullcalendar/fullcalendar.js'></script>
	<script src='fullcalendar/locale/pt-br.js'></script>
@endsection
