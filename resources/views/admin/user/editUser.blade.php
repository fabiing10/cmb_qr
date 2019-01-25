@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.user')
@stop

@section('style')


<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/summernote/summernote.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/asspinner/asSpinner.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/select2/select2.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/formvalidation/formValidation.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/jquery-wizard/jquery-wizard.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}">

@stop

@section('content')

<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/user">Inicio</a></li>
            <li><a href="/user/profile">Usuario</a></li>
            <li class="active">Actualizar Usuario</li>
          </ol>
          <h2 class="page-title">Usuarios</h2>
        </div>
  </div>
</div>

<div class="row" data-plugin="matchHeight" data-by-row="true">
    <div class="col-xlg-12 col-md-12">
      <!-- Panel Wizard Form Container -->
          <div class="panel" id="petWizardFormContainer">
            <h4 class="panel-form-container">Actualizar Usuario</h4>
            <div class="panel-body">
              <!-- Steps -->
              <div class="pearls row">
                <div class="pearl current col-xs-4" style="width: 100%;">
                  <div class="pearl-icon"><i class="icon wb-large-point" aria-hidden="true"></i></div>
                  <span class="pearl-title">{{$user->name}} {{$user->lastName}}</span>
                </div>

              </div>
              <!-- End Steps -->
              <!-- Wizard Content -->
              <form class="wizard-content" id="dataFormContainer" action="" method="post" enctype="multipart/form-data">

                <div class="wizard-pane active" role="tabpanel">
                  <div class="container">
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                      <input type="hidden" name="userId" value="{{$user->id}}"/>
                      <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                  <input type="text" class="form-control" name="name" placeholder="Nombres *" value="{{$user->name}}">
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                  <input type="text" class="form-control" name="lastName" placeholder="Apellidos *" value="{{$user->lastName}}">
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                  <input type="text" class="form-control" name="identification" placeholder="Identificación" value="{{$user->identification}}">
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" placeholder="Usuario " value="{{$user->username}}" disabled>
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="icon fa-envelope" aria-hidden="true"></i></span>
                                  @if($user->registerType == "socialite")
                                    <input type="text" class="form-control" name="email" placeholder="Correo Electronico" value="{{$user->email}}" disabled>
                                  @else
                                    <input type="text" class="form-control" name="email" placeholder="Correo Electronico" value="{{$user->email}}">
                                  @endif
                              </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-map" aria-hidden="true"></i></span>
                                  <input type="text" class="form-control" name="address" placeholder="Direccion" value="{{$user->address}}">
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-6">
                            <?php
                            $image = json_decode($user->imageProfile);
                            //Decode Values
                            $phonesResult = json_decode($user->phones);
                            if($phonesResult == ""){
                              $phones = "";
                            }else{
                              $phones = $phonesResult->phone;
                            }
                            ?>
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-mobile" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="phone" placeholder="Teléfono" value="{{$phones}}">
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="icon wb-globe" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="city" placeholder="Ciudad" value="{{$user->city}}">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                              <div class="input-group">
                                @if($user->registerType == "socialite")
                                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                  <input type="password" class="form-control" name="password" placeholder="Contraseña *" autocomplete="off" disabled>
                                @else
                                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                  <input type="password" class="form-control" name="password" placeholder="Contraseña *" autocomplete="off">
                                @endif
                              </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                              <div class="input-group">
                                @if($user->registerType == "socialite")
                                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                  <input type="password" class="form-control" name="re_password" placeholder="Conf. Contraseña *" autocomplete="off" disabled>
                                @else
                                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                  <input type="password" class="form-control" name="re_password" placeholder="Conf. Contraseña *" autocomplete="off">
                                @endif
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4 form-group">

                        </div>
                        <div class="col-lg-4 form-group text-center">
                            <div class="input-group input-group-file text-center w-100" style="width: 100%;">
                                <a href="#" onclick="imageUpload()" class="btn btn-icon btn-primary btn-action-profile btn-w80-p30" style="padding:6px; background-color: #ff0066 !important; border-color: #ff0066 !important; margin-left: 4px;">
                                  Foto Perfil
                                </a>
                                <br/>
                                No subir imagen mayor a 2MB
                                <input type="file" name="image" id="image" multiple="" style="display:none;">
                                </span>
                              </span>
                            </div>
                        </div>
                        <div class="col-lg-4 form-group">

                        </div>
                      </div>
                      <input type="submit" name="sendForm" id="sendForm" value="Enviar" style="display:none;"/>
                    </div>
                </div>

              </form>
              <!-- Wizard Content -->
            </div>
          </div>
          <!-- End Panel Wizard Form Container -->

    </div>
</div>
@stop





@section('plugins')

<script src="{{URL::asset('admin/global/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables-fixedheader/dataTables.fixedHeader.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables-bootstrap/dataTables.bootstrap.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables-tabletools/dataTables.tableTools.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/asrange/jquery-asRange.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/bootbox/bootbox.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/select2/select2.full.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/switchery/switchery.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/asspinner/jquery-asSpinner.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/formvalidation/formValidation.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/formvalidation/framework/bootstrap.js')}}"></script>

<script src="{{URL::asset('admin/global/vendor/jquery-wizard/jquery-wizard.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/summernote/summernote.min.js')}}"></script>


@stop

@section('script')
<script src="{{URL::asset('admin/global/js/components/select2.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/switchery.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/asspinner.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/datatables.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/jquery-wizard.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/forms/wizard.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/summernote.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v2.js')}}"></script>



<script type="text/javascript">

function setUser(id){
    $("#user").val(id);
    $(".pull-right").trigger( "click" );
}

function imageUpload(){
  $("#image").trigger("click");
}

function selectRace(){
  var petType = document.getElementById("petType").value;
  $("#raza").empty();
  $.get( "/races/"+petType, function(data) {
    var listitems;
    $.each(data, function (index, value) {
      listitems += '<option value=' + value.race + '>' + value.race + '</option>';
    });
  $("#raza").append(listitems);

  });

}


(function() {

  var defaults = $.components.getDefaults("wizard");
  var options = $.extend(true, {}, defaults, {
    onInit: function() {
      $('#dataFormContainer').formValidation({
        framework: 'bootstrap',
        fields: {
          name: {
              validators: {
                notEmpty: {
                  message: 'Digite su Nombre'
                }
              }
          },
          lastName: {
              validators: {
                notEmpty: {
                  message: 'Digite su Apellido'
                }
              }
          },phone: {
              validators: {
                notEmpty: {
                  message: 'Ingresa el numero de teléfono'
                }
              }
          },username: {
              validators: {
                notEmpty: {
                  message: 'Digite un nombre de usuario'
                },remote: {
                    message: 'El username ya se encuentra registrado',
                    url: '/validate/form/username',
                    type: 'POST'
                }
              }
          },email: {
              validators: {
                notEmpty: {
                  message: 'Digite su Email'
                }
              }
          },password: {
            validators: {
                identical: {
                    field: 're_password',
                    message: 'La contraseña no coincide'
                }
            }
        },re_password: {
            validators: {
                identical: {
                    field: 'password',
                    message: 'La contraseña no coincide'
                }
            }
          }

        }
      });
    },
    validator: function() {
      var fv = $('#dataFormContainer').data('formValidation');
      var $this = $(this);
      // Validate the container
      fv.validateContainer($this);
      var isValidStep = fv.isValidContainer($this);
      if (isValidStep === false || isValidStep === null) {
        return false;
      }
      return true;
    },
    onFinish: function() {
      $("#sendForm").trigger("click");

    },buttonsAppendTo: '.panel-body'
  });

  $("#petWizardFormContainer").wizard(options);

})();


</script>
@stop
