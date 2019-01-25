@extends('admin.layouts.login')


@section('style')
<style>
form.login .btn-primary {
    background: #ff0066;
    border: #ff0066 2px solid;
    font-size: 11px;
    width: 45%;
}
</style>
@endsection

@section('content')
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
data-animsition-out="fade-out">>
   <div class="page-content vertical-align-middle" style="width: 450px;">
     <div class="brand">
       @if(Session::has('success_message'))
           <div class="info-label success">
             <h3>Cuenta Creada!</h3>
             Revisa tu email, se ha enviado la informacion de acceso!
           </div>
      @endif



<span class="glyphicons glyphicons-dog"></span>
      <a href="../"><img class="brand-img" src="front/images/logo.svg" alt="..."></a>

</div>

@if(Session::has('error_message'))
  <div class="message-error">
    <h3>Error :(</h3>
    <p>Usuario / Clave Incorrectos</p>
  </div>
@endif

@if(Session::has('status'))
  <div class="message-status">
    <h3>Se ha enviado un E-mail</h3>
    <p>Hemos enviado un link para restaurar tu clave!</p>
  </div>
@endif


        <form role="form" class="login"method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                          <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                        <div class="form-group">
                          <label class="sr-only" for="inputName">Name</label>
                                     <input type="text" class="form-control" id="inputName" name="username" placeholder="Usuario" value="{{ old('username') }}" />
                                   </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="sr-only" for="inputPassword">Password</label>
                                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Clave">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                          <div class="col-md-12" style="padding-left: 0px !important; padding-right: 0px !important;">
                                <button type="submit" class="btn btn-primary" style="width:100%;">
                                    <i class="fa fa-btn fa-sign-in"></i> Ingresar
                                </button>
                          </div>
                                @if(!Session::has('error_message'))
                                <br>
                                <br><center>Aun no estas resgistrado?</center>
                                <br>
                                <a href="/register" class="btn btn-primary btn-login">Registrarme</a>
                                <br>
                                @endif
                        </div>
                    </form>


                    @if(Session::has('error_message'))
                    <div class="message-error">
                        <h3>Necesita Ayuda?</h2>
                        <p>Ingrese a continuacion su e-Mail registrado y te enviaremos un link para restaurar tu clave.</p>
                    </div>
                    <form class="form-horizontal login" role="form" method="POST" action="{{ url('/password/email') }}">
                       {{ csrf_field() }}
                       <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           <label for="email" class="col-md-12 control-label"><center>E-Mail</center></label>

                           <div class="col-md-12">
                               <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                               @if ($errors->has('email'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('email') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group">
                           <div class="col-md-12">
                               <button type="submit" class="btn btn-primary">
                                   <i class="fa fa-btn fa-envelope"></i> Solicitar Clave
                               </button>
                           </div>
                       </div>
                    </form>

                    @endif
                </div>
            </div>
@endsection
