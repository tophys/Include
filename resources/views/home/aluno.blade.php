@extends('layouts.padrao')

@section('titulo','Dashboard Aluno')

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
									<div class="col s12 m6">
										<div class="card deep-orange lighten-1 white-text">  
											<div class="card-content valign-wrapper">
												<div class="card-text">
												<h6>Realizar Prova</h6>
												<p>Realize a prova liberada para você.</p>
											</div>
											<div class="card-icon">
												<i class="material-icons medium valign">ondemand_video</i>
											</div>
											</div>
											<div class="card-action">
											<a href="{{url('/executar')}}"><i class="material-icons right">forward</i></a>
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