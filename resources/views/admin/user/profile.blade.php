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
<style media="screen">
@media only screen and (max-width: 768px) {
  .none-mobile{
    display: none;
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
}
@media (min-width: 768px){
  .none-desktop{
    display: none;
  }
}
</style>
@stop

@section('content')

<?php
$image = json_decode($user->imageProfile);
//Decode Values
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
            <li><a href="/user">Inicio</a></li>
            <li class="active">Perfil</li>
          </ol>
        </div>
  </div>
      <div class="col-xlg-6 col-md-6">
          <div class="panel links-panel">
              <div class="panel-body">
                <div class="block-option none-mobile">
                  <a href="profile/edit" class="btn btn-icon btn-primary btn-add-option" style="padding:0px; background-color:#ffffff !important;">
                      <img src="{{URL::asset('admin/assets/images/edit-user.png')}}" style="width:100%;">
                  </a>
                  <span class="title-btn">Editar Perfil</span>
                </div>
                <div class="block-option none-mobile">
                  <a href="#" onclick="deleteUser({{$user->id}})" data-target="#deleteUser" data-toggle="modal" class="btn btn-icon btn-primary btn-add-option">
                    <i class="glyphicon glyphicon-trash" aria-hidden="true" style="font-size:20px;"></i>
                  </a>
                  <span class="title-btn">Eliminar Usuario</span>
                </div>
                <div class="block-option">
                  <a href="profile/edit" class="btn btn-dark-identipet none-desktop" style="margin-top:23px;">Editar Perfil</a>
                  <a href="#" class="btn btn-dark-identipet none-desktop" onclick="deleteUser({{$user->id}})" data-target="#deleteUser" data-toggle="modal" style="margin-top:23px;">Eliminar Usuario</a>
                </div>
              </div>
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
          <li class="active" role="presentation"><a data-toggle="tab" href="#profile" aria-controls="profile"
            role="tab">Perfil</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active animation-slide-left" id="profile" role="profile">
            <div class="row">
              <div class="row">
                <div class="col-sm-6">
                  <div class="media">
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
                      <span>Identificación</span>
                      <br>
                      <h4 class="media-heading">{{$user->identification}}</h4>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="media">
                    <div class="media-body">
                      <span>Usuario</span>
                      <br>
                      <h4 class="media-heading">{{$user->username}}</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="media">
                    <div class="media-body">
                      <span>Correo Electrónico</span>
                      <br>
                      <h4 class="media-heading"><a href="mailto:{{$user->email}}">{{$user->email}}</a></h4>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="media">
                    <div class="media-body">
                      <span>Dirección</span>
                      <br>
                      <h4 class="media-heading">{{$user->address}}</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="media">
                    <div class="media-body">
                      <span>Teléfono</span>
                      <br>
                      <h4 class="media-heading">{{$phones}}</h4>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="media">
                    <div class="media-body">
                      <span>Ciudad</span>
                      <br>
                      <h4 class="media-heading">{{$user->city}}</h4>
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
@include('admin.user.delete')
</div>
<!-- Modal -->
<div class="modal fade" id="userModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"  role="dialog" tabindex="-1">
    <div class="modal-dialog">
    {!! Form::open(array('url' => 'user', 'method' => 'POST', 'class' => 'modal-content', 'enctype' => 'multipart/form-data')) !!}
    <input type="hidden" name="userId" id="userId" value="{{$user->id}}" />
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <span class="input-group-addon" style="background-color: white; border: white;">
            <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">Actualizar Perfil</h4>
            <br>
            @if($image->img_profile != 'none')
            <img src="{{URL::asset('uploads/images/')}}/{{$image->img_profile}}" class="user-profile-img" style="width: 180px;">
            @else
            <i class="glyphicon glyphicon-user profile-picture" aria-hidden="true"></i>
            @endif
            <input type="file" class="form-control" name="image" id="image">
        </span>
    </div>
    <div class="modal-body">
      <div class="row">
          <div class="col-lg-12 form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name="identification" placeholder="Identificacion" value="{{$user->identification}}">
            </div>
          </div>
      </div>
        <div class="row">
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="name" placeholder="Nombre"  value="{{$user->name}}">
              </div>
            </div>
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="lastName" placeholder="Apellido"  value="{{$user->lastName}}">
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon fa-envelope" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="email" placeholder="Email"  value="{{$user->email}}">
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-mobile" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="phone" placeholder="Telefono " value="{{$phones}}">
              </div>
            </div>
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-map" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="address" placeholder="Direccion" value="{{$user->address}}">
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Username" disabled="" value="{{$user->username}}">
              </div>
            </div>
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12 pull-right">
            <input class="btn btn-primary submit-btn" type="submit" value="Actualizar Perfil"/>
          </div>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
</div>
<!-- End Modal -->


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
function deleteUser(Id) {
  $("#userId").val(Id);
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
</script>
@stop
