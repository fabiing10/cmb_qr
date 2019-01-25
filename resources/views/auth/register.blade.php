@extends('admin.layouts.login')

@section('style')
<style>
.input-group {
    width: 100%;
}
input.form-control {
    border: 0px;
    border-bottom: 1px solid #ffffff;
    background: none;
    color: white;
    font-size: 18px;
    text-align: center;

}
@media (max-width: 480px){
a.btn.btn-primary {
    font-size: 7.5px!important;
}
.pull-right {
    float: none!important;
}
img.logo-login {
    width: 20px;
}
}
.form-control.focus, .form-control:focus {
    border-color: #ffffff;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: white;
    background: none;
    border-bottom: 2px solid white;
}

form.register .btn-primary {
    background: #ff0066;
    border: #ff0066 2px solid;
    font-size: 11px;
}
</style>
@endsection


@section('content')
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
data-animsition-out="fade-out">>
   <div class="page-content vertical-align-middle">
     <div class="brand">
  <a href="../"><img class="brand-img" src="front/images/logo.svg" alt="..."></a>

</div>
        <form role="form" id="register" class="register" method="POST" action="{{ url('/register') }}">
          {{ csrf_field() }}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />


                          <div class="row">
                              <div class="col-lg-6 form-group">

                                <div class="input-group">
                                  <i class="icon wb-user" aria-hidden="true"></i>
                                  <input type="text" class="form-control" name="name" placeholder="Nombres *">
                                </div>
                              </div>
                              <div class="col-lg-6 form-group">
                                <div class="input-group">
                                  <i class="icon wb-user" aria-hidden="true"></i>
                                  <input type="text" class="form-control" name="lastName" placeholder="Apellidos *">
                                </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-6 form-group">
                                <div class="input-group">
                                  <i class="icon wb-envelope" aria-hidden="true"></i>
                                  <input type="text" class="form-control" name="email" placeholder="Correo Electrónico *">
                                </div>
                              </div>
                              <div class="col-lg-6 form-group">
                                <div class="input-group">
                                  <i class="icon wb-user-add" aria-hidden="true"></i>
                                  <input type="text" class="form-control" name="username" placeholder="Usuario *" onkeypress="javascript: return ValidarNumero(event, this)">
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-6 form-group">
                                <div class="input-group">
                                  <i class="icon wb-code-working" aria-hidden="true"></i>
                                  <input type="password" id="password" class="form-control" name="password" placeholder="Contraseña *">
                                </div>
                              </div>
                              <div class="col-lg-6 form-group">
                                <div class="input-group">
                                  <i class="icon wb-code-working" aria-hidden="true"></i>
                                  <input type="password" class="form-control" name="repassword" placeholder="Conf. Contraseña *">
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12 form-group">
                                <div class="input-group">
                                  <input type="checkbox" class="icheckbox-primary" name="terminosCondiciones" >
                                  <span class="t-name">Acepto Terminos y Condiciones</span>
                                </div>
                              </div>
                          </div>
                          <div class="col-sm-12 pull-right">
                            <input class="btn btn-primary submit-btn" type="submit" value="Crear Cuenta"/>

                            <center style="margin:20px;">o puedes registrarte con</center>

                          </div>

                          <div class="row">
                            <div class="col-xs-6" style="margin-left: 0px !important; padding-left: 0px !important; padding-right: 3px;">
                                  <a href="redirect" class="btn btn-primary" style="width:100%; margin-left: 0px !important; background-color:#3B5998 !important;border-color:#3B5998 !important;"><img class="logo-login faceboo-bg" src="front/images/facebook-icon.png" alt="..." width="30"/> Registrarme con Facebook</a>
                            </div>
                            <div class="col-xs-6" style="padding-left: 0px !important;padding-right: 0px !important;">
                                  <a href="redirect/google" class="btn btn-primary" style="margin-left: 0px !important;width:100%;background-color:#d83737 !important;border-color:#d83737 !important;"> <img class="logo-login google-bg" src="front/images/google-icon.png" width="30" /> Registrarme con Google</a>
                            </div>

                          </div>

                    </form>
                </div>
            </div>
@endsection



@section('script')

<script type="text/javascript">
function ValidarNumero (e, campo) {
    key = e.keyCode ? e.keyCode : e.which;
    if(key == 32){return false;}
}


$.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

    $(document).ready(function() {
        $("#register").validate({
            rules: {
                name: "required",
                lastName: "required",
                lastName: "required",
                terminosCondiciones: "required",
                password: {
                  required:true
                },
                repassword: {
                  equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "../validate/email",
                        type: "post"
                    }
                },
                username: {
                    required: true,
                    remote: {
                        url: "../validate/username",
                        type: "post"
                    }
                },
            },
            messages: {
                name: "Ingresa tu Nombre",
                lastName: "Ingresa tus Apellidos",
                terminosCondiciones: "Para continuar debe aceptar los terminos y condiciones",
                password: "Ingresa una contraseña",
                repassword: "La contraseña NO coincide",
                email: {
                    required: "Ingresa tu e-Mail",
                    email: "Ingrese un email valido",
                    remote: "Este email ya esta registrado"
                },
                username: {
                    required: "Ingresa tu Nombre de Usuario",
                    remote: "Este usuario ya esta tomado"
                }
            }

        });
    });
</script>

@endsection
