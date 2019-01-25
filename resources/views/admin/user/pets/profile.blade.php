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

<style>
@media (max-width: 480px){
  .panel-body .block-option {
    width: 50%;
    float: left !important;
  }
  a.btn.btn-primary.btn-add-option {
    width: 50px;
    height: 50px;
  }
  i.glyphicon.glyphicon-trash {
    font-size: 22px;
    position: relative;
    top: 3px;
  }
  .info-description .nav-tabs>li {
    width: 33%;
    float: left;
    font-size: 11px;
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
          <a href="/user/pets/edit/{{Crypt::encrypt($pet->id)}}" class="btn btn-icon btn-primary" style="padding:6px; background-color: #ff0066 !important; border-color: #ff0066 !important;">
            Editar Perfil
          </a>
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
          <li class="active" role="presentation"><a data-toggle="tab" href="#activities" aria-controls="activities"
            role="tab">Datos Mascota</a></li>
          <li role="presentation"><a data-toggle="tab" href="#profile" aria-controls="profile" role="tab">Datos Propietario</a></li>
        </ul>
        <div class="block-option" style="position: relative; bottom: 65px;">
          <a href="/user/pets/add" class="btn btn-icon btn-primary btn-add-option" style="padding:0px; background-color: #ffffff !important;">
            <img src="{{URL::asset('admin/assets/images/add-pet.png')}}" style="width:100%;">
          </a>
          <span class="title-btn">Agregar Mascota</span>
        </div>
        <div class="block-option" style="position: relative; bottom: 65px;">
          <a href="#" onclick="deletePet({{$pet->id}})" data-target="#deletePet" data-toggle="modal"  class="btn btn-icon btn-primary btn-add-option">
            <i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
          </a>
          <span class="title-btn">Eliminar Mascota</span>
        </div>
        <div class="tab-content">
          <div class="tab-pane active animation-slide-left" id="activities" role="tabpanel">
            <div class="row">
              <div class="row">
                <div class="col-sm-6">
                  <div class="media">
                    <div class="media-body">
                      <span>Codigo QR </span>
                      <br>
                      <h4 class="media-heading">@if($pet->haveCode == TRUE)
                        <?php
                          $c = $code->getCodeByPet($pet->id);
                          echo $c;
                         ?>
                      @else
                        @if($pet->petRequest == TRUE)
                          Codigo Solicitado
                        @else
                          Sin asignar
                        @endif

                      @endif</h4>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="media">
                    <div class="media-body">
                      <span>Nombre de la Mascota</span>
                      <br>
                      <h4 class="media-heading">{{$pet->name}}</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="media">
                    <div class="media-body">
                      <span>Especie</span>
                      <br>
                      @if($pet->petType == 1)
                      <h4 class="media-heading">Canina</h4>
                      @else
                      <h4 class="media-heading">Felina</h4>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="media">
                    <div class="media-body">
                      <span>Raza</span>
                      <br>
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
                      <span>Genero</span>
                      <br>
                      @if($pet->gender == '1')
                        <h4 class="media-heading">Macho</h4>
                      @else
                        <h4 class="media-heading">Hembra</h4>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="media">
                    <div class="media-body">
                      <span>Color</span>
                      <br>
                      <h4 class="media-heading">{{$characteristics->color}}</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="media">
                    <div class="media-body">
                      <span>Tamaño</span>
                      <br>
                      <h4 class="media-heading">{{$characteristics->medida}}</h4>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="media">
                    <div class="media-body">
                      <span>Edad</span>
                        <br>
                        <h4 class="media-heading">{{$pet->age}} meses</h4>
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
                <div class="media media-lg">
                  <div class="media-body">
                    <span>Nombres</span>
                    <br>
                    <h4 class="media-heading">{{$user->name}}</h4>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Apellidos</span>
                    <br>
                    <h4 class="media-heading">{{$user->lastName}}</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Direccion</span>
                    <br>
                    <h4 class="media-heading">{{$user->address}}</h4>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Telefono</span>
                    <br>
                    <h4 class="media-heading">{{$phones}}</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Ciudad</span>
                    <br>
                    <h4 class="media-heading">{{$user->city}}</h4>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Correo Electronico</span>
                    <br>
                    <h4 class="media-heading">{{$user->email}}</h4>
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>
          <div class="tab-pane animation-slide-left" id="messages" role="tabpanel">

            <div class="panel">
                    <header class="panel-heading">
                      <div class="panel-actions"></div>
                      <br>
                    </header>
                    <div class="panel-body">

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
@include('admin.user.pets.delete')
@include('admin.administrator.clinicHistory.details')
@include('admin.administrator.vaccines.details')
</div>

<div class="row">


  <!-- Panel -->
  <div class="panel info-description" id="panelData">
    <div class="panel-body nav-tabs-animate nav-tabs-horizontal">
      <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
        <li class="active" role="presentation">
          <a data-toggle="tab" href="#appointments" aria-controls="Appointments" role="tab">Citas Medicas</a>
        </li>
        <li role="presentation">
          <a data-toggle="tab" href="#clinicHistories" aria-controls="clinicHistories" role="tab">H.C</a>
        </li>
        <li role="presentation">
          <a data-toggle="tab" href="#Vaccines" aria-controls="Vaccines" role="tab">Vacunas</a>
        </li>

      </ul>
      <div class="tab-content">
        <div class="tab-pane active animation-slide-left" id="appointments" role="tabpanel">
            <div class="panel">
              <header class="panel-heading">
                <div class="panel-actions"></div>

              </header>
              <div class="panel-body nm">
                <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                  <thead>
                    <tr>
                      <th>Estado</th>
                      <th>Fecha</th>
                      <th>Veterinario</th>
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
                          <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$appointment->status}}</td>
                          <td>{{$appointment->dateTime}}</td>
                          <td>{{$properties->veterinary}}</td>
                          <td>{{$properties->cost}}</td>
                          <td></td>

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

                </div>

              </header>
              <div class="panel-body nm">

                <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Veterinaria</th>
                      <th>Medico</th>
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
                      <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$reference->date}}</td>
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
        <div class="tab-pane animation-slide-left" id="Vaccines" role="Vaccines">
            <div class="panel">

              <div class="panel-body nm">
                <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Laboratio</th>
                      <th>Lote</th>
                      <th>Tipo de Vacuna</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($vaccine as $vaccines)
                    <tr>
                      <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$vaccines->date}}</td>
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
                                <a href="#" role="menuitem" data-target="#detailVaccines" data-toggle="modal" onclick="getVaccines('{{Crypt::encrypt($vaccines->id)}}')">Detalles</a>
                              </li>
                              <li role="presentation">
                                <a href="vaccines/reporte/pdf/{{Crypt::encrypt($vaccines->id)}}" role="menuitem">Reporte</a>
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

function deletePet(Id) {
  $("#petId").val(Id);
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



  $("#btnHistoryClinic").click(function(){
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
