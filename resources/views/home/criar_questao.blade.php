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
			  <span class="page-title light-green-text">Cadastro de questão</span>
			  <hr>
			  <form>
			  <br>
			  <div class="row">
                <div class="input-field col s12 m10 offset-m1">
                    <textarea placeholder="&nbsp;" id="enunciado_descricao" class="materialize-textarea">Um malware (software malicioso) é um software ilegal destinado a se infiltrar nos computadores. Vírus, trojanhorses, worms e spywares são considerados malwares, mas softwares legais podem ser considerados indevidamente como malwares quando:</textarea>
                    <label for="enunciado_descricao">Enunciado:</label>
                </div>
              </div>
			  <div class="row">
				<div class="input-field col s12 m3 offset-m3">
					<label for="questao_criacao">Data de Criação</label>
					<input id="questao_criacao" type="text" value="22/11/2017" disabled readonly>
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
			  <div class="col s12 m10 offset-m1">
				  <span class="page-title light-green-text">Alternativas</span>
				  <ul class="collection z-depth-1">
					<li class="collection-item">
						<div class="switch right">
							<label>
							  Errada
							  <input type="checkbox">
							  <span class="lever"></span>
							  Correta
							</label>
						</div>
						<div class="input-field">
							<label for="altr_1">Alternativa A)</label>
						<input id="altr_1" type="text">
							<!--<span>inseridos em páginas da Web</span>-->
						</div>
					</li>
					<li class="collection-item">
						<div class="switch right">
							<label>
							  Errada
							  <input type="checkbox">
							  <span class="lever"></span>
							  Correta
							</label>
						</div>
						<div class="input-field">
							<label for="altr_2">Alternativa B)</label>
						<input id="altr_2" type="text">
						</div>
					</li>		
					<span class="hide" id="new-alternative">&nbsp;</span>
				  </ul>
					<a class="btn-floating halfway-fab waves-effect waves-light deep-orange right"><i class="material-icons">add</i></a>
				</div>	
			  </div>
			  <div class="row">
				  <div class="col sm12 m10 offset-m1">
						<br>
					<a class="waves-effect right waves-light btn orange lighten-1">Salvar questão</a>
				  </div>
			  </div>
			  </form>
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