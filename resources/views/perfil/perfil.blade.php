@extends('layouts.padrao')

@section('titulo','Perfil {{Auth::user()->name}}')

@section('conteudo')
<div class="main">
	  <div class="container-fluid">
		<div class="row">
            <div class="col-md-10 col-md-offset-1">
                <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left;  border-radius: 50%;" />
                <h2>{{ $user->name }}</h2>
                <form enctype="multipart/form-data" action="/perfil" method="post">
                <label><b>Selecione uma imagem de perfil: </b></label></br>
                <input type="file" name="avatar" /></br>
                <input type="submit" />
                {{ csrf_field() }}
                </form>
            </div>
		</div>
	  </div>
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script src='fullcalendar/lib/moment.min.js'></script>
	<script src='fullcalendar/fullcalendar.js'></script>
	<script src='fullcalendar/locale/pt-br.js'></script>
@endsection
