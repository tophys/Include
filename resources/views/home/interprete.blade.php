@extends('layouts.padrao')

@section('titulo','Dashboard Interprete')

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
		  <div class="col s12 m4">
			<div class="card deep-orange lighten-1 white-text">  
			  <div class="card-content valign-wrapper">
				<div class="card-text">
				  <h6>Traduzir Prova</h6>
				  <p>Traduza toda uma prova.</p>
				</div>
				<div class="card-icon">
				  <i class="material-icons medium valign">picture_in_picture</i>
				</div>
			  </div>
			  <div class="card-action">
				<a href="{{ url('/selecionar/prova')}}">Traduzir agora</a>
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
				  <i class="material-icons medium valign">library_books</i>
				</div>
			  </div>
			  <div class="card-action">
				<a href="{{ url('/selecionar/questao') }}">Traduzir agora</a>
			  </div>
			</div>
		  </div>
		  
		</div>
		<div class="row">
				<div class="col s12 m4">
				<div class="card deep-orange lighten-2 white-text">  
					<div class="card-content valign-wrapper">
					<div class="card-text">
						<h6>Alterar Prova</h6>
						<p>Altere a tradução de uma prova.</p>
					</div>
					<div class="card-icon">
						<i class="material-icons medium valign">repeat</i>
					</div>
					</div>
					<div class="card-action">
					<a href="{{ url('/selecionar/prova')}}">Alterar agora</a>
					</div>
				</div>
				</div>
				<div class="col s12 m4">
				<div class="card light-green lighten-1 white-text">  
					<div class="card-content valign-wrapper">
					<div class="card-text">
						<h6>Alterar Questão</h6>
						<p>Altere a tradução de uma questão.</p>
					</div>
					<div class="card-icon">
						<i class="material-icons medium valign">autorenew</i>
					</div>
					</div>
					<div class="card-action">
					<a href="{{ url('/selecionar/questao') }}">Traduzir agora</a>
					</div>
				</div>
				</div>
				
			</div>
	  </div>
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script src="{{ asset('fullcalendar/lib/moment.min.js') }}"></script>
	<script src="{{ asset('fullcalendar/fullcalendar.js') }}"></script>
	<script src="{{ asset('fullcalendar/locale/pt-br.js') }}"></script>
@endsection
