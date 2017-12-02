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
			  <span class="page-title light-green-text">Cadastro de prova</span>
			  <hr>
			  <form>
			  <br>
			  <div class="row">
                <div class="input-field col s12 m5">
                    <input placeholder="&nbsp;" id="prova_titulo" type="text" class="validate">
                    <label for="prova_titulo">Título</label>
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
                    <div class="input-field col s12 m2">
                            <label for="prova_criacao">Data de Criação</label>
                            <input id="prova_criacao" type="text" value="22/11/2017" disabled readonly>
                        </div>
                        <div class="input-field col s12 m2">
                                <label>Data para Execução</label>
                                <input placeholder="&nbsp;" id="prova_execucao" type="text" class="datepicker" readonly>
                            </div>	
              </div>
			  <div class="row">
			  <div class="col s12 m12">
                  <br>
                  <span class="page-title light-green-text">Seleção de questões</span>
                  <hr>
				</div>	
              </div>
              <div class="row">
                    <div class="col s12 m12 card transparent z-depth-0">
                        <div class="card-content">
                            <div class="row">
                            <div class="input-field col s12 m4">
                                <input placeholder="&nbsp;" id="prova_titulo" type="text" class="validate">
                                <label for="prova_titulo">Enunciado</label>
                            </div>
                            <div class="input-field col s12 m2">
                                <label>Data de Criação</label>
                                <input placeholder="&nbsp;" id="prova_criacao" type="text" class="datepicker" readonly>
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
                                <a class="btn btn-small right waves-effect waves-light deep-orange" id="open-results">Buscar questões</a>                                    
                            </div>
                        </div>
                        
                        </div>
                    </div>
                    <div class="col s12 m12" id="questions-results">
                    <ul class="collection with-header">
                        <li class="collection-header light-green"><span class="page-title white-text">Resultado da busca</span></li>
                        <li class="collection-item">
                            <div>
                                <span>Os teclados que são desenvolvidos no padrão
                                        ABNT2 não possuem o caractere cedilha. </span>
                                <a href="#!" class="secondary-content"><i class="material-icons light-green-text">add</i></a>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div>
                                <span>Entre os dispositivos de entrada de dados em
                                        informática, incluem-se:</span>
                                <a href="#!" class="secondary-content"><i class="material-icons light-green-text">add</i></a>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div>
                                <span>Para a recuperação de arquivos em HD
                                        danificado, um dos procedimentos
                                        normalmente utilizados é o Particionar. </span>
                                <a href="#!" class="secondary-content"><i class="material-icons light-green-text">add</i></a>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div>
                                <span>A menor unidade de informação armazenável em
                                        um computador é o byte, suficiente, em muitos
                                        casos, para armazenar um caracter. </span>
                                <a href="#!" class="secondary-content"><i class="material-icons light-green-text">add</i></a>
                            </div>
                        </li>
                    </ul>
                    </div>
                </div>
			  <div class="row">
                  <br>
                  <div class="col sm12 m3 offset-m6">
					<a class="waves-effect right waves-light btn orange lighten-1" href="criar_questao.html">Criar nova questão</a>
                  </div>
                  <div class="col sm12 m3">
					<a class="waves-effect right waves-light btn orange lighten-1">Prévia da Prova</a>
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