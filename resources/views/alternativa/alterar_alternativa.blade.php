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
                            <form method="PUT" action="{{ route('alterar.alternativa', ['id' => $alternativa->id]) }}">
                            {{ method_field('PUT') }} {{ csrf_field() }}
                                <br>
                                <div class="row">
                                    <div class="col sm12 m12">
                                        <div class="switch right">
                                            <label>
                                                Errada
                                                <input name="correta" value="correta" type="checkbox">
                                                <span class="lever"></span>
                                                Correta
                                            </label>
                                        </div>
                                        <div class="input-field">
                                            <label for="altr_1">Alternativa</label>
                                            <input id="altr_1" type="text" vlaue="{{$alternativa ->descricao}}">
                                        </div>
                                    </li>
                                </div>
                                <div class="row">
                                    <div class="col sm12 m12">
                                        <br>
                                        <button class="waves-effect right waves-light btn orange lighten-1">Salvar Alterações</button>
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
                });
        </script>
@endsection
