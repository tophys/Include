@extends('layouts.padrao')

@section('titulo','Criar Alternativa')

@section('plugins')
    <link rel="stylesheet" href="../../fullcalendar/fullcalendar.min.css" />
	<link rel="stylesheet" href="../../fullcalendar/fullcalendar.print.min.css" />
	<link rel="stylesheet" href="../../fullcalendar/fullcalendar.print.css" />
	<link rel="stylesheet" href="../../fullcalendar/fullcalendar.css" />
	<link rel="stylesheet" href="../../css/dashboard-style.css" />
@endsection

@section('conteudo')
<div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col s12 m12">
                    <div class="card filter-card transparent z-depth-0">
                        <div class="card-content row">
                            <span class="page-title light-green-text">Cadastro de Alternativas</span>
                            <hr>
                            <form method="post" action="{{ route('nova.alternativa', ['id' => $id]) }}">
	                    	{{ csrf_field() }}
                                <br>
                                <div class="row">
                                    <div class="col sm12 m12">
                                        <div class="switch right">
                                            <label>
                                                Errada
                                                <input value="correta" name="correta" type="checkbox">
                                                <span class="lever"></span>
                                                Correta
                                            </label>
                                        </div>
                                        <div class="input-field">
                                            <label for="altr_1">Alternativa</label>
                                            <input id="descricao" name="descricao" type="text">
                                            <input type="hidden" name="questao_id" value="{{$id}}" />
                                        </div>
                                    </li>
                                </div>
                                <div class="row">
                                    <div class="col sm12 m12">
                                        <br>
                                        <button class="waves-effect right waves-light btn orange lighten-1">Salvar</button>
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
        <script src='../../js/configuracoes-datepicker.js'></script>
        <script>
            $(document).ready(function () {
                $(".activate-toolbar").click(function () {
                    $('.fixed-action-btn.toolbar').openToolbar();
                });

                $(document).ready(function () {
                    $('select').material_select();
                });
            });
        </script>
@endsection