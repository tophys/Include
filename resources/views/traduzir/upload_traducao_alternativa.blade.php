@extends('layouts.padrao') 
@section('titulo','Upload da Tradução') 
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
                    <div class="card-content">
                        <span class="page-title light-green-text">Envio de Tradução</span>
                        <hr>
                        <br>
                        <div class="row">
                            <div class="input-field col s12 m12">
                                <textarea placeholder="&nbsp;" id="texto_traduzido" class="materialize-textarea" disabled>{{$alternativa->descricao}}</textarea>
                                <label for="texto_traduzido">Texto traduzido:</label>
                            </div>
                        </div>
                        <div class="col s12 m6">
                        @if ($alternativa->traduzida == 0)
                            <video class="responsive-video" controls>
                                <source src="/uploads/alternativas/{{$alternativa->src}}" type="video/mp4">
                                <source src="/uploads/alternativas/{{$alternativa->src}}" type="video/ogg">
                                <source src="/uploads/alternativas/{{$alternativa->src}}" type="video/webm">
                                Seu navegador não suporta este tipo de vídeo
                            </video>
                        @else
                            <h4>Alternativa sem tradução</h4>
                        @endif
                        </div>
                        
                        <div class="col s12 m6">
                        <form enctype="multipart/form-data" id="formAlternativa" action="{{route('traduzir.alternativa', ['id' => $alternativa->id] )}}" method="post">
                            <input type="hidden" name="questao_id" value="{{$id}}" />$_COOKIE
                            <input type="hidden" name="alternativa_id" value="{{$alternativa->id}}" />
                            {{ csrf_field() }}
                                <div class="file-field input-field">
                                    <div class="btn light-green">
                                        <span>Selecionar</span>
                                        <input type="file"  name="alternativa" />
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Selecione um vídeo para enviar">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <br>
                            <div class="col sm12 m2 offset-m8">
                                <a  class="waves-effect right waves-light btn orange lighten-1">Voltar</a>
                            </div>
                            <div class="col sm12 m2 right">
                                <a onclick="event.preventDefault();document.getElementById('formAlternativa').submit();" class="waves-effect right waves-light btn orange lighten-1">Enviar</a>
                            </div>
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