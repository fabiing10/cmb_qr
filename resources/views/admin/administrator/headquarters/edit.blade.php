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
            <li><a href="/administrator/headquarters">Sedes</a></li>
            <li class="active">Editar Sede</li>
          </ol>

        </div>
  </div>

</div>

<div class="row" data-plugin="matchHeight" data-by-row="true">
    <div class="col-xlg-12 col-md-12">
      <!-- Panel Wizard Form Container -->
          <div class="panel" id="petWizardFormContainer">
            <h4 class="panel-form-container">EDITAR SEDE</h4>
            <div class="panel-body">
              <!-- Steps -->
              <div class="pearls row">
                <div class="pearl current col-xs-4">
                  <div class="pearl-icon"><i class="icon wb-large-point" aria-hidden="true"></i></div>
                  <span class="pearl-title">Datos Sede</span>
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
                                  <span class="input-group-addon"><i class="icon wb-globe" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="name_headquarter" value="{{$headquarter->nameHeadquarter}}" placeholder="Nombre Sede *">
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon fa-building" aria-hidden="true"></i></span>
                                  <input type="text" class="form-control" name="address" value="{{$headquarter->address}}" placeholder="Dirección Sede *">
                                </div>
                            </div>
                          </div>

                      </div>
                      <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-mobile" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="phone" value="{{$headquarter->phone}}" placeholder="Telefono Sede *">
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon fa-institution" aria-hidden="true"></i></span>
                                  <input type="text" class="form-control" name="city" value="{{$headquarter->city}}" placeholder="Ciudad Sede *">
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon fa-at" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="email" value="{{$headquarter->email}}" placeholder="Correo Electronico *">
                                </div>
                            </div>
                        </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon fa-link" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="url" value="{{$headquarter->url}}" placeholder="http://">
                                </div>
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
                        <label class="bold">Nombre Sede</label>
                        <span id="nameHeadquarter"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Dirección Sede</label>
                          <span id="addressVeterinary"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Teléfono Sede</label>
                          <span id="phoneVeterinary"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Ciudad Sede</label>
                          <span id="cityVeterinary"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Correo Electrónico</label>
                          <span id="emailVeterinary"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Pagina Web</label>
                          <span id="urlVeterinary"></span>
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
  $("#nameVeterinary").html($("[name='name']").val());
  $("#addressVeterinary").html($("[name='address']").val());
  $("#phoneVeterinary").html($("[name='phone']").val());
  $("#cityVeterinary").html($("[name='city']").val());
  $("#nameHeadquarter").html($("[name='name_headquarter']").val());
  $("#emailVeterinary").html($("[name='email']").val());
  $("#urlVeterinary").html($("[name='url']").val());

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
          name_headquarter: {
              validators: {
                notEmpty: {
                  message: 'Ingresa el Nombre de la Sede'
                }
              }
          },address: {
              validators: {
                notEmpty: {
                  message: 'Ingresa la dirección de la Sede'
                }
              }
          },phone: {
              validators: {
                notEmpty: {
                  message: 'Ingresa el teléfono de la Sede'
                }
              }
          },city: {
              validators: {
                notEmpty: {
                  message: 'Ingresa la ciudad de la Sede'
                }
              }
          },email: {
              validators: {
                notEmpty: {
                  message: 'Ingresa el e-Mail'
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

});


</script>
@stop
