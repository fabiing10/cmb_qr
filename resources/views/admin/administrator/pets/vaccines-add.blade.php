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
<style media="screen">
@media (max-width: 800px) {
  .pearl {
    width: 50% !important;
    margin-top: 25px;
  }
}
</style>
@stop

@section('content')


          <div class="panel" id="HClinicWizardFormContainer"style="">
            <div class="panel-heading">
              <h3 class="panel-title" style="text-align:center;">Historia Clinica - {{$pet->name}}</h3>
            </div>
            <div class="panel-body">
              <!-- Steps -->
              <div class="pearls row links-hclinic" style="width: 325px;margin: 0 auto !important;">
                              <div class="pearl current col-xs-6" aria-expanded="true">
                                <div class="pearl-icon"><i class="icon wb-check-circle" aria-hidden="true"></i></div>
                                <span class="pearl-title">Informacion Basica</span>
                              </div>
                              <div class="pearl col-xs-6 disabled" aria-expanded="false">
                                <div class="pearl-icon"><i class="icon wb-check-circle" aria-hidden="true"></i></div>
                                <span class="pearl-title">Resumen</span>
                              </div>
                            </div>
              <!-- End Steps -->
              <!-- Wizard Content -->
              <form class="wizard-content" id="HClinicFormContainer" name="formDataHC" method="post" action="" enctype="multipart/form-data">
                <div class="wizard-pane active" id="paso1" role="tabpanel">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                        <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                 <select class="form-control" id="typeVaccine" name="typeVaccine">
                                  <option value="">Seleccione tipo de Vacuna</option>
                                  <option value="Vacuna">Vacuna</option>
                                  <option value="Refuerzo">Refuerzo</option>
                                 </select>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                              <div class="form-group">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" value="Parvovirus" name="vaccines[]">Parvovirus</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" value="Distemper" name="vaccines[]">Distemper</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="Leptospirosis" name="vaccines[]">Leptospirosis</label>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                              <div class="form-group">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" value="Hepatitis" name="vaccines[]">Hepatitis</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" value="Corona" name="vaccines[]">Corona</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="Rabia" name="vaccines[]">Rabia</label>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                              <div class="form-group">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" value="KC" name="vaccines[]">KC</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" value="Parainfluenza" name="vaccines[]">Parainfluenza</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="1" name="vaccines">
                                  <input type="text" class="form-control" id="" name="otherVaccines"></label>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Lote" id="lote" name="lote">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Laboratorio" id="laboratory" name="laboratory">
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                              <div class="media">
                                <center>
                                <div class="media-body">
                                  <a href="#" onclick="loadSticker()">
                                  <img src="{{URL::asset('admin/assets/images/3.png')}}" style="width:2%;">
                                  <span class="title-btn" style="display: -webkit-inline-box; color: #ff0066; vertical-align: bottom; font-weight: bold;">Cargar Stiker</span>
                                  </a>
                                  <input type="file" name="sticker" id="sticker" style="display:none;"/>
                                </div>
                              </center>
                              </div>
                            </div>
                        </div>
                      </div>

                <div class="wizard-pane" id="paso2" role="tabpanel">
                  <input type="hidden" name="action" value="ClinicHistory" />
                  <div class="confirmation-panel">
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Lote</label>
                          <span class="data_value" id="lote_value"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Tipo</label>
                          <span class="data_value" id="tipo_value"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Laboratorio</label>
                        <span class="data_value" id="laboratory_value"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Nombre Vacunas</label>
                          <ul class="data_value" id="vaccines"></ul>
                        </div>
                        <input type="submit" name="sendForm" id="sendForm" value="Enviar" style="display:none;"/>
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



<script type="text/javascript">

$( document ).ready(function() {

  $(".pull-right").click(function(){

      $("#date_value").html($("[name='date']").val());
      $("#tipo_value").html($("[name='typeVaccine']").val());
      $("#lote_value").html($("[name='lote']").val());
      $("#age_value").html($("[name='agePet']").val());
      $("#laboratory_value").html($("[name='laboratory']").val());

      var cboxes = document.getElementsByName('vaccines[]');
      var len = cboxes.length;
      var li ="";
      console.log(cboxes)
      console.log(cboxes)
      console.log("lenght checkbox")
      console.log(len)
      for (var i=0; i<len; i++) {
        if(cboxes[i].checked == true){
          li += "<li>"+cboxes[i].value+"</li>";
        }else{

        }

      }
      $("#vaccines").html(li);


});


});
function loadSticker(){
  $("#sticker").trigger("click");
}

  var defaults = $.components.getDefaults("wizard");
  var options = $.extend(true, {}, defaults, {
    onInit: function() {
      $('#HClinicFormContainer').formValidation({
        framework: 'bootstrap',
        fields: {date: {
              validators: {
                notEmpty: {
                  message: 'Inserte la Fecha'
                }
              }
          },agePet: {
              validators: {
                notEmpty: {
                  message: 'Digite la edad de la mascota'
                }
              }
          },lote: {
              validators: {
                notEmpty: {
                  message: 'Digite el lote'
                }
              }
          },laboratory: {
              validators: {
                notEmpty: {
                  message: 'Digite el laboratorio'
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
      $("#sendForm").trigger("click");

    },buttonsAppendTo: '.panel-body'
  });

  $("#HClinicWizardFormContainer").wizard(options);


</script>
@stop
