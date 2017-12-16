@extends('layouts.padrao')

@section('titulo','Alteração de Alternativas')

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
                        <div class="card-content row">
                            <span class="page-title light-green-text">Alteração de Alternativas</span>
                            <hr>
                            <form method="POST" action="{{ route('alterar.alternativa', ['id' => $idQuestao,'alternativa' => $alternativa->id]) }}">
                             {{ csrf_field() }}
                             <input type="hidden" value="{{$idQuestao}}" name="questao_id" />
                             <input type="hidden" value="{{$alternativa->id}}" name="alternativa_id" />
                                <br>
                                <div class="row">
                                    <div class="col sm12 m12">
                                        <div class="input-field">
                                            <label for="altr_1">Alternativa</label>
                                            <input id="altr_1" name="descricao" type="text" value="{{$alternativa ->descricao}}" />
                                        </div>
                                    </li>
                                </div>
                                <div class="row">
                                    <div class="col sm12 m12">
                                        <br>
                                        <a href="#modalSalvar" class="waves-effect right waves-light btn orange lighten-1 modal-trigger">Salvar Alterações</a>
                                    </div>
                                    <div id="modalSalvar" class="modal">
									<div class="modal-content">
										<h4>Alterar Alternativa</h4>
										<p>Tem certeza de que deseja alterar esta alternativa?</p>
									</div>
									<div class="modal-footer">
										<a href="ROTA AQUI" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar Alterações</a>
										<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Voltar</a>
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
        <script src="{{ asset('js/configuracoes-datepicker.js') }}"></script>
        <script>
            $(document).ready(function () {
                    $('select').material_select();
                    $('.modal').modal();
                });
        </script>
@endsection
