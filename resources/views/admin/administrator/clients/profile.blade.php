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
  .wb-edit-profile {
   display: block;
  }
  .edit-profile-responsive{
    display: none;
  }
  @media (max-width: 480px){
    .wb-edit-profile {
     display: none !important;
    }
    .edit-profile-responsive{
      display: block;
    }
    a.edit-profile-responsive {
        color: white !important;
        margin: 15px auto !important;
        width: 80%;
        white-space: inherit;
        padding: 7px;
    }
    .option-btn-panel {
        height: 50px !important;
        width: 100%;
    }
    .option-btn-panel span{
      color: black;
    }
    .nav-tabs {
        border-bottom: 0px solid #e4eaec !important;
    }
    .boton-responsive {
        top: auto !important;
        position: relative !important;
        float: left;
        margin-top: 10px;
    }
  }
</style>

@stop

@section('content')

<?php
//Decode Values

$image = json_decode($user->imageProfile);

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
            <li><a href="/administrator/">Inicio</a></li>
            <li><a href="/administrator/clients">Usuarios</a></li>
            <li class="active">{{$user->username}}</li>
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
          <a class="profile-img" href="javascript:void(0)">
            @if($image->img_profile != 'none')
            <img src="{{URL::asset('uploads/images/')}}/{{$image->img_profile}}" class="user-profile-img">
            @else
            <i class="glyphicon glyphicon-user profile-picture" aria-hidden="true"></i>
            @endif
          </a>
          <h4 class="profile-user">{{$user->name}} <br> {{$user->lastName}}</h4>
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
          <li class="active" role="presentation"><a data-toggle="tab" href="#profile" aria-controls="profile"role="tab" id="profileTab">Perfil</a></li>
          <li role="presentation"><a data-toggle="tab" href="#pets" aria-controls="pets" role="tab" id="petsTab">Mascotas</a></li>


          <div class="option-btn-panel edit-profile  boton-responsive">
              <a href="/administrator/clients/edit/{{Crypt::encrypt($user->id)}}" class="btn-primary edit-profile-responsive" data-toggle="modal">Editar Perfil</a>
              <a href="/administrator/clients/edit/{{Crypt::encrypt($user->id)}}" class="btn btn-icon btn-primary btn-add-option wb-edit-profile" data-toggle="modal"></a>
              <span>Editar Perfil</span>
          </div>
          <div class="option-btn-panel add-pet boton-responsive" style="display:none;">
              <a href="/administrator/pets/add/{{Crypt::encrypt($user->id)}}" class="btn btn-icon btn-primary btn-add-option wb-add-pet" data-toggle="modal"></a>
              <span>Agregar Mascota</span>
          </div>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active animation-slide-left" id="profile" role="profile">
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
                        <h4 class="media-heading">{{$user->registerDate}}</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="tab-pane animation-slide-left" id="pets" role="pets">
            <div class="row">
                <div class="col-sm-12">
                  <ul class="list-group">
                      @foreach($pets as $pet)
                      <?php
                      $image = json_decode($pet->imageProfile);
                      $characteristics = json_decode($pet->characteristics);

                       ?>
                      <li class="list-group-item line-border">
                        <div class="media" style="text-align:center;">
                          <div class="avatar avatar-online">
                            @if($image->img_profile != 'none')
                            <img src="{{URL::asset('uploads/images/')}}/{{$image->img_profile}}" alt="...">
                            @else
                            <img src="{{URL::asset('admin/assets/images/pet-icon.png')}}" alt="...">
                            @endif
                            <i class="avatar avatar-busy"></i>
                          </div>
                        </div>
                           <div class="media">

                             <div class="media-body">

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
                                     <div class="media-body">
                                       <span>Nombre</span><br>
                                       <h4 class="media-heading">{{$pet->name}}</h4>
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
                                         <span>Fecha de Registro</span><br>
                                         <h4 class="media-heading">{{$pet->created_at}}</h4>
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                                 <div class="row">
                                   <div class="col-sm-6">
                                     <ul class="list-group" style="margin-top: 15px;">
                                       <li class="list-group-item">
                                         <div class="media">
                                           <div class="media-body">
                                             <a href="/administrator/pets/profile/MedicalAppointment/add/{{Crypt::encrypt($pet->id)}}">
                                             <img src="{{URL::asset('admin/assets/images/1.png')}}" style="width:15%;">
                                             <span class="title-btn" style="display: -webkit-inline-box; color: #ff0066; vertical-align: bottom; font-weight: bold;">Programar Cita</span>
                                           </a>
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
                                         <a href="/administrator/pets/profile/{{Crypt::encrypt($pet->id)}}">
                                         <img src="{{URL::asset('admin/assets/images/2.png')}}" style="width:15%;">
                                         <span class="title-btn" style="display: -webkit-inline-box; color: #ff0066; vertical-align: bottom; font-weight: bold;">Mas Detalles</span>
                                       </a>
                                       </div>
                                     </div>
                                   </li>
                                 </div>
                               </div>
                               </div>
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

(function() {

  $("#petsTab").click(function(){
    $(".edit-profile").fadeOut();
    $(".add-pet").fadeIn();
  });
  $("#profileTab").click(function(){
      $(".edit-profile").fadeIn();
      $(".add-pet").fadeOut();
  });


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


</script>
@stop
