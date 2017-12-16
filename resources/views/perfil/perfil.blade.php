@extends('layouts.padrao') @section('titulo','Perfil {{Auth::user()->name}}')
<link rel="stylesheet" href="{{asset('/css/dashboard-style.css')}}" /> @section('conteudo')
<div class="main">
	<div class="container-fluid">
		<div class="row">
			<form enctype="multipart/form-data" action="/perfil" method="post">
				<div class="col-md-6 col-md-offset-3">
					<h2 class="center">{{ $user->name }}</h2>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<img src="/uploads/avatars/{{ $user->avatar }}" class="materialboxed" style="width:150px; height:150px; float:left;  border-radius: 50%;" />
				</div>
				<div class="col-md-6 col-md-offset-3">
					<div class="file-field input-field">
						<div class="btn light-green">
							<span>Selecionar</span>
							<input type="file" name="avatar" />
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Selecione sua imagem de perfil">
						</div>
					</div>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<button class="waves-effect center waves-light btn orange lighten-1">Enviar foto</button>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script> @endsection