@extends('layouts.padrao')

@section('titulo','Desempenho Turma')

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
						<span class="page-title light-green-text">Desempenho da Turma: {{ $turma->	nome }} | Prova {{ $prova->	nome }} </span>
						<hr>
					</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m12">
			 <ul class="collection">
			 @FOR ($i = 0; $i < count($corretas); $i++)
			 
				<li class="collection-item avatar">
					<img src="{{asset('/uploads/avatars/' . $user->avatar )}}" alt="" class="circle">
					<span class="title">{{ $user[$i]->nome }}</span>
					<p>Acertos: <b>$correta[$i]/{{$total}}</b>
					</p>
					<a href="#!" class="secondary-content"><i class="material-icons light-green-text">chevron_right</i></a>
				</li>
			
			@ENDFOR
	
  </ul>
		  </div>
		</div>
		<div class="row">
				<br>
				<div class="col sm12 m3 right">
					<button class="waves-effect right waves-light btn orange lighten-1" href="gerenciador_prova.html">Voltar</button>
				</div>
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