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

@stop

@section('content')


<div class="panel" id="HClinicWizardFormContainer"style="">
            <div class="panel-heading">
              <h3 class="panel-title" style="text-align:center;">Historia Clinica - {{$pet->name}}</h3>
            </div>
            <div class="panel-body">
              <!-- Steps -->
              <div class="pearls row links-hclinic">

                <div class="pearl current col-xs-2">
                  <div class="pearl-icon"><i class="icon wb-check-circle" aria-hidden="true"></i></div>
                  <span class="pearl-title">Informacion Basica</span>
                </div>
                <div class="pearl col-xs-2">
                  <div class="pearl-icon"><i class="icon wb-check-circle" aria-hidden="true"></i></div>
                  <span class="pearl-title">Examen Basico</span>
                </div>
                <div class="pearl col-xs-2">
                  <div class="pearl-icon"><i class="icon wb-check-circle" aria-hidden="true"></i></div>
                  <span class="pearl-title">Anamnesis</span>
                </div>
                <div class="pearl col-xs-2">
                  <div class="pearl-icon"><i class="icon wb-check-circle" aria-hidden="true"></i></div>
                  <span class="pearl-title">Examen por Sistema</span>
                </div>
                <div class="pearl col-xs-2">
                  <div class="pearl-icon"><i class="icon wb-check-circle" aria-hidden="true"></i></div>
                  <span class="pearl-title">Observaciones Grales</span>
                </div>
                <div class="pearl col-xs-2">
                  <div class="pearl-icon"><i class="icon wb-check-circle" aria-hidden="true"></i></div>
                  <span class="pearl-title">Confirmacion</span>
                </div>
                <!--
                <div class="pearl col-xs-2">
                  <div class="pearl-icon"><i class="icon wb-add-file" aria-hidden="true"></i></div>
                  <span class="pearl-title">Informacion Final</span>
                </div>
              -->
              </div>
              <!-- End Steps -->
              <!-- Wizard Content -->
              <form class="wizard-content" id="HClinicFormContainer" name="formDataHC" method="post" action="" enctype="multipart/form-data">

                <div class="wizard-pane active" id="paso1" role="tabpanel">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                        <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                               <label class="control-label">Dieta</label>
                                 <input type="text" class="form-control" name="diet" id="diet">
                              </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                             <label class="control-label">Procedencia</label>
                               <select class="form-control" id="origin" name="origin">
                                 <option value=" ">Seleccione una procedencia</option>
                                 <option value="urbana">Urbana</option>
                                 <option value="rural">Rural</option>
                                 <option value="callejero">Callejero</option>
                               </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                 <label class="control-label">Vacunas
                                 </label>
                                   <select class="form-control" id="vaccines" name="vaccines">
                                    <option value=" ">Seleccione una opción</option>
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                                   </select>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                 <label class="control-label">Desparacitaciones</label>
                                   <select class="form-control" id="cleaning" name="cleaning">
                                     <option value=" ">Seleccione una opción</option>
                                     <option value="si">Si</option>
                                     <option value="no">No</option>
                                   </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                           <div class="col-lg-6">
                             <div class="form-group">
                               <label class="control-label">Productos</label>
                               <textarea class="form-control" id="products" name="products"></textarea>
                             </div>
                           </div>
                       </div>
                     </div>

                <div class="wizard-pane" id="paso2" role="tabpanel">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="control-label">Actitud</label>
                        <input type="text" tabindex="1" class="form-control" id="attitude" name="attitude">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Peso</label>
                        <input type="text" tabindex="3" class="form-control" id="weight" name="weight">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Temperatura</label>
                        <input type="text" tabindex="5" class="form-control" id="temperature" name="temperature">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Frecuencia cardiaca</label>
                        <input type="text" tabindex="7" class="form-control" id="hearRate" name="hearRate">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Mucosas</label>
                        <input type="text" tabindex="9" class="form-control" id="mucous" name="mucous">
                      </div>
                    </div>
                    <div class="col-lg-6">
                     <div class="form-group">
                        <label class="control-label">Condición corporal</label>
                        <input type="text" tabindex="2" class="form-control" id="bodyCondition" name="bodyCondition">
                      </div>
                     <div class="form-group">
                         <label class="control-label">Hidratación</label>
                         <input type="text" tabindex="4" class="form-control" id="hydration" name="hydration">
                      </div>
                     <div class="form-group">
                       <label class="control-label">Pulso</label>
                       <input type="text" tabindex="6" class="form-control" id="pulse" name="pulse">
                     </div>
                     <div class="form-group">
                       <label class="control-label">Frecuencia respiratoria</label>
                       <input type="text" tabindex="8" class="form-control" id="breathingFrequency" name="breathingFrequency">
                     </div>
                     <div class="form-group">
                       <label class="control-label">Tiempo de llenado capilar</label>
                       <input type="text"tabindex="10" class="form-control" id="capilaryRefillTime" name="capilaryRefillTime">
                     </div>
                   </div>
                 </div>
                </div>

                <div class="wizard-pane" id="paso3" role="tabpanel">
                  <div class="row">
                     <div class="col-lg-12">
                     <div class="form-group">
                       <label class="control-label">Anamnesis</label>
                       <textarea class="form-control" id="anamenesis" name="anamenesis"> </textarea>
                     </div>
                     </div>
                     <div class="col-lg-12">
                     <div class="form-group">
                       <label class="control-label">Enfermedades o procedimientos anteriores</label>
                       <textarea class="form-control" id="diseases" name="diseases"></textarea>
                     </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="media">
                         <input type="file" name="imagen_diagnostica" id="imagen_diagnostica" style="display:none;" />
                         <div class="media-body">
                           <a href="#" id="btn_img_diagnostica">
                           <img src="{{URL::asset('admin/assets/images/3.png')}}" style="width:6%;">
                           <span class="title-btn" style="display: -webkit-inline-box; color: #ff0066; vertical-align: bottom; font-weight: bold;">Cargar Imagen diagnosticas</span>
                         </a>
                         </div>
                       </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="media">
                         <input type="file" name="examen_laboratorio" id="examen_laboratorio" style="display:none;" />
                         <div class="media-body">
                           <a href="#" id="btn_examen_lab">
                           <img src="{{URL::asset('admin/assets/images/4.png')}}" style="width:6%;">
                           <span class="title-btn" style="display: -webkit-inline-box; color: #ff0066; vertical-align: bottom; font-weight: bold;">Cargar Examen Laboratorio</span>
                         </a>
                         </div>
                       </div>
                     </div>
                  </div>
                </div>

                <div class="wizard-pane" id="paso4" role="tabpanel">
                  <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                       <label class="control-label">Locomocion</label>
                       <input type="text" tabindex="11" class="form-control" id="locomotion" name="locomotion">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Sistema respiratorio</label>
                        <input type="text" tabindex="13" class="form-control" id="respiratorySystem" name="respiratorySystem">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Sistema genitourinario</label>
                        <input type="text" tabindex="15" class="form-control" id="genitourinarySystem" name="genitourinarySystem">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Sistema cardiovascular</label>
                        <input type="text" tabindex="17" class="form-control" id="cardiovascularSystem" name="cardiovascularSystem">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ojos</label>
                        <input type="text" tabindex="19" class="form-control" id="eyes" name="eyes">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nodulos linfaticos</label>
                        <input type="text" tabindex="21" class="form-control" id="lymphNodes" name="lymphNodes">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="control-label">Musculo esqueletico</label>
                      <input type="text" tabindex="12" class="form-control" id="skeletalMuscle" name="skeletalMuscle">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Sistema digestivo</label>
                        <input type="text" tabindex="14" class="form-control" id="digestiveSystem" name="digestiveSystem">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Estado reproductivo</label>
                      <input type="text" tabindex="16" class="form-control" id="inputPhone" name="reproductiveStatus">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Sistema nervioso</label>
                      <input type="text" tabindex="18" class="form-control" id="nervousSystem" name="nervousSystem">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Oidos</label>
                      <input type="text" tabindex="20" class="form-control" id="ears" name="ears">
                    </div>
                    <div class="form-group">
                       <label class="control-label">Piel y anexos</label>
                       <input type="text" tabindex="22" class="form-control" id="skin" name="skin">
                     </div>
                    </div>
                  </div>
                </div>

                <div class="wizard-pane" id="paso5" role="tabpanel">
                  <div class="row">
                     <div class="col-lg-12">
                       <div class="form-group">
                           <label class="control-label" for="inputNames">Observaciones Generales</label>
                           <textarea class="input-block-level" id="summernote" data-plugin="summernote" name="observations" rows="18"></textarea>
                       </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                           <label class="control-label" for="inputNames">Nombres y Apellidos (Veterinario)</label>
                           <input type="text" class="form-control" value="{{$user->name}}" placeholder="Ej:Juan Martinez" id="inputNames" name="nameVeterinary">
                       </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                           <label class="control-label" for="inputNames">Estado Mascota</label>
                           <input type="text" class="form-control" placeholder="" id="inputNames" name="state">
                       </div>
                     </div>
                  </div>
                    <input type="submit" name="sendForm" id="sendForm" value="Enviar" style="display:none;"/>
                </div>

                <div class="wizard-pane" id="confirmacion" role="tabpanel">
                  <input type="hidden" name="action" value="ClinicHistory" />
                  <div class="confirmation-panel">

                  <div class="row">
                    <div class="col-lg-12">
                    <label class="bold">Informacion Basica</label><br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Dieta</label>
                        <span id="Confirm1"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Procedencia</label>
                          <span id="Confirm2"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 form-group">
                      <div class="input-group">
                        <label class="bold">Productos</label>
                        <span id="Confirm5"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                    <label class="bold">Examen Basica</label><br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Actitud</label>
                        <span id="Confirm7"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Condicion Corporal</label>
                          <span id="Confirm8"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Peso</label>
                        <span id="Confirm9"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Hidratacion</label>
                          <span id="Confirm10"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Temperatura</label>
                        <span id="Confirm11"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Pulso</label>
                          <span id="Confirm12"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Frecuencia Cardiaca</label>
                        <span id="Confirm13"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Frecuencia Respiratoria</label>
                          <span id="Confirm14"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Mucosas</label>
                        <span id="Confirm15"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Tiempo de llenado Capilar</label>
                          <span id="Confirm16"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                    <label class="bold">Anamnesis</label><br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Anamenesis</label>
                        <span id="Confirm17"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Enfermedades o Procedimientos</label>
                          <span id="Confirm18"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                    <label class="bold">Examen por sistema</label><br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Locomocion</label>
                        <span id="Confirm19"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Musculo Esqueletico</label>
                          <span id="Confirm20"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Sistema Respiratorio</label>
                        <span id="Confirm21"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Sistema Digestivo</label>
                          <span id="Confirm22"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Sistema Genitourinario</label>
                        <span id="Confirm23"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Estado reproductivo</label>
                          <span id="Confirm24"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Sistema Cardiovascular</label>
                        <span id="Confirm25"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Sistema Nervioso</label>
                          <span id="Confirm26"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Ojos</label>
                        <span id="Confirm27"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Oidos</label>
                          <span id="Confirm28"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Nodulos Linfaticos</label>
                        <span id="Confirm29"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Piel & Anexos</label>
                          <span id="Confirm30"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                    <label class="bold">Observaciones Generales</label><br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Medico Veterinario</label>
                        <span id="Confirm31"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Estado</label>
                          <span id="Confirm32"></span>
                        </div>
                      </div>
                  </div>

                </div>
              </div>
              <input type="submit" name="sendForm" id="sendForm" value="Enviar" style="display:none;"/>
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

$("[name='diet']").change(function() {
  //$("#Confirm1").html("");
  $("#Confirm1").html($("[name='diet']").val());
});
$("[name='origin']").change(function() {
  //$("#Confirm1").html("");
  $("#Confirm2").html($("[name='origin']").val());
});
$("[name='products']").change(function() {
  $("#Confirm5").html($("[name='products']").val());
});
$("[name='attitude']").change(function() {
  $("#Confirm7").html($("[name='attitude']").val());
});
$("[name='bodyCondition']").change(function() {
  $("#Confirm8").html($("[name='bodyCondition']").val());
});
$("[name='weight']").change(function() {
  $("#Confirm9").html($("[name='weight']").val());
});
$("[name='hydration']").change(function() {
  $("#Confirm10").html($("[name='hydration']").val());
});
$("[name='temperature']").change(function() {
  $("#Confirm11").html($("[name='temperature']").val());
});
$("[name='pulse']").change(function() {
  $("#Confirm12").html($("[name='pulse']").val());
});
$("[name='hearRate']").change(function() {
  $("#Confirm13").html($("[name='hearRate']").val());
});
$("[name='breathingFrequency']").change(function() {
  $("#Confirm14").html($("[name='breathingFrequency']").val());
});
$("[name='mucous']").change(function() {
  $("#Confirm15").html($("[name='mucous']").val());
});
$("[name='capilaryRefillTime']").change(function() {
  $("#Confirm16").html($("[name='capilaryRefillTime']").val());
});
$("[name='anamenesis']").change(function() {
  $("#Confirm17").html($("[name='anamenesis']").val());
});
$("[name='diseases']").change(function() {
  $("#Confirm18").html($("[name='diseases']").val());
});
$("[name='locomotion']").change(function() {
  $("#Confirm19").html($("[name='locomotion']").val());
});
$("[name='skeletalMuscle']").change(function() {
  $("#Confirm20").html($("[name='skeletalMuscle']").val());
});
$("[name='respiratorySystem']").change(function() {
  $("#Confirm21").html($("[name='respiratorySystem']").val());
});
$("[name='digestiveSystem']").change(function() {
  $("#Confirm22").html($("[name='digestiveSystem']").val());
});
$("[name='genitourinarySystem']").change(function() {
  $("#Confirm23").html($("[name='genitourinarySystem']").val());
});
$("[name='reproductiveStatus']").change(function() {
  $("#Confirm24").html($("[name='reproductiveStatus']").val());
});
$("[name='cardiovascularSystem']").change(function() {
  $("#Confirm25").html($("[name='cardiovascularSystem']").val());
});
$("[name='nervousSystem']").change(function() {
  $("#Confirm26").html($("[name='nervousSystem']").val());
});
$("[name='eyes']").change(function() {
  $("#Confirm27").html($("[name='eyes']").val());
});
$("[name='ears']").change(function() {
  $("#Confirm28").html($("[name='ears']").val());
});
$("[name='lymphNodes']").change(function() {
  $("#Confirm29").html($("[name='lymphNodes']").val());
});
$("[name='skin']").change(function() {
  $("#Confirm30").html($("[name='skin']").val());
});

  $("#Confirm31").html($("[name='nameVeterinary']").val());

$("[name='state']").change(function() {
  $("#Confirm32").html($("[name='state']").val());
});



$.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
       }
});
});


  var defaults = $.components.getDefaults("wizard");
  var options = $.extend(true, {}, defaults, {
    onInit: function() {
      $('#HClinicFormContainer').formValidation({
        framework: 'bootstrap',
        fields: {
          diet: {
              validators: {
                notEmpty: {
                  message: 'Digite la Dieta de la mascota'
                }
              }
          },
          reproductiveStatus: {
              validators: {
                notEmpty: {
                  message: 'Digite el estado reproductivo de la mascota'
                }
              }
          },products: {
              validators: {
                notEmpty: {
                  message: 'Digite los productos formulados'
                }
              }
          },origin: {
              validators: {
                notEmpty: {
                  message: 'Seleccione la Procedencia de la Mascota'
                }
              }
          },vaccines: {
              validators: {
                notEmpty: {
                  message: 'Seleccione una opción'
                }
              }
          },cleaning: {
              validators: {
                notEmpty: {
                  message: 'Seleccione una opción'
                }
              }
          },weight: {
              validators: {
                notEmpty: {
                  message: 'Digite el peso de la Mascota'
                }
              }
          },temperature: {
              validators: {
                notEmpty: {
                  message: 'Digite la temperature de la mascota'
                }
              }
          },hearRate: {
              validators: {
                notEmpty: {
                  message: 'Digite la Frecuencia cardiaca de la mascota'
                }
              }
          },breathingFrequency: {
              validators: {
                notEmpty: {
                  message: 'Digite la Frecuencia respiratoria de la mascota'
                }
              }
          },capilaryRefillTime: {
              validators: {
                notEmpty: {
                  message: 'Digite el Tiempo de llenado capilar de la mascota'
                }
              }
          },mucous: {
              validators: {
                notEmpty: {
                  message: 'Digite las Mucosas de la mascota'
                }
              }
          },pulse: {
              validators: {
                notEmpty: {
                  message: 'Digite el Pulso de la mascota'
                }
              }
          },anamenesis: {
              validators: {
                notEmpty: {
                  message: 'Digite el anamenesis de la mascota'
                }
              }
          },diseases: {
              validators: {
                notEmpty: {
                  message: 'Digite las Enfermedades o procedimientos anteriores de la mascota'
                }
              }
          },attitude: {
              validators: {
                notEmpty: {
                  message: 'Digite la Actitud de la mascota'
                }
              }
          },bodyCondition: {
              validators: {
                notEmpty: {
                  message: 'Digite la Condición corporal de la mascota'
                }
              }
          },hydration: {
              validators: {
                notEmpty: {
                  message: 'Digite la Hidratación de la mascota'
                }
              }
          },locomotion: {
              validators: {
                notEmpty: {
                  message: 'Digite la Locomocion de la mascota'
                }
              }
          },respiratorySystem: {
              validators: {
                notEmpty: {
                  message: 'Digite el estado de Sistema respiratorio de la mascota'
                }
              }
          },digestiveSystem: {
              validators: {
                notEmpty: {
                  message: 'Digite el estado de Sistema Dijestivo de la mascota'
                }
              }
          },genitourinarySystem: {
              validators: {
                notEmpty: {
                  message: 'Digite el estado de Sistema genitourinario de la mascota'
                }
              }
          },eyes: {
              validators: {
                notEmpty: {
                  message: 'Digite el estado de los Ojos de la mascota'
                }
              }
          },ears: {
              validators: {
                notEmpty: {
                  message: 'Digite el estado de los Oidos de la mascota'
                }
              }
          },observations: {
              validators: {
                notEmpty: {
                  message: 'Digite las Observaciones generales de la mascota'
                }
              }
          },state: {
              validators: {
                notEmpty: {
                  message: 'Digite las Observaciones generales de la mascota'
                }
              }
          },lymphNodes: {
              validators: {
                notEmpty: {
                  message: 'Digite el estado de los Nodulos linfaticos de la mascota'
                }
              }
          },skin: {
              validators: {
                notEmpty: {
                  message: 'Digite el estado de la Piel y anexos de la mascota'
                }
              }
          },skeletalMuscle: {
              validators: {
                notEmpty: {
                  message: 'Digite el estado del Musculo esqueletico de la mascota'
                }
              }
          },nervousSystem: {
              validators: {
                notEmpty: {
                  message: 'Digite el estado del Sistema nervioso de la mascota'
                }
              }
          },cardiovascularSystem: {
              validators: {
                notEmpty: {
                  message: 'Digite el estado del Sistema cardiovascular de la mascota'
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

  (function() {

    $("#btn_img_diagnostica").click(function(){
      $("#imagen_diagnostica").trigger("click");
    });

    $("#btn_examen_lab").click(function(){
      $("#examen_laboratorio").trigger("click");
    });

  })();
</script>
@stop
