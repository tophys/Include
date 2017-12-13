@extends('layouts.padrao')

@section('titulo','Desempenho Turma')

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
						<span class="page-title light-green-text">Desempenho do Provas do {{ $turma->	nome }} - Prova {{ $prova->	nome }} </span>
						<hr>
					</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m12">
			 <ul class="collection">

    <li class="collection-item avatar">
      <img src="https://1r65zzvfjgtwegsn-zippykid.netdna-ssl.com/wp-content/uploads/2014/02/David-Sparks-300x271.jpeg" alt="" class="circle">
      <span class="title">Luis Guilherme Marques Lino</span>
      <p>Acertos: <b>7/10</b><br>
         Erros: <b>3/10</b>
      </p>
      <a href="#!" class="secondary-content"><i class="material-icons light-green-text">chevron_right</i></a>
		</li>
		
    <li class="collection-item avatar">
				<img src="https://avatars.githubusercontent.com/u/898384?v=3" alt="" class="circle">
				<span class="title">Luiz Carlos Burgos Faleiro Filho</span>
				<p>Acertos: <b>7/10</b><br>
					 Erros: <b>3/10</b>
				</p>
				<a href="#!" class="secondary-content"><i class="material-icons light-green-text">chevron_right</i></a>
			</li>

    <li class="collection-item avatar">
      <img src="https://uturnpodcast.com/wp/wp-content/uploads/2016/05/P2100158.jpg" alt="" class="circle">
      <span class="title">Paulo Passos Santiago</span>
      <p>Acertos: <b>7/10</b><br>
         Erros: <b>3/10</b>
      </p>
      <a href="#!" class="secondary-content"><i class="material-icons light-green-text">chevron_right</i></a>
		</li>
		
    <li class="collection-item avatar">
      <img src="https://media.nngroup.com/media/people/photos/IMG_2009_copy-retouched-square-closer-800px.jpg.400x400_q95_autocrop_crop_upscale.jpg" alt="" class="circle">
      <span class="title">Stephanie Benites Lubatchewsky</span>
      <p>Acertos: <b>7/10</b><br>
         Erros: <b>3/10</b>
      </p>
      <a href="#!" class="secondary-content"><i class="material-icons light-green-text">chevron_right</i></a>
		</li>
		
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