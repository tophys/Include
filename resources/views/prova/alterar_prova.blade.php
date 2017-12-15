@extends('layouts.padrao') 
@section('titulo','Dashboard Professor') 
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
                        <span class="page-title light-green-text">Alteração de prova</span>
                        <hr>
                        <form method="post" action="{{ route('alterar.prova', ['id' => $prova->id]) }}">
                             {{ csrf_field() }}
                            <br>
                            <div class="row">
                                <div class="input-field col s12 m7">
                                    <input placeholder="&nbsp;" id="nome" name="nome" type="text" class="validate" value="{{$prova -> nome}}">
                                    <label for="nome">Título</label>
                                </div>
                                <div class="input-field col s12 m3">
                                <input type="hidden" id="id" value="{{$prova->id}}" />
                                    <select name='materia_id'>
                                        <option value="" disabled>Selecione</option>
                                        @FOREACH ($materias as $materia) 
                                        @IF ($materia->id == $prova->materia_id)
                                        <option selected value="{{ $materia->id }}">{{ $materia-> nome }}</option>
                                        @ELSE
                                        <option value="{{ $materia->id }}">{{ $materia-> nome }}</option>
                                        @ENDIF @ENDFOREACH
                                    </select>
                                    <label>Matéria</label>
                                </div>
                                <div class="input-field col s12 m2">
                                    <label for="prova_criacao">Data de Criação</label>
                                    <input id="prova_criacao" type="text" value="{{$prova -> created_at-> format('d-m-Y')}}" disabled readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12" id="questions-results">
                                    <ul class="collection with-header">
                                        <li class="collection-header light-green">
                                            <span class="page-title white-text">Questões</span>
                                        </li>
                                        @FOREACH ($questoes as $questao)
                                        <li class="collection-item">
                                            <div>
                                                <span>{{ $questao->descricao }} </span>
                                                <a href="{{route('deselecionar.questao', ['id' => $prova->id, 'questao' => $questao->id])}}" class="secondary-content">
                                                    <i class="material-icons light-green-text">-</i>
                                                </a>
                                            </div>
                                        </li>
                                        @ENDFOREACH
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <br>
                                <div class="col sm12 m3 offset-m3">
									<a class="waves-effect right waves-light btn orange lighten-1" href="{{route('nova.questao')}}">Criar Questão</a>
								</div>
								<div class="col sm12 m3">
									<a class="waves-effect right waves-light btn orange lighten-1" href="{{route('selecionar.questao.professor', ['id' => $prova->id])}}">Selecionar Questões</a>
								</div>
								<div class="col sm12 m3">
									<button class="waves-effect right waves-light btn orange lighten-1" >Salvar Alterações</button>
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
        $(".activate-toolbar").click(function () {
            $('.fixed-action-btn.toolbar').openToolbar();
        });

        $(document).ready(function () {
            $('select').material_select();
        });
    });
</script> 
@endsection