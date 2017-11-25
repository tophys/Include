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
            <div class="col s12 m4">
                <div class="card deep-orange lighten-1 white-text">  
                    <div class="card-content valign-wrapper">
                        <div class="card-text">
                            <h6>Elaborar Prova</h6>
                            <p>Crie uma nova prova.</p>
                        </div>
                        <div class="card-icon">
                            <i class="material-icons medium valign">add_to_queue</i>
                        </div>
                    </div>
                    <div class="card-action">
                       <a href="#">Criar agora</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card light-green white-text">  
                    <div class="card-content valign-wrapper">
                        <div class="card-text">
                             <h6>Elaborar Questão</h6>
                            <p>Crie uma nova questão.</p>
                         </div>
                         <div class="card-icon">
                            <i class="material-icons medium valign">add_to_photos</i>
                        </div>
                    </div>
                    <div class="card-action">
                        <a href="#">Criar agora</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card orange lighten-1 white-text">  
                    <div class="card-content valign-wrapper">
                        <div class="card-text">
                            <h6>Liberar Prova</h6>
                            <p>Libere uma prova para execução.</p>
                        </div>
                        <div class="card-icon">
                            <i class="material-icons medium valign">event_available</i>
                        </div>
                    </div>
                    <div class="card-action">
                        <a href="#">Liberar Agora</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m4">
                <ul class="collection with-header">
                    <li class="collection-header white-text orange lighten-1"><h5 class="valign-wrapper"><i class="material-icons">notifications_active</i>&nbsp;&nbsp;Avisos</h5></li>
                    <li class="collection-item">
                        <div class="valign-wrapper">
                            <span id="not2">Ana Luiza deseja participar da ADS171 - Desenvolvimento WEB I</span>
                            <a href="#!" class="secondary-content"><i class="material-icons orange-text">navigate_next</i></a>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="valign-wrapper">
                            <span id="not2">Prof. Eduardo enviou uma sugestão à sua questão</span>
                            <a href="#!" class="secondary-content"><i class="material-icons orange-text">navigate_next</i></a>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="valign-wrapper">
                            <span id="not3">Você tem uma prova à liberar agendada para este mês</span>
                            <a href="#!" class="secondary-content"><i class="material-icons orange-text">navigate_next</i></a>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="valign-wrapper">
                            <span id="not4">Você ainda não salvou a prova DWEI - 1º Sem</span>
                            <a href="#!" class="secondary-content"><i class="material-icons orange-text">navigate_next</i></a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col s12 m8">
                <div class="card cyan">
                    <div class="card-content valign-wrapper" id="calendar">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src='../fullcalendar/lib/moment.min.js'></script>
<script src='../fullcalendar/fullcalendar.js'></script>
<script src='../fullcalendar/locale/pt-br.js'></script>
<script>
    $(document).ready(function() {

        // page is now ready, initialize the calendar...

        $('#calendar').fullCalendar({
            // put your options and callbacks here
        })

    });
</script>
@endsection