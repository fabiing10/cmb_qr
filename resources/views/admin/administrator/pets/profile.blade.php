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



<style>
@media (max-width: 800px) {
  .none-mobile{
    display: none !important;
  }
  .btn{
    width: 49% !important;
  }
  .btn-administrator{
    width: 100% !important;
  }
  header.panel-heading {
    height: 50px !important;
  }
  .input-group-addon, .input-group-btn {
    white-space: normal;
  }
  img.user-profile-img {
    width: 20%;
    border-radius: 100%;
  }
}
@media (min-width: 800px){
  .none-desktop{
    display: none !important;
  }
}
@media (max-width: 480px) {
  #panelData .nav-tabs>li {
      width: 33%;
      font-size: 11px;
      text-align: center;
  }
  #panelData .nav-tabs-line>li>a {
    padding: 10px 0px;
    text-align: center;
  }
  .tab-content.description-tab  a.btn-dark-identipet{
    margin-top: 0px !important;
    margin-bottom: : 20px !important;
  }
  .tab-content.description-tab {
    padding-top: 0px;
  }
  .tab-content.description-tab .panel-actions {
    width: 80%;
  }
}

</style>
@stop

@section('content')


<?php
//Decode Values
$image = json_decode($pet->imageProfile);
$characteristics = json_decode($pet->characteristics);
$phonesResult = json_decode($user->phones);
if($phonesResult == ""){
  $phones = "Sin asignar";
}else{
  $phones = $phonesResult->phone;
}
?>
<?php

foreach($clinicHistories as $ch){
  $referenceresult = json_decode($ch->reference);
  if($referenceresult == ""){
    $status = "Sin asignar";
  }else{
    $status = $referenceresult->state;
    $userVeterinary = $referenceresult->userVeterinary;
    $date = $referenceresult->date;
  }
/*
  $characteristicresult = json_encode($ch->characteristics);
  if($characteristicresult == ""){
    $diet = "Sin asignar";
    $reproductiveStatus = "Sin asignar";
  }else{
    $diet = $characteristicresult->diet;
    $reproductiveStatus = $characteristicresult->reproductiveStatus;
  }
  */
}

?>


<div class="row">
  <div class="col-md-3">
    <!-- Page Widget -->
    <div class="widget widget-shadow text-center">
      <div class="widget-header" style="padding: 20px 0px;">
        <div class="widget-header-content">
          <a class="avatar avatar-full" href="javascript:void(0)">

            @if($image->img_profile != 'none')
            <img src="{{URL::asset('uploads/images/')}}/{{$image->img_profile}}" alt="...">
            @else
            <img src="{{URL::asset('admin/assets/images/pet-icon.png')}}" alt="...">
            @endif
          </a>
          <h4 class="profile-user">{{$pet->name}}</h4>
        </div>
      </div>
    </div>
    <!-- End Page Widget -->
  </div>
  <div class="col-md-9">
    <!-- Panel -->
    <div class="panel">
      <div class="panel-body nav-tabs-animate nav-tabs-horizontal">
        <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
          <li class="active" role="presentation"><a data-toggle="tab" href="#pet" aria-controls="activities" role="tab" id="petsTab">Datos Mascota</a></li>
          <li role="presentation"><a data-toggle="tab" href="#profile" aria-controls="profile" role="tab" id="profileUser">Datos Propietario</a></li>
          <div class="option-btn-panel edit-profile none-mobile">
            <a href="/administrator/pets/profile/edit/{{Crypt::encrypt($pet->id)}}" class="btn btn-icon btn-primary btn-add-option wb-add-pet" data-toggle="modal"></a>
            <span>Editar Mascota</span>
          </div>
          <div class="block-option">
            <a href="/administrator/clients/edit/{{Crypt::encrypt($user->id)}}" class="btn btn-dark-identipet none-desktop" style="margin-top:23px;">Editar Usuario</a>
            <a href="/administrator/pets/profile/edit/{{Crypt::encrypt($pet->id)}}" class="btn btn-dark-identipet none-desktop" style="margin-top:23px;">Editar Mascota</a>
          </div>
          <div class="option-btn-panel add-pet none-mobile" style="display:none;">
              <a href="/administrator/clients/edit/{{Crypt::encrypt($user->id)}}" class="btn btn-icon btn-primary btn-add-option wb-edit-profile" data-toggle="modal"></a>
              <span>Editar Perfil</span>
          </div>
        </ul>
          <div class="tab-content tab-content-responsive">
            <div class="tab-pane active animation-slide-left" id="pet" role="tabpanel">
              <div class="row">
                <div class="row">
                  <div class="col-sm-6">
                      <div class="media">
                        <div class="media-body">
                          <span>Codigo QR</span><br>
                          <h4 class="media-heading">
                            @if($pet->haveCode == TRUE)
                              <?php
                                $c = $code->getCodeByPet($pet->id);
                                echo $c;
                               ?>
                            @else
                              Sin asignar
                            @endif
                          </h4>
                        </div>
                      </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="media">
                          <div class="media-body">
                            <span>Nombre</span><br>
                            <h4 class="media-heading">{{$pet->name}}</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="media">
                            <div class="media-body">
                              <span>Especie</span><br>
                              <h4 class="media-heading">
                                @if($pet->petType == 1)
                                   Canino(a)
                               @elseif($pet->petType == 2)
                                   Felino(a)
                                @else
                                   Otros
                                @endif
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="media">
                            <div class="media-body">
                              <span>Raza</span><br>
                              <h4 class="media-heading">
                                <?php
                                  $raza = $characteristic->getRace($pet->id);
                                  echo $raza;
                                ?>
                              </h4>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="media">
                            <div class="media-body">
                              <span>Genero</span><br>
                              <h4 class="media-heading">
                                @if($pet->gender == 1)
                                  Macho
                                @else
                                  Hembra
                                @endif
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="media">
                            <div class="media-body">
                              <span>Color</span><br>
                              <h4 class="media-heading">{{$characteristics->color}}</h4>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="media">
                            <div class="media-body">
                              <span>Tamaño</span><br>
                              <h4 class="media-heading">{{$characteristics->medida}}</h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="media">
                            <div class="media-body">
                              <span>Edad</span><br>
                              <h4 class="media-heading">{{$pet->age}} meses</h4>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="media">
                            <div class="media-body">
                              <span>Estado</span><br>
                              <h4 class="media-heading">
                              @if($pet->petStatus == 1)
                                Activo(a)
                              @else
                                Inactivo(a)
                              @endif</h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="media">
                            <div class="media-body">
                              <span>Fecha Registro</span><br>
                              <h4 class="media-heading">{{$pet->created_at}}</h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            <div class="tab-pane animation-slide-left" id="profile" role="tabpanel">
              <div class="row">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="media">
                      <div class="media-body">
                        <span>Nombres</span><br>
                        <h4 class="media-heading">{{$user->name}}</h4>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="media">
                      <div class="media-body">
                        <span>Apellidos</span><br>
                        <h4 class="media-heading">{{$user->lastName}}</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="media">
                      <div class="media-body">
                        <span>Identificación</span><br>
                        <h4 class="media-heading">{{$user->identification}}</h4>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="media">
                      <div class="media-body">
                        <span>Direccion</span><br>
                        <h4 class="media-heading">{{$user->address}}</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="media">
                      <div class="media-body">
                        <span>Telefono</span><br>
                        <h4 class="media-heading">{{$phones}}</h4>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="media">
                      <div class="media-body">
                        <span>Ciudad</span><br>
                        <h4 class="media-heading">{{$user->city}}</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="media">
                      <div class="media-body">
                        <span>Correo Electronico</span><br>
                        <h4 class="media-heading"><a href="mailto:{{$user->email}}">{{$user->email}}</a></h4>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="media">
                      <div class="media-body">
                        <span>Fecha Registro</span><br>
                        <h4 class="media-heading">{{$user->created_at}}</h4>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>

      </div>
    </div>
    <!-- End Panel -->
  </div>
</div>

<div class="row">
@include('admin.administrator.clinicHistory.details')
@include('admin.administrator.vaccines.details')
</div>
<div class="row">
@include('admin.administrator.clinicHistory.create')
@include('admin.administrator.pets.cancel')
</div>
<div class="row">

  <!-- Panel -->
  <div class="panel" id="panelData">
    <div class="panel-body nav-tabs-animate nav-tabs-horizontal">
      <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
        <li class="active" role="presentation">
          <a data-toggle="tab" href="#appointments" aria-controls="Appointments" role="tab">Citas Medicas</a>
        </li>
        <li role="presentation">
          <a data-toggle="tab" href="#clinicHistories" aria-controls="clinicHistories" role="tab">H.C</a>
        </li>
        <li role="presentation">
          <a data-toggle="tab" href="#vacunas" aria-controls="vacunas" role="tab">Vacunas</a>
        </li>
      </ul>
      <div class="tab-content description-tab">
        <div class="tab-pane active animation-slide-left" id="appointments" role="tabpanel">
            <div class="panel">
              <header class="panel-heading">
                <div class="panel-actions">
                  <button onclick="window.location.href='MedicalAppointment/add/{{Crypt::encrypt($pet->id)}}'" type="button" class="btn btn-floating btn-sm none-mobile" style=" background-color: transparent; border-color: #ff0066;">
                    <img src="{{URL::asset('admin/assets/images/Cm-icon.png')}}" style="width:100%; margin-right:10px;">
                  </button>
                  <div class="block-option">
                    <a href="MedicalAppointment/add/{{Crypt::encrypt($pet->id)}}" class="btn btn-dark-identipet none-desktop" style="margin-top:23px; width:100% !important;">Agregar Cita medica</a>
                  </div>
                </div>
              </header>
              <div class="panel-body nm">
                <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                  <thead>
                    <tr>
                      <th>Estado</th>
                      <th>Fecha/Hora</th>
                      <th>Médico</th>
                      <th>Costo</th>
                      <th>Opciones</th>

                    </tr>
                  </thead>
                  <tbody>
                    @if(empty($appointments))
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>

                    </tr>
                    @else
                      @foreach($appointments as $appointment)
                      <?php  $properties = json_decode($appointment->properties); ?>
                        <tr>
                          <td>{{$appointment->status}}</td>
                          <td>{{$appointment->dateTime}}</td>
                          <td>{{$properties->veterinary}}</td>
                          <td>{{$properties->cost}}</td>
                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn btn-primary dropdown-toggle" id="listOptionCH" data-toggle="dropdown" aria-expanded="false">
                              <i class="icon wb-grid-9" aria-hidden="true"></i>
                              <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="listOptionCH" role="menu">
                                <li role="presentation">
                                  <a href="/administrator/appointments/details/{{Crypt::encrypt($appointment->id)}}" role="menuitem">Detalles</a>
                                </li>
                                <li role="presentation">
                                  <a href="/administrator/appointments/reschedule/{{Crypt::encrypt($appointment->id)}}" role="menuitem">Reprogramar</a>
                                </li>
                                @if ($appointment->status === 'Activa')
                                <li role="presentation">
                                  <a data-target="#cancelAppoiment" data-toggle="modal" onclick="cancelAppoiment({{$appointment->id}})" role="menuitem">Cancelar</a>
                                </li>
                                @else
                                <li role="presentation">
                                  <a href="/administrator/appointments/reactive/{{Crypt::encrypt($appointment->id)}}" role="menuitem">Activar</a>
                                </li>
                                @endif
                              </ul>

                            </div>
                          </td>

                        </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
        <div class="tab-pane animation-slide-left" id="clinicHistories" role="tabpanel">
            <div class="panel">
              <header class="panel-heading">
                <div class="panel-actions">
                  <button onclick="window.location.href='clinicHistory/add/{{Crypt::encrypt($pet->id)}}'" type="button" class="btn btn-floating btn-sm none-mobile" style=" background-color: transparent; border-color: #ff0066;">
                    <img src="{{URL::asset('admin/assets/images/Hc-icon.png')}}" style="width:100%; margin-right:10px;">
                  </button>
                  <div class="block-option">
                    <a href="clinicHistory/add/{{Crypt::encrypt($pet->id)}}" class="btn btn-dark-identipet none-desktop" style="margin-top:23px; width:100% !important;">Agregar Historia clinica</a>
                  </div>
                </div>

              </header>
              <div class="panel-body nm">

                <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Veterinaria</th>
                      <th>Médico</th>
                      <th>Estado</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($clinicHistories as $clinicHistory)
                    <?php
                      $reference = json_decode($clinicHistory->reference);
                    ?>
                    <tr>
                      <td>{{$reference->date}}</td>
                      <td>{{$reference->veterinary}}</td>
                      <td>{{$reference->userVeterinary}}</td>
                      <td>{{$reference->state}}</td>
                      <td>
                          <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" id="listOptionCH" data-toggle="dropdown" aria-expanded="false">
                            <i class="icon wb-grid-9" aria-hidden="true"></i>
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="listOptionCH" role="menu">
                              <li role="presentation">
                                <a href="clinicHistory/reporte/pdf/{{Crypt::encrypt($clinicHistory->id)}}" role="menuitem">Reporte</a>
                              </li>
                              <li role="presentation">
                                <a href="#" role="menuitem" data-target="#detailHistoryClinic" data-toggle="modal" onclick="getClinicHistory({{$clinicHistory->id}})">Detalles</a>
                              </li>

                            </ul>

                          </div>

                      </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div>
        <div class="tab-pane animation-slide-left" id="vacunas" role="tabpanel">
            <div class="panel">
              <header class="panel-heading">
                <div class="panel-actions">
                  <button onclick="window.location.href='vaccines/add/{{Crypt::encrypt($pet->id)}}'" type="button" class="btn btn-floating btn-sm none-mobile" style=" background-color: transparent; border-color: #ff0066;">
                    <img src="{{URL::asset('admin/assets/images/Hc-icon.png')}}" style="width:100%; margin-right:10px;">
                  </button>
                  <div class="block-option">
                    <a href="vaccines/add/{{Crypt::encrypt($pet->id)}}" class="btn btn-dark-identipet none-desktop" style="margin-top:23px; width:100% !important;">Agregar Vacuna</a>
                  </div>
                </div>
              </header>
              <div class="panel-body nm">
                <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Laboratorio</th>
                      <th>Lote</th>
                      <th>Tipo</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($vaccine as $vaccines)

                    <tr>
                      <td>{{$vaccines->date}}</td>
                      <td>{{$vaccines->laboratory}}</td>
                      <td>{{$vaccines->lote}}</td>
                      <td>{{$vaccines->typeVaccine}}</td>
                      <td>
                          <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" id="listOptionCH" data-toggle="dropdown" aria-expanded="false">
                            <i class="icon wb-grid-9" aria-hidden="true"></i>
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="listOptionCH" role="menu">
                              <li role="presentation">
                                <a href="vaccines/reporte/pdf/{{Crypt::encrypt($vaccines->id)}}" role="menuitem">Reporte</a>
                              </li>
                              <li role="presentation">
                                <a href="#" role="menuitem" data-target="#detailVaccines" data-toggle="modal" onclick="getVaccines('{{Crypt::encrypt($vaccines->id)}}')">Detalles</a>
                              </li>

                            </ul>

                          </div>

                      </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Panel -->
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

function cancelAppoiment(Id) {
  $("#idAppointment").val(Id);
}

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


      $("#examen_laboratorio").attr('src', '/uploads/images/'+characteristics.examen_laboratorio);
      $("#img_diagnostic").attr('src', '/uploads/images/'+characteristics.imagen_diagnostica);

  });
}
function getVaccines(Id){

  $.get( "vaccines/"+Id).done(function(data) {
      //document.getElementById("razon").innerHTML =data.description;
      var vaccines = $.parseJSON(data.vaccines);
      //Set Reference
      var vacc = "";
      for(var i=0;i< vaccines.length;i++){
        vacc += "<li>"+vaccines[i]+"</li>";

      }
        $("#vaccines_value").html(vacc);

      //Set Characteristics
      $("#fecha").html(data.date);
      $("#laboratory").html(data.laboratory);
      $("#lote").html(data.lote);
      $("#typeVaccine").html(data.typeVaccine);
      $("#agePet").html(data.agePet);

  });
}
(function() {

  $("#btn_img_diagnostica").click(function(){
    $("#imagen_diagnostica").trigger("click");
  });

  $("#btn_examen_lab").click(function(){
    $("#examen_laboratorio").trigger("click");
  });


  $("#profileUser").click(function(){
    $(".edit-profile").fadeOut();
    $(".add-pet").fadeIn();
  });
  $("#petsTab").click(function(){
      $(".edit-profile").fadeIn();
      $(".add-pet").fadeOut();
  });

})();
</script>
@stop
