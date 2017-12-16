@extends('layouts.padrao') 

@section('titulo','Executar Prova') 

@section('plugins')
<link rel="stylesheet" href="{{asset('fullcalendar/fullcalendar.min.css')}}" />
<link rel="stylesheet" href="{{asset('fullcalendar/fullcalendar.print.min.css')}}" />
<link rel="stylesheet" href="{{asset('fullcalendar/fullcalendar.print.css')}}" />
<link rel="stylesheet" href="{{asset('fullcalendar/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('css/dashboard-style.css')}}" /> 
@endsection 

@section('conteudo')
<main class="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col s12 m12">
					<div class="card filter-card transparent z-depth-0">
						<div class="card-content">
							<span class="page-title cyan-text">{{ $prova-> nome }}</span>
							<button class="waves-effect waves-light btn btn-terminar transparent z-depth-0 cyan-text right">Terminar a Prova</button>
							<hr>
							<br>
							<div class="row">
								<div class="col s12 m6">
									<div class="card deep-orange lighten-2 white-text">
										<div class="card-content valign-wrapper">
											<video class="responsive-video" controls>
												<source src="videos/big_buck_bunny.mp4" type="video/mp4">
											</video>
										</div>
									</div>
								</div>
								<div class="col s12 m1 center">
									<ul class="pagination">
										<li class="cyan number">
											<a class="white-text">
												1
											</a>
										</li>
									</ul>
								</div>
								<div class="col s12 m5">
									<ul class="collection with-header">

										<li class="collection-header row">
											<div class="col sm12 m11">
												<p> {{$questao -> descricao}} </p>
											</div>
											<div class="col sm12 m1">
												<a class="btn-floating halfway-fab waves-effect waves-light z-depth-0 transparent">
													<i class="material-icons cyan-text">hearing</i>
												</a>
											</div>
                                        </li>
                                        @FOREACH()
										<li class="collection-item row">
											<div class="col sm12 m11">
												<div class="radio-button-label">
													<input class="with-gap" name="alternativas" type="radio" id="alt1" />
													<label for="alt1"> {{$alternativa -> descricao}} </label>
												</div>
                                            </div>                                            
											<div class="col sm12 m1">
												<a class="btn-floating halfway-fab waves-effect waves-light z-depth-0 transparent">
													<i class="material-icons cyan-text">hearing</i>
												</a>
											</div>
                                        </li>
                                        @ENDFOREACH
										<li class="collection-item row">
											<div class="col sm12 m11">
												<div class="radio-button-label">
													<input class="with-gap" name="alternativas" type="radio" id="alt2" />
													<label for="alt2">
														conjunto de formatações a que se pode atribuir nome e aplicá-lo sempre que se desejar.</label>
												</div>
											</div>
											<div class="col sm12 m1">
												<a class="btn-floating halfway-fab waves-effect waves-light z-depth-0 transparent">
													<i class="material-icons cyan-text">hearing</i>
												</a>
											</div>
										</li>
										<li class="collection-item row">
											<div class="col sm12 m11">
												<div class="radio-button-label">
													<input class="with-gap" name="alternativas" type="radio" id="alt3" />
													<label for="alt3">
														esquema de formatação de páginas, incluindo cabeçalho e rodapé, a que se pode atribuir nome e aplicá-lo em diversos documentos.</label>
												</div>
											</div>
											<div class="col sm12 m1">
												<a class="btn-floating halfway-fab waves-effect waves-light z-depth-0 transparent">
													<i class="material-icons cyan-text">hearing</i>
												</a>
											</div>
										</li>
										<li class="collection-item row">
											<div class="col sm12 m11">
												<div class="radio-button-label">
													<input class="with-gap" name="alternativas" type="radio" id="alt4" />
													<label for="alt4">
														padrão de cores utilizado em figuras do tipo clipart, a que é possível atribuir nome e aplicá-lo sempre que se desejar.</label>
												</div>
											</div>
											<div class="col sm12 m1">
												<a class="btn-floating halfway-fab waves-effect waves-light z-depth-0 transparent">
													<i class="material-icons cyan-text">hearing</i>
												</a>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer class="page-footer transparent center">
		<div class="container-fluid">
			<div class="row">
				<div class="col m12 s12">
					<ul class="pagination">
						<li class="disabled arrows">
							<a href="#!">
								<i class="material-icons">chevron_left</i>
							</a>
						</li>
						<li class="active">
							<a href="#!">1</a>
						</li>
						<li class="waves-effect">
							<a href="#!">2</a>
						</li>
						<li class="waves-effect">
							<a href="#!">3</a>
						</li>
						<li class="waves-effect">
							<a href="#!">4</a>
						</li>
						<li class="waves-effect">
							<a href="#!">5</a>
						</li>
						<li class="waves-effect">
							<a href="#!">6</a>
						</li>
						<li class="waves-effect">
							<a href="#!">7</a>
						</li>
						<li class="waves-effect">
							<a href="#!">8</a>
						</li>
						<li class="waves-effect">
							<a href="#!">9</a>
						</li>
						<li class="waves-effect">
							<a href="#!">10</a>
						</li>
						<li class="waves-effect arrows">
							<a href="#!">
								<i class="material-icons">chevron_right</i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
@endsection