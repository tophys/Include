@extends('layouts.authPadrao')

@section('titulo', 'Login ou Registro')

@section('conteudo')
	<div class="row">
		<div class="input-cart col s12 m10 push-m1 z-depth-2 grey lighten-5">
			<div class="col s12 m5 login">
				<h4 class="center">Entrar no Include@</h4>
				<br>
				<form method="post" autocomplete="on" action="{{ route('login') }}">
					{{ csrf_field() }}	
					<div class="row">
						<div class="input-field">
							<input type="text" id="cpf" name="cpf" class="validate" required="required" placeholder="CPF">
							<label for="cpf"><i class="material-icons">person</i></label>
						</div>	
					</div>
					<div class="row">
						<div class="input-field">
							<input type="password" id="password" name="password" class="validate" required="required" placeholder="Senha">
							<label for="password"><i class="material-icons">lock</i></label>
						</div>	
					</div>
					<div class="row">
						<div class="switch col s6">
						</div> 							
						<div class="col s6">
							<button type="submit" name="login" class="btn waves-effect waves-light blue right">Entrar</button>
						</div>
					</div>
				</form>
			</div>
			<!-- Signup form -->
			<div class="col s12 m7 signup">
				<div class="signupForm">
					<h4 class="center">Cadastro</h4>
					<br>
					<form action="{{ route('register') }}" name="signup" method="post" autocomplete="on">
						{{ csrf_field() }}
						<div class="row">
							<div class="input-field col s12 ">
								<input type="text" id="name" name="name" class="validate" required="required" placeholder="Insira seu nome completo">
								<label for="name"> <i class="material-icons">person_add</i></label>
								@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
							<div class="input-field col s12 m6">
								<input type="text" id="cpf" name="cpf" class="validate" required="required" placeholder="Insira seu CPF completo">
								<input type="text" id="cpf_confirmation" name="cpf_confirmation" class="validate" required="required" placeholder="Confirme seu CPF">
								<label for="cpf"><i class="material-icons">assignment_ind</i></label>
								@if ($errors->has('cpf'))
								<span class="help-block">
									<strong>{{ $errors->first('cpf') }}</strong>
								</span>
								@endif
								@if ($errors->has('cpf_confirmation'))
								<span class="help-block">
									<strong>{{ $errors->first('cpf_confirmation') }}</strong>
								</span>
							@endif
							</div>
							<div class="input-field col s12 m6">
								<input type="password" id="password" name="password" class="validate" required="required" placeholder="Insira Sua Senha">
								<input type="password" id="password_confirmation" name="password_confirmation" class="validate" required="required" placeholder="Confirme sua Senha">
								<label for="password"><i class="material-icons">lock</i></label>
								@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
								@if ($errors->has('password_confirmation'))
									<span class="help-block">
										<strong>{{ $errors->first('password_confirmation') }}</strong>
									</span>
								@endif
							</div>	
						</div>
						<div class="row">
							<!--Email --> 
							<div class="input-field email">
								<div class="col s12">
									<input type="text" id="email" name="email" class="validate" required="required" placeholder="Insira seu Email">
									<label for="email"><i class="material-icons">mail</i></label>
									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
							</div>
							<!--Confirmação de email-->
							<div class="col s12">
								<div class="input-field email">
									<input type="text" id="email_confirmation" name="email_confirmation" class="validate" required="required" placeholder="Confirme  seu Email">
									@if ($errors->has('email_confirmation'))
										<span class="help-block">
											<strong>{{ $errors->first('email_confirmation') }}</strong>
										</span>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col s12">
								<button type="submit" name="btn-signup" data-modal="#modal" class="modal__trigger btn blue right waves-effect waves-light">Cadastrar</button>
							</div>
						</div>
					</form>
				</div>
				<div class="signup-toggle center" >
					<h4 class="center">Novo no Include@ ? <a href="#!">Cadastre-se</a></h4>
				</div>
			</div>
			<div class="col s12">
				<br>
				<div class="legal center"></div>
				<div class="legal center">
					<div class="col s12 m7 right">
						<p class="grey-text policy center">Se cadastrando, você aceita a nossa <a href="#!">Politica de privacidade</a> e nossos  <a href="#!">Termos de Uso</a> incluindo <a href="#!">Uso de Cookies</a>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js'></script>
	<script src="{{ asset('js/index.js') }}"></script>
@endsection