@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.admin')
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
            <li><a href="/">Inicio</a></li>
            <li><a href="/">Veterinarias</a></li>
            <li class="active">Nueva Veterinaria</li>
          </ol>
          <h2 class="page-title">Veterinarias</h2>
        </div>
  </div>

</div>

<div class="row" data-plugin="matchHeight" data-by-row="true">
    <div class="col-xlg-12 col-md-12">
      <!-- Panel Wizard Form Container -->
          <div class="panel" id="petWizardFormContainer">
            <h4 class="panel-form-container">NUEVA VETERINARIA</h4>
            <div class="panel-body">
              <!-- Steps -->
              <div class="pearls row">
                <div class="pearl current col-xs-4">
                  <div class="pearl-icon"><i class="icon wb-large-point" aria-hidden="true"></i></div>
                  <span class="pearl-title">Datos Generales</span>
                </div>
                <div class="pearl col-xs-4">
                  <div class="pearl-icon"><i class="icon wb-large-point" aria-hidden="true"></i></div>
                  <span class="pearl-title">Administrador</span>
                </div>
                <div class="pearl col-xs-4">
                  <div class="pearl-icon"><i class="icon wb-large-point" aria-hidden="true"></i></div>
                  <span class="pearl-title">Confirmacion</span>
                </div>
              </div>
              <!-- End Steps -->
              <!-- Wizard Content -->
              <form class="wizard-content" id="dataFormContainer" action="" method="post" enctype="multipart/form-data">

                <div class="wizard-pane active" role="tabpanel">
                  <div class="container">
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                      <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="name" placeholder="Nombre Veterinaria *" autocomplete="off" required>
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="identification" placeholder="NIT / RUT" autocomplete="off" required>
                                </div>
                            </div>
                          </div>

                      </div>
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="icon wb-map" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="address" placeholder="Dirección *" autocomplete="off" required>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon fa-phone-square" aria-hidden="true"></i></span>
                                    <input type="number" class="form-control" name="phone" placeholder="Teléfono *" autocomplete="off" required>
                                </div>
                            </div>
                          </div>

                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon fa-map" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="city" placeholder="Ciudad *" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon fa-globe" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="country" placeholder="País" autocomplete="off">
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon fa-envelope" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="email" placeholder="Correo Electrónico *" autocomplete="off" required>
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon fa-send" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="url" placeholder="Pagina Web" value="http://" >
                                </div>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="wizard-pane" id="exampleBillingOne" role="tabpanel">


                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="nameAdmin" placeholder="Nombre Administrador *">
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="lastNameAdmin" placeholder="Apellidos Administrador *">
                        </div>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="icon fa-phone-square" aria-hidden="true"></i></span>
                              <input type="number" class="form-control" name="phone_admin" placeholder="Teléfono Administrador" autocomplete="off">
                          </div>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="username" placeholder="Usuario *" autocomplete="off" onkeypress="javascript: return ValidarNumero(event, this)">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="passwordAdmin" placeholder="Contraseña *" autocomplete="off">
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                          <input type="password" class="form-control" name="repasswordAdmin" placeholder="Conf. Contraseña *" autocomplete="off">
                        </div>
                      </div>
                  </div>





                </div>
                <div class="wizard-pane data" id="exampleGettingOne" role="tabpanel">
                  <div class="confirmation-panel">
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Nombre </label>
                          <span id="nameVeterinary"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Identificación </label>
                          <span id="identificationVeterinary"></span>
                        </div>
                      </div>

                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Dirección </label>
                          <span id="addressVeterinary"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Teléfono </label>
                          <span id="phoneVeterinary"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Ciudad </label>
                        <span id="cityVeterinary"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">País </label>
                          <span id="countryVeterinary"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Correo Electrónico </label>
                          <span id="emailVeterinary"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Página Web </label>
                          <span id="urlVeterinary"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Nombre Administrador </label>
                          <span id="nameAdmin"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Apellidos Administrador </label>
                          <span id="lastNameAdmin"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Teléfono Administrador </label>
                        <span id="phoneAdmin"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Usuario Administrador </label>
                          <span id="usernameAdmin"></span>
                        </div>
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

function ValidarNumero (e, campo) {
    key = e.keyCode ? e.keyCode : e.which;
    if(key == 32){return false;}
}


function setUser(id){
    $("#user").val(id);
    $(".pull-right").trigger( "click" );
}

function selectRace(){
  var petType = document.getElementById("petType").value;
  $("#raza").empty();
  $.get( "races/"+petType, function(data) {
    var listitems;
    $.each(data, function (index, value) {
      listitems += '<option value=' + value.race + '>' + value.race + '</option>';
    });
  $("#raza").append(listitems);

  });

}


(function() {

  $("[name='name']").change(function(){
        $("#nameVeterinary").html($("[name='name']").val());
  });

  $("[name='address']").change(function(){
        $("#addressVeterinary").html($("[name='address']").val());
  });

  $("[name='phone']").change(function(){
        $("#phoneVeterinary").html($("[name='phone']").val());
  });

  $("[name='city']").change(function(){
        $("#cityVeterinary").html($("[name='city']").val());
  });

  $("[name='country']").change(function(){
        $("#countryVeterinary").html($("[name='country']").val());
  });

  $("[name='email']").change(function(){
        $("#emailVeterinary").html($("[name='email']").val());
  });

  $("[name='url']").change(function(){
        $("#urlVeterinary").html($("[name='url']").val());
  });

  $("[name='identification']").change(function(){
        $("#identificationVeterinary").html($("[name='identification']").val());
  });

  $("[name='nameAdmin']").change(function(){
        $("#nameAdmin").html($("[name='nameAdmin']").val());
  });

  $("[name='lastNameAdmin']").change(function(){
        $("#lastNameAdmin").html($("[name='lastNameAdmin']").val());
  });

  $("[name='username']").change(function(){
        $("#usernameAdmin").html($("[name='username']").val());
  });

  $("[name='phone_admin']").change(function(){
        $("#phoneAdmin").html($("[name='phone_admin']").val());
  });


  $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
         }
  });



  var defaults = $.components.getDefaults("wizard");
  var options = $.extend(true, {}, defaults, {
    onInit: function() {
      $('#dataFormContainer').formValidation({
        framework: 'bootstrap',
        fields: {
          name: {
              validators: {
                notEmpty: {
                  message: 'Ingresa el Nombre de la Veterinaria'
                }
              }
          },address: {
              validators: {
                notEmpty: {
                  message: 'Ingresa la dirección de la Veterinaria'
                }
              }
          },phone: {
              validators: {
                notEmpty: {
                  message: 'Ingresa el teléfono de la Veterinaria'
                }
              }
          },city: {
              validators: {
                notEmpty: {
                  message: 'Ingresa la ciudad de la Veterinaria'
                }
              }
          },email: {
              validators: {
                notEmpty: {
                  message: 'Ingresa el e-Mail de la Veterinaria'
                },remote: {
                    message: 'El email ya se encuentra registrado',
                    url: '/validate/form/email',
                    type: 'POST',
                    delay: 2000
                }
              }
          },nameAdmin: {
              validators: {
                notEmpty: {
                  message: 'Ingresa el Nombre del Administrador'
                }
              }
          },lastNameAdmin: {
              validators: {
                notEmpty: {
                  message: 'Ingresa el Apellido del Administrador'
                }
              }
          },identification: {
              validators: {
                notEmpty: {
                  message: 'Ingresa la RUT o NIT de la Veterinaria'
                },remote: {
                    message: 'El RUT o NIT  ya se encuentra registrado',
                    url: '/validate/form/nit',
                    type: 'POST',
                    delay: 2000
                }
              }
          },username: {
              validators: {
                notEmpty: {
                  message: 'Ingresa un Nombre de Usuario'
                },remote: {
                    message: 'El username ya se encuentra registrado',
                    url: '/validate/form/username',
                    type: 'POST',
                    delay: 2000
                }
              }
          },passwordAdmin: {
            validators: {
                notEmpty: {
                  message: 'Ingresa una contraseña'
                },
                identical: {
                    field: 'repasswordAdmin',
                    message: 'La contraseña NO coincide'
                }
            }
        },repasswordAdmin: {
            validators: {
                identical: {
                    field: 'passwordAdmin',
                    message: 'La contraseña NO coincide'
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
