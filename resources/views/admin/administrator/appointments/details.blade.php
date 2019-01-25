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
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/clockpicker/clockpicker.css')}}">

@stop

@section('content')
<?php
//Decode Values
$veterinaryResult = json_decode($appointment->properties);
if($veterinaryResult == ""){
  $veterinaryName = "Sin asignar";
  $costName = "Sin asignar";
}else{
  $veterinaryName = $veterinaryResult->veterinary;
  $costName = $veterinaryResult->cost;
}
?>
<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/administrator">Inicio</a></li>
            <li><a href="/administrator/appointments">Citas Medicas</a></li>
            <li class="active">Detalles</li>
          </ol>
        </div>
  </div>
</div>
        <div class="panel" id="HClinicWizardFormContainer"style="">
            <div class="panel-body">
              <center><h2 class="page-title" style="padding-bottom: 20px;">Detalles</h2></center>

              <form class="wizard-content" id="HClinicFormContainer" name="formDataHC" method="post" action="">

                <div class="wizard-pane active" id="paso1" role="tabpanel">
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                  <input type="hidden" name="pet" id="pet" />
                    <!-- Begin row Description -->
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <span class="icon wb-book"></span>
                          </span>
                        <textarea class="form-control" name="description" rows="3" placeholder="{{$appointment->description}}" readonly></textarea>
                        </div>
                       </div>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                        <label>Fecha</label>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <span class="icon wb-user"></span>
                          </span>
                          <input type="text" class="form-control" name="veterinary" placeholder="Nombre Medico" required="" value="{{$appointment->dateTime}}" readonly>
                        </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Hora</label>
                          <div class="input-group">
                            <span class="input-group-addon">
                              <span class="icon wb-user"></span>
                            </span>
                            <input type="text" class="form-control" name="veterinary" placeholder="Nombre Medico" required="" value="{{$appointment->dateTime}}" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                        <label>Veterinario</label>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <span class="icon wb-user"></span>
                          </span>
                          <input type="text" class="form-control" name="veterinary" placeholder="Nombre Medico" required="" value="{{$veterinaryName}}" readonly>
                        </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                        <label>Costo</label>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <span class="icon wb-payment"></span>
                          </span>
                          <input type="text" class="form-control" name="cost" placeholder="Costo consulta" required="" value="{{$costName}}" readonly>
                        </div>
                        </div>
                      </div>

                    </div>
                </div>
              </form>
              <!-- Wizard Content -->
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

<script src="{{URL::asset('admin/global/vendor/select2/select2.full.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/switchery/switchery.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/asspinner/jquery-asSpinner.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/formvalidation/formValidation.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/formvalidation/framework/bootstrap.js')}}"></script>

<script src="{{URL::asset('admin/global/vendor/jquery-wizard/jquery-wizard.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/summernote/summernote.min.js')}}"></script>

<script src="{{URL::asset('admin/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/clockpicker/bootstrap-clockpicker.min.js')}}"></script>

@stop

@section('script')
<script src="{{URL::asset('admin/global/js/components/select2.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/switchery.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/asspinner.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/datatables.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/jquery-wizard.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/forms/wizard.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/summernote.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v2.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/clockpicker.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/bootstrap-datepicker.js')}}"></script>


<script type="text/javascript">
/*
function NotBeforeToday(date)
{
    var now = new Date();//this gets the current date and time
    if (date.getFullYear() == now.getFullYear() && date.getMonth() == now.getMonth() && date.getDate() > now.getDate())
        return [true];
    if (date.getFullYear() >= now.getFullYear() && date.getMonth() > now.getMonth())
       return [true];
     if (date.getFullYear() > now.getFullYear())
       return [true];
    return [false];
}
*/
/*
function getClinicHistory(Id){
  $.get( "clinicHistory/"+Id).done(function(data) {
      //document.getElementById("razon").innerHTML =data.description;
      reference = $.parseJSON(data.reference);
      //Set Reference
      $("#veterinary").html(reference.veterinary);
      $("#state").html(reference.state);
      $("#userVeterinary").html(reference.userVeterinary);
      $("#date").html(reference.date);
      $("#observations").html(reference.observations);
      //Set Characteristics
      characteristics = $.parseJSON(data.characteristics);
      $("#diet").html(characteristics.diet);
      $("#reproductiveStatus").html(characteristics.reproductiveStatus);
      $("#vaccines").html(characteristics.vaccines);
      $("#cleaning").html(characteristics.cleaning);
      $("#products").html(characteristics.products);
      $("#dateProduct").html(characteristics.dateProduct);
      $("#origin").html(characteristics.origin);
      $("#weight").html(characteristics.weight);
      $("#temperature").html(characteristics.temperature);
      $("#hearRate").html(characteristics.hearRate);
      $("#breathingFrequency").html(characteristics.breathingFrequency);
      $("#capilaryRefillTime").html(characteristics.capilaryRefillTime);
      $("#mucous").html(characteristics.mucous);
      $("#skinTugor").html(characteristics.skinTugor);
      $("#pulse").html(characteristics.pulse);
      $("#other").html(characteristics.other);
      $("#anamenesis").html(characteristics.anamenesis);
      $("#diseases").html(characteristics.diseases);
      $("#attitude").html(characteristics.attitude);
      $("#bodyCondition").html(characteristics.bodyCondition);
      $("#hydration").html(characteristics.hydration);
      $("#locomotion").html(characteristics.locomotion);
      $("#respiratorySystem").html(characteristics.respiratorySystem);
      $("#digestiveSystem").html(characteristics.digestiveSystem);
      $("#genitourinarySystem").html(characteristics.genitourinarySystem);
      $("#eyes").html(characteristics.eyes);
      $("#ears").html(characteristics.ears);
      $("#lymphNodes").html(characteristics.lymphNodes);
      $("#skin").html(characteristics.skin);
      $("#skeletalMuscle").html(characteristics.skeletalMuscle);
      $("#nervousSystem").html(characteristics.nervousSystem);
      $("#cardiovascularSystem").html(characteristics.cardiovascularSystem);
  });
}
(function() {
  //$("#dateAppointment").datepicker({ dateFormat: 'yy-mm-dd',  beforeShowDay: NotBeforeToday});
  $("#btnmedicalAppointments").click(function(){
      $("#HClinicWizardFormContainer").fadeIn();
  });
  var defaults = $.components.getDefaults("wizard");
  var options = $.extend(true, {}, defaults, {
    onInit: function() {
      $('#HClinicFormContainer').formValidation({
        framework: 'bootstrap',
        fields: {
          username: {
            validators: {
              notEmpty: {
                message: 'The username is required'
              }
            }
          }
        }
      });
    },
    validator: function() {
      var fv = $('#HClinicFormContainer').data('formValidation');
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
    $("#sendForm").trigger( "click" );
    },
    buttonsAppendTo: '.panel-body'
  });
  $("#HClinicWizardFormContainer").wizard(options);

})();

*/
</script>
@stop
