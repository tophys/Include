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
			  <div class="row">
			  <div class="col s12 m12">
                  <span class="page-title light-green-text">Seleção de questões</span>
                  <hr>
				</div>	
              </div>
              <div class="row">
                  <form>
                  {{ csrf_field() }}
                    <div class="col s12 m12 card transparent z-depth-0">
                        <div class="card-content">
                            <div class="row">
                            <div class="input-field col s12 m4">
                                <input placeholder="&nbsp;" id="descricao" type="text" class="validate">
                                <label for="descricao">Enunciado</label>
                            </div>
                            <div class="input-field col s12 m2">
                                <label>Data de Criação</label>
                                <input placeholder="&nbsp;" id="prova_criacao" type="text" class="datepicker"  value="{{Carbon\Carbon::today()->format('d-m-Y')}}" disabled readonly>
                            </div>
                            <div class="input-field col s12 m3">
                                <select>
                                  <option value="" disabled selected>Selecione</option>
                                  @FOREACH ($materias as $materia)
                                  <option value="{{ $materia->id }}">{{ $materia->	nome }}</option>
                                 @ENDFOREACH
                                </select>
                                <label>Matéria</label>
                            </div>
                            <div class="input-field col s12 m3">
                                <select>
                                  <option value="" disabled selected>Selecione</option>
                                  <option value="1">Múltipla-escolha</option>
                                </select>
                                <label>Tipo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12">
                                <button class="btn btn-small right waves-effect waves-light deep-orange" id="open-results">Buscar questões</button>                                    
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
                    <div class="col s12 m12" id="questions-results">
                    <ul class="collection with-header">
                        <li class="collection-header light-green"><span class="page-title white-text">Resultado da busca</span></li>
                        @FOREACH ($questoes as $questao)
                        <li class="collection-item">
                        <div>
                                <span>{{ $questao->	descricao }} </span>
                                <button href="#!" class="secondary-content"><i class="material-icons light-green-text">add</i></button>
                            </div>
                            </li>
                       @ENDFOREACH                       
                    </ul>
                    </div>
                </div>
			  <div class="row">
                  <br>
                  <div class="col sm12 m3 offset-m6">
					<button class="waves-effect right waves-light btn orange lighten-1" href="criar_questao.html">Criar nova questão</button>
                  </div>
                  <div class="col sm12 m3">
					<button class="waves-effect right waves-light btn orange lighten-1" href="alterar_prova.html">Salvar a Prova</button>
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
	<script src='../js/configuracoes-datepicker.js'></script>
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