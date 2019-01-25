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
<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/control">Inicio</a></li>
            <li class="active"><a href="/control/pets">Mascotas</a></li>
          </ol>

        </div>
  </div>
</div>

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
          <li class="active" role="presentation"><a data-toggle="tab" href="#pet" aria-controls="pet" role="tab">Datos Mascota</a></li>
          <li role="presentation"><a data-toggle="tab" href="#profile" aria-controls="profile" role="tab">Datos Propietario</a></li>
          <li role="presentation"><a data-toggle="tab" href="#veterinary" aria-controls="veterinary" role="tab">Datos Veterinaria</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active animation-slide-left" id="pet" role="tabpanel">
            <div class="row">
              <div class="col-sm-6">
                <ul class="list-group" style="margin-top: 15px;">
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Codigo QR</h4><br>
                        <span>
                          @if($pet->haveCode == TRUE)
                            <?php
                              $c = $code->getCodeByPet($pet->id);
                              echo $c;
                             ?>
                          @else
                            Sin asignar
                          @endif
                        </span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Especie</h4><br>
                        <span>
                          @if($pet->petType == 1)
                             Canino(a)
                         @elseif($pet->petType == 2)
                             Felino(a)
                          @else
                             Otros
                          @endif
                        </span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Genero</h4><br>
                        <span>
                          @if($pet->gender == 1)
                            Macho
                          @else
                            Hembra
                          @endif
                        </span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Tamaño</h4><br>
                        <span>{{$characteristics->medida}}</span>
                      </div>
                    </div>
                  </li>

                </ul>
              </div>
              <div class="col-sm-6">
                <ul class="list-group" style="margin-top: 15px;">
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Nombre Mascota</h4><br>
                        <span>{{$pet->name}}</span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Raza</h4><br>
                        <span>
                          <?php
                          $raza = $characteristic->getRace($pet->id);
                          echo $raza;
                          ?>
                        </span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Color</h4><br>
                        <span>{{$characteristics->color}}</span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Edad</h4><br>
                        <span>{{$pet->age}} meses</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="tab-pane animation-slide-left" id="profile" role="tabpanel">
            <div class="row">
              <div class="col-sm-6">
                <ul class="list-group" style="margin-top: 15px;">
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Nombres</h4><br>
                        <span>{{$user->name}}</span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Direccion</h4><br>
                        <span>{{$user->address}}</span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Ciudad</h4><br>
                        <span>{{$user->city}}</span>
                      </div>
                    </div>
                  </li>

                </ul>
              </div>
              <div class="col-sm-6">
                <ul class="list-group" style="margin-top: 15px;">
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Apellidos</h4><br>
                        <span>{{$user->lastName}}</span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Telefono</h4><br>
                        <span>{{$phones}}</span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Correo Electronico</h4><br>
                        <span>{{$user->email}}</span>
                      </div>
                    </div>
                  </li>

                </ul>
              </div>

            </div>
          </div>

          <div class="tab-pane animation-slide-left" id="veterinary" role="tabpanel">
            <div class="row">
              <div class="col-sm-6">

                <ul class="list-group" style="margin-top: 15px;">
                  @foreach($veterinary as $vet)
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Nombre Veterinaria</h4><br>
                        <span>{{$vet->name}}</span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Direccion</h4><br>
                        <span>{{$vet->address}}</span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Correo Electronico</h4><br>
                        <span>{{$vet->email}}</span>
                      </div>
                    </div>
                  </li>

                </ul>
              </div>
              <div class="col-sm-6">
                <ul class="list-group" style="margin-top: 15px;">
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Sede</h4><br>
                        <span>
                          @if($vet->principal == TRUE)
                            Principal
                          @else
                            {{$vet->name}}
                          @endif
                        </span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Ciudad</h4><br>
                        <span>{{$vet->city}}</span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Pagina Web</h4><br>
                        <span>{{$vet->url}}</span>
                      </div>
                    </div>
                  </li>
                    @endforeach
                </ul>
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
                          <td>{{$appointment->status}}</td>
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
                                <a href="#" role="menuitem" data-target="#detailHistoryClinic" data-toggle="modal" onclick="getClinicHistory('{{Crypt::encrypt($clinicHistory->id)}}')">Detalles</a>
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

</script>
@stop
