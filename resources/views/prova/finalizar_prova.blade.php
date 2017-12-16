@extends('layouts.padrao')

@section('titulo','Finalizar Prova')

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
            <div class="col s12 m4">
						<img src="{{asset('/images/img-final.png')}}">
                        <h5>Prova realizada com sucesso!</h5>
            </div>
            <div class="col sm12 m4 center">
            <a class="waves-effect right waves-light btn orange lighten-1" href="{{url('/dashboard/aluno')}}">Voltar para a Home</a>
            </div>    
        </div>
    </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="{{asset('js/configuracoes-datepicker.js')}}"></script>
<script>
    $(document).ready(function() {

        // page is now ready, initialize the calendar...

        $('#calendar').fullCalendar({
            // put your options and callbacks here
        })
    });
</script>
@endsection