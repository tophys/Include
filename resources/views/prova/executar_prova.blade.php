@extends('layouts.padrao') 

@section('titulo','Executar Prova') 

@section('plugins')
<link rel="stylesheet" href="{{asset('fullcalendar/fullcalendar.min.css')}}" />
<link rel="stylesheet" href="{{asset('fullcalendar/fullcalendar.print.min.css')}}" />
<link rel="stylesheet" href="{{asset('fullcalendar/fullcalendar.print.css')}}" />
<link rel="stylesheet" href="{{asset('fullcalendar/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('css/prova-style.css')}}" /> 
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
@endsection 

@section('conteudo')

<main class="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col s12 m12">
					<div class="card filter-card transparent z-depth-0">
						<div class="card-content">
							<form action="{{route('show.prova')}}" method="post">
							{{csrf_field()}}
							<input type="hidden" value="{{$idAgendamento}}" name="idAgendamento" />
							<input type="hidden" value="{{$questaoAtual}}" name="questaoAtual" />
							<input type="hidden" value="{{$questoes}}" name="questoes" />
								<span class="page-title cyan-text">{{ $prova-> nome }}</span>
								<button class="waves-effect waves-light btn btn-terminar transparent z-depth-0 cyan-text right">Salvar</button>
								<hr>
								<br>
								<div class="row">
									<div class="col s12 m6">
										<div class="card deep-orange lighten-2 white-text">
											<div class="card-content valign-wrapper" id="video">
												<video class="responsive-video" controls>
													<source src="{{asset('/uploads/questoes/' .$questao->src)}}" type="video/mp4">
												</video>
											</div>
										</div>
									</div>
									<div class="col s12 m1 center">
										<ul class="pagination">
											
										</ul>
									</div>
									<div class="col s12 m5">
										<ul class="collection with-header">

											<li class="collection-header row">
												<div class="col sm12 m11">
													<p> {{$questao -> descricao}} </p>
												</div>
												<div class="col sm12 m1">
													<a id="questao" class="btn-floating halfway-fab waves-effect waves-light z-depth-0 transparent">
														<i class="material-icons cyan-text">hearing</i>
													</a>
												</div>
											</li>
											<script>
												$("#questao").click(function(){
													$("#video").empty();
													$("#video").append(
														"<video class='responsive-video' controls>"+
															"<source src='{{asset('/uploads/questoes/' .$questao->src)}}' type='video/mp4'>"+
														"</video>"
													);
												});
											</script>
											@FOREACH($questao->alternativas as $alternativa)
											<li class="collection-item row">
												<div class="col sm12 m11">
													<div class="radio-button-label">
														<input class="with-gap" name="alternativas" type="radio" id="alt{{$alternativa->id}}" />
														<label for="alt{{$alternativa->id}}"> {{$alternativa -> descricao}} </label>
													</div>
												</div>
												<div class="col sm12 m1">
													<a id="alternativa{{$alternativa->id}}" class="btn-floating halfway-fab waves-effect waves-light z-depth-0 transparent">
														<i class="material-icons cyan-text">hearing</i>
													</a>
												</div>
											</li>
											<script>
												$("#alternativa{{$alternativa->id}}").click(function(){
													$("#video").empty();
													$("#video").append(
														"<video class='responsive-video' controls>"+
															"<source src='{{asset('/uploads/alternativas/' .$alternativa->src)}}' type='video/mp4'>"+
														"</video>"
													);
												});
											</script>
											@ENDFOREACH
										</ul>
									</div>
								</div>
							</form>
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
					<!--<li class="disabled arrows">
							<a href="#!">
								<i class="material-icons">chevron_left</i>
							</a>
						</li>
						@for ($i = 0; $i < count($questoes); $i++ )
						
						<li class="waves-effect">		
							<a href="#!">$i</a>
						</li>
						@endfor
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
						</li>-->
					</ul>
				</div>
			</div>
		</div>
	</footer>
	
@endsection