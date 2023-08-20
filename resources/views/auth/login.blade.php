@extends('layouts.auth-master')

@section('content')
<div class="bg-login">
      <div class="container-login">
            <div class="logo-login">
              <img src="{{ asset('images/logo.png') }}">
            </div>
            <div class="panel panel-default">
                <div class="panel-body box-login">
                    <h2 class="h3 mb-3 fw-normal">Login</h2>

		    @include('layouts.partials.messages')
		    <form class="form-login" method="POST" action="{{ route('login.perform') }}">
			{{ csrf_field() }}
			<div class="form-group form-floating mb-3">
			    <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Usuário" required="required" autofocus>
			    <label for="floatingName">Usuário</label>
			    @if ($errors->has('username'))
				<span class="text-danger text-left">{{ $errors->first('username') }}</span>
			    @endif
			</div>
			
			<div class="form-group form-floating mb-3">
			    <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Senha" required="required">
			    <label for="floatingPassword">Senha</label>
			    @if ($errors->has('password'))
				<span class="text-danger text-left">{{ $errors->first('password') }}</span>
			    @endif
			</div>
			<div class="form-group">
			  <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
			</div>
			<div class="col-xs-6">
				<div class="pull-right">
				  <a ui-sref="register" class="text-center" href="{{ route('register.show') }}">Criar uma conta</a>
				</div>
			</div>
            	    </form>
                </div>
          </div>
      </div>
</div>

@endsection
