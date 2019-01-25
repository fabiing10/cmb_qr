@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.administrator')
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
<?php
//Decode Values
$phonesResult = json_decode($administrator->phones);
if($phonesResult == ""){
  $phones = "Sin asignar";
}else{
  $phones = $phonesResult->phone;
}
?>
<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/administrator">Inicio</a></li>
            <li><a href="/administrator/headquarters">Sedes</a></li>
            <li class="active">Editar Administrador</li>
          </ol>

        </div>
  </div>

</div>

<div class="row" data-plugin="matchHeight" data-by-row="true">
    <div class="col-xlg-12 col-md-12">
      <!-- Panel Wizard Form Container -->
          <div class="panel" id="petWizardFormContainer">
            <h4 class="panel-form-container">EDITAR ADMINISTRADOR</h4>
            <div class="panel-body">
              <!-- Steps -->
              <div class="pearls row">
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
                          <div class="col-lg-6 form-group">
                            <div class="input-group">
                              <span class="input-group-addon"></span>
                              <input type="text" class="form-control" name="nameAdmin" value="{{$administrator->name}}" placeholder="Nombres *">
                            </div>
                          </div>
                          <div class="col-lg-6 form-group">
                            <div class="input-group">
                              <span class="input-group-addon"></span>
                              <input type="text" class="form-control" name="lastNameAdmin" value="{{$administrator->lastName}}" placeholder="Apellidos *">
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon"></span>
                                  <input type="text" class="form-control" name="identification" placeholder="Identificación *" value="{{$administrator->identification}}">
                              </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon"></span>
                                  <input type="text" class="form-control" name="phone" placeholder="Teléfono Administrador *" value="{{$phones}}">
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"></span>
                                  <input type="text" class="form-control" name="address" value="{{$administrator->address}}" placeholder="Dirección *">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"></span>
                                  <input type="text" class="form-control" name="city" value="{{$administrator->city}}" placeholder="Ciudad *">
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="email" value="{{$administrator->email}}" placeholder="Correo Electrónico *">
                                </div>
                            </div>
                        </div>
                          <div class="col-lg-6 form-group">
                            <div class="input-group">
                              <span class="input-group-addon"></span>
                              <input type="text" class="form-control" name="username" placeholder="Usuario Administrador*" value="{{$administrator->username}}" autocomplete="off"  onkeypress="javascript: return ValidarNumero(event, this)">
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 form-group">
                          <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="password" class="form-control" name="passwordAdmin" placeholder="Contraseña *" autocomplete="off">
                          </div>
                        </div>
                          <div class="col-lg-6 form-group">
                            <div class="input-group">
                              <span class="input-group-addon"></span>
                              <input type="password" class="form-control" name="repasswordAdmin" placeholder="Conf. Contraseña *" autocomplete="off">
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="wizard-pane data" id="exampleGettingOne" role="tabpanel">
                  <div class="confirmation-panel">
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Nombres</label>
                          <span id="nameAdmin"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Apellidos</label>
                          <span id="lastNameAdmin"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Identificación</label>
                        <span id="identificationAdmin"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Usuario Administrador</label>
                          <span id="usernameAdmin"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Teléfono Administrador</label>
                        <span id="phoneVeterinary"></span>
                      </div>
                    </div>
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Dirección</label>
                        <span id="addressVeterinary"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Ciudad</label>
                        <span id="cityVeterinary"></span>
                      </div>
                    </div>
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Correo Electrónico</label>
                        <span id="emailVeterinary"></span>
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

$(document).ready(function(){

setInterval(function(){
  $("#identificationVeterinary").html($("[name='identification']").val());
  $("#nameAdmin").html($("[name='nameAdmin']").val());
  $("#lastNameAdmin").html($("[name='lastNameAdmin']").val());
  $("#usernameAdmin").html($("[name='username']").val());
  $("#addressVeterinary").html($("[name='address']").val());
  $("#cityVeterinary").html($("[name='city']").val());
  $("#phoneVeterinary").html($("[name='phone']").val());
  $("#emailVeterinary").html($("[name='email']").val());
  $("#identificationAdmin").html($("[name='identification']").val());
}, 1000);

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
          nameAdmin: {
              validators: {
                notEmpty: {
                  message: 'Ingresa el Nombre del Administrador'
                }
              }
          },lastNameAdmin: {
              validators: {
                notEmpty: {
                  message: 'Ingresa los Apellidos'
                }
              }
          },identification: {
              validators: {
                notEmpty: {
                  message: 'Ingresa el numero de identificación'
                }
              }
          },phone: {
              validators: {
                notEmpty: {
                  message: 'Ingresa el numero de teléfono'
                }
              }
          },address: {
              validators: {
                notEmpty: {
                  message: 'Ingresa la dirección'
                }
              }
          },email: {
              validators: {
                notEmpty: {
                  message: 'Ingresa el e-Mail'
                }
              }
          },city: {
              validators: {
                notEmpty: {
                  message: 'Ingresa la Ciudad'
                }
              }
          },passwordAdmin: {
            validators: {
                identical: {
                    field: 'repasswordAdmin',
                    message: 'Ingresa una contraseña'
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
