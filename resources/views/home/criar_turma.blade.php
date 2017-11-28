@extends('layouts.padrao')

@section('titulo','Dashboard Professor')

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
			  <div class="card-content row">
			  <span class="page-title light-green-text">Cadastro de turma</span>
			  <hr>
			  <div class="card col s12 m10 offset-m1">
			  <div class="card-content row">
			  <form class="col s12 m12">
			  <br>
			  <div class="row">
				<div class="input-field col s12 m5 offset-m1">
					<input placeholder="&nbsp;" id="turma_titulo" type="text" class="validate">
					<label for="turma_titulo">Nome</label>
				</div>
				<div class="input-field col s12 m2">
					<label>Data de Criação</label>
					<input id="turma_criacao" type="text" value="22/11/2017" disabled readonly>
				</div>
				<div class="input-field col s12 m3">
					<select>
					  <option value="" disabled selected>Selecione</option>
					  <option value="1">DWEI</option>
					  <option value="2">SWII</option>
					  <option value="3">SRCI</option>
					</select>
					<label>Matéria</label>
				</div>
              </div>
              <div class="row">
                <div class="input-field col s12 m10 offset-m1">
                    <textarea placeholder="&nbsp;" id="turma_descricao" class="materialize-textarea"></textarea>
                    <label for="turma_descricao">Descrição:</label>
                </div>
              </div>
			  <div class="col sm12 m10 offset-m1">
				<a class="waves-effect right waves-light btn orange lighten-1">Salvar</a>
			  </div>
			  </form>
			  </div>
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