@extends('layouts.padrao')

@section('titulo','Alterar alternativa Correta')

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
						<div class="card-content">
							<span class="page-title light-green-text">Alterar Alternativa correta</span>
							<hr>
							<br>
							<form>
								<div class="row">
								<div class="col s12 m12" id="questions-results">
									<ul class="collection with-header">
										<li class="collection-header light-green">
											<span class="page-title white-text">Alternativas</span>
										</li>
										<li class="collection-item">
												<div class="radio-button-label">
														<input class="with-gap" name="alternativas" type="radio" id="alt1" checked/>
														<label for="alt1">
													A menor unidade de informação armazenável em um computador é o byte, suficiente, em muitos casos, para armazenar
														um caracter.</label>
												</div>
										</li>
										<li class="collection-item">
												<div class="radio-button-label">
														<input class="with-gap" name="alternativas" type="radio" id="alt2"/>
														<label for="alt2">
													A menor unidade de informação armazenável em um computador é o byte, suficiente, em muitos casos, para armazenar
														um caracter.</label>
												</div>
										</li>
										<li class="collection-item">
												<div class="radio-button-label">
														<input class="with-gap" name="alternativas" type="radio" id="alt3"/>
														<label for="alt3">
													A menor unidade de informação armazenável em um computador é o byte, suficiente, em muitos casos, para armazenar
														um caracter.</label>
												</div>
										</li>
										<li class="collection-item">
											<div class="radio-button-label">
													<input class="with-gap" name="alternativas" type="radio" id="alt4"/>
													<label for="alt4">
												A menor unidade de informação armazenável em um computador é o byte, suficiente, em muitos casos, para armazenar
													um caracter.</label>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="row">
									<br>
									<div class="col sm12 m3 right">
										<button class="waves-effect right waves-light btn orange lighten-1" href="gerenciador_questao.html">Salvar Alterações</button>
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
			
				$(document).ready(function () {
					$('select').material_select();
				});
		</script>
@endsection