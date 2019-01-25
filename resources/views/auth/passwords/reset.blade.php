@extends('admin.layouts.login')

@section('content')
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
data-animsition-out="fade-out">>
   <div class="page-content vertical-align-middle" style="width: 370px;">
     <div class="brand">
       @if(Session::has('success_message'))
           <div class="info-label success">
             <h3>Cuenta Creada!</h3>
             Revisa tu email, se ha enviado la informacion de acceso!
           </div>
       @elseif(Session::has('error_message'))
           <div class="info-label error">
             <h3>Error :(</h3>
            <p>Datos Incorrectos! Intentalo nuevamente..</p>
            <a href="/password/email" class="olvide-clave">Olvide mis datos de acceso</a>
           </div>
      @endif


      <a href="../"><img class="brand-img" src="../../front/images/logo.svg" alt="..."></a>

</div>
<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">E-Mail</label>

        <div class="col-md-12">
            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="control-label">Nueva Clave</label>

        <div class="col-md-12">
            <input id="password" type="password" class="form-control" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password-confirm" class="control-label">Confirmar Clave</label>
        <div class="col-md-12">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-refresh"></i> Cambiar Clave
            </button>
        </div>
    </div>
</form>
                </div>
            </div>
@endsection
