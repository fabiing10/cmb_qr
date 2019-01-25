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
<style media="screen">
@media only screen and (max-width: 768px) {
  .pearl.col-xs-4 {
    width: 50% !important;
  }
}
</style>
@stop

@section('content')

<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/administrator">Inicio</a></li>
            <li><a href="/administrator/headquarters">Sedes</a></li>
            <li class="active">Nuevo Administrador</li>
          </ol>

        </div>
  </div>

</div>

<div class="row" data-plugin="matchHeight" data-by-row="true">
    <div class="col-xlg-12 col-md-12">
      <!-- Panel Wizard Form Container -->
          <div class="panel" id="petWizardFormContainer">
            <h4 class="panel-form-container">NUEVO ADMINISTRADOR</h4>
            <div class="panel-body">
              <!-- Steps -->
              <div class="pearls row">
                <div class="pearl current col-xs-4">
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
                  <div class="row">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input type="text" class="form-control" name="nameAdmin" placeholder="Nombre ">
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input type="text" class="form-control" name="lastNameAdmin" placeholder="Apellido">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input type="text" class="form-control" name="email" placeholder="Email ">
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input type="text" class="form-control" name="address" placeholder="Direccion">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input type="text" class="form-control" name="username" placeholder="Usuario" autocomplete="off" onkeypress="javascript: return ValidarNumero(event, this)">
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <select class="form-control" id="headquarter" name="headquarter" required="">
                                <option value="">Seleccione una Sede</option>
                                @foreach($headquarters as $h)
                                <option value="{{$h->id}}">{{$h->city}} - {{$h->nameHeadquarter}}</option>
                                @endforeach
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input type="password" class="form-control" name="passwordAdmin" placeholder="Contraseña" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input type="password" class="form-control" name="repasswordAdmin" placeholder="Contraseña" autocomplete="off">
                        </div>
                      </div>
                    </div>
                </div>

                <div class="wizard-pane data" id="exampleGettingOne" role="tabpanel">
                  <div class="confirmation-panel">

                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Nombre</label>
                          <span id="nameAdmin"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Apellido</label>
                          <span id="lastNameAdmin"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Email</label>
                          <span id="email1"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Direccion</label>
                          <span id="address1"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Username</label>
                          <span id="usernameAdmin"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Sede</label>
                          <span id="headquarterconfirm"></span>
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



  $("[name='identification']").change(function(){
        $("#identificationVeterinary").html($("[name='identification']").val());
  });


  $("[name='email']").change(function(){
        $("#email1").html($("[name='email']").val());
  });

  $("[name='address']").change(function(){
        $("#address1").html($("[name='address']").val());
  });

  $("[name='headquarter']").change(function(){
        //$("#headquarterconfirm").html($("[name='headquarter']").val());

        $("#headquarterconfirm").html($("[name='headquarter'] option:selected").text());

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
                  message: 'Digite el nombre del administrador'
                }
              }
          },lastNameAdmin: {
              validators: {
                notEmpty: {
                  message: 'Digite el apellido del administrador'
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
          },passwordAdmin: {
            validators: {
                identical: {
                    field: 'repasswordAdmin',
                    message: 'La contraseña no coincide'
                }
            }
        },repasswordAdmin: {
            validators: {
                identical: {
                    field: 'passwordAdmin',
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
