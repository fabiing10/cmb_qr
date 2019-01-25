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

<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/administrator">Inicio</a></li>
            <li><a href="/administrator/clients">Clientes</a></li>
            <li class="active">Nuevo Cliente</li>
          </ol>
          <h2 class="page-title">Clientes</h2>
        </div>
  </div>
</div>

<div class="row" data-plugin="matchHeight" data-by-row="true">
    <div class="col-xlg-12 col-md-12">
      <!-- Panel Wizard Form Container -->
          <div class="panel" id="petWizardFormContainer">
            <h4 class="panel-form-container">NUEVO CLIENTE</h4>
            <div class="panel-body">
              <!-- Steps -->
              <div class="pearls row">
                <div class="pearl current col-xs-4">
                  <div class="pearl-icon"><i class="icon wb-large-point" aria-hidden="true"></i></div>
                  <span class="pearl-title">Datos Cliente</span>
                </div>
                <div class="pearl col-xs-4">
                  <div class="pearl-icon"><i class="icon wb-large-point" aria-hidden="true"></i></div>
                  <span class="pearl-title">Mascota</span>
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
                                  <input type="text" class="form-control" name="name" placeholder="Nombre ">
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                  <input type="text" class="form-control" name="lastName" placeholder="Apellido">
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="address" placeholder="Direccion">
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="phone" placeholder="Telefono ">
                                </div>
                            </div>
                          </div>

                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="city" placeholder="Ciudad ">
                                </div>
                            </div>
                        </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="email" placeholder="Email">
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" placeholder="Usuario ">
                                </div>
                            </div>
                        </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
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
                          <input type="text" class="form-control" name="codePet" placeholder="Codigo QR ">
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="namePet" placeholder="Mascota">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                          <select class="form-control" id="petType" name="petType" required="" onchange="selectRace()">
                                <option value="">Escoge una Especie</option>
                                <option value="1">Canino</option>
                                <option value="2">Felino</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                          <select class="form-control" id="raza" name="raza" required="">
                                <option value="">Raza</option>
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                          <select class="form-control" id="gender" name="gender" required="">
                                  <option value="">Escoge un genero</option>
                                  <option value="1">Macho</option>
                                  <option value="2">Hembra</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="color" placeholder="Color">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                          <select class="form-control" id="size" name="size" required="">
                                <option value="grande">Grande</option>
                                <option value="mediano">Mediano</option>
                                <option value="pequeño">Pequeño</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group text-center">
                          <div class="input-group input-group-file text-center w-100" style="width: 100%;">
                              <a href="#" onclick="imageUpload()" class="btn btn-icon btn-primary btn-action-profile btn-w80-p30" style="padding:6px; background-color: #ff0066 !important; border-color: #ff0066 !important; margin-left: 4px;">Foto Mascota</a>
                              <br/>
                              No subir imagen mayor a 2MB
                              <input type="file" name="image" id="image" multiple="" style="display:none;">
                              </span>
                            </span>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="wizard-pane data" id="exampleGettingOne" role="tabpanel">
                  <div class="confirmation-panel">
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span id="nameClient"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span id="lastNameClient"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span id="addressClient"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span id="phoneClient"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span id="cityClient"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span id="emailClient"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span id="usernameClient"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span id="passwordClient"></span>
                        </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span id="codePet"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span id="namePet"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span id="typePet"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span id="razaPet"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span id="genderPet"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span id="colorPet"></span>
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

  $("[name='name']").change(function(){
        $("#nameClient").html($("[name='name']").val());
  });

  $("[name='lastName']").change(function(){
        $("#lastNameClient").html($("[name='lastName']").val());
  });

  $("[name='address']").change(function(){
        $("#addressClient").html($("[name='address']").val());
  });

  $("[name='phone']").change(function(){
        $("#phoneClient").html($("[name='phone']").val());
  });

  $("[name='city']").change(function(){
        $("#cityClient").html($("[name='city']").val());
  });

  $("[name='email']").change(function(){
        $("#emailClient").html($("[name='email']").val());
  });

  $("[name='username']").change(function(){
        $("#usernameClient").html($("[name='username']").val());
  });
  $("[name='password']").change(function(){
        $("#passwordClient").html($("[name='password']").val());
  });

  $("[name='codePet']").change(function(){
        $("#codePet").html($("[name='codePet']").val());
  });
  $("[name='namePet']").change(function(){
        $("#namePet").html($("[name='namePet']").val());
  });

  $("[name='petType']").change(function(){
        $("#typePet").html($("[name='petType']").val());
  });

  $("[name='raza']").change(function(){
        $("#razaPet").html($("[name='raza']").val());
  });

  $("[name='gender']").change(function(){
        $("#genderPet").html($("[name='gender']").val());
  });

  $("[name='color']").change(function(){
        $("#colorPet").html($("[name='color']").val());
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
                  message: 'Digite el nombre de su cliente'
                }
              }
          },
          lastName: {
              validators: {
                notEmpty: {
                  message: 'Digite el apellido de su cliente'
                }
              }
          },address: {
              validators: {
                notEmpty: {
                  message: 'Digite la dirección de su cliente'
                }
              }
          },phone: {
              validators: {
                notEmpty: {
                  message: 'Digite el Telefono de su cliente'
                }
              }
          },city: {
              validators: {
                notEmpty: {
                  message: 'Digite la ciudad de su cliente'
                }
              }
          },email: {
              validators: {
                notEmpty: {
                  message: 'Digite el email de su cliente'
                },remote: {
                    message: 'El email ya se encuentra registrado',
                    url: '/validate/form/email',
                    type: 'POST',
                    delay: 2000
                }
              }
          },username: {
              validators: {
                notEmpty: {
                  message: 'Digite un nombre de usuario'
                },remote: {
                    message: 'El username ya se encuentra registrado',
                    url: '/validate/form/username',
                    type: 'POST',
                    delay: 2000
                }
              }
          },password: {
              validators: {
                notEmpty: {
                  message: 'Digite una clave para la cuenta'
                }
              }
          },codePet: {
              validators: {
                remote: {
                    message: 'El codigo no existe',
                    url: '/validate/form/code',
                    type: 'POST',
                    delay: 2000
                }
              }
          },namePet: {
              validators: {
                notEmpty: {
                  message: 'Digite el nombre de su mascota'
                }
              }
          },petType: {
              validators: {
                notEmpty: {
                  message: 'Digite la especie de su mascota'
                }
              }
          },raza: {
              validators: {
                notEmpty: {
                  message: 'Digite la raza de su mascota'
                }
              }
          },
          gender: {
              validators: {
                notEmpty: {
                  message: 'Seleccione el genero'
                }
              }
          },
          color: {
              validators: {
                notEmpty: {
                  message: 'Digite el color de su mascota'
                }
              }
          },image: {
              validators: {
                file: {
                  extension: 'jpeg,jpg,png',
                  type: 'image/jpeg,image/png',
                  maxSize: 2097152,   // 2048 * 1024
                  message: 'El archivo seleccionado es invalido'
                }
              }
          },

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
