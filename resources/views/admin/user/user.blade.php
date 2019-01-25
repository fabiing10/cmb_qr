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
          <a href="#" class="btn btn-icon btn-primary" data-target="#userModal" data-toggle="modal">
          Actualizar Perfil
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
          <li class="active" role="presentation"><a data-toggle="tab" href="#profile" aria-controls="profile"
            role="tab">Perfil</a></li>
            <li role="presentation"><a data-toggle="tab" href="#messages" aria-controls="messages"
              role="tab">Mensajes</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active animation-slide-left" id="profile" role="profile">
            <div class="row">
              <div class="col-sm-6">
                <ul class="list-group" style="margin-top: 15px;">
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Identificacion
                        </h4>
                        <span>{{$user->identification}}</span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Nombres
                        </h4>
                        <span>{{$user->name}}  {{$user->lastName}}</span>
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
                        <h4 class="media-heading">Email
                        </h4>
                        <span>{{$user->email}}</span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Telefono</h4>
                        <span>{{$phones}}</span>

                      </div>
                    </div>
                  </li>

                </ul>
              </div>
            </div>
          </div>
          <div class="tab-pane animation-slide-left" id="messages" role="messages">
            Proximamente
          </div>
        </div>
      </div>
    </div>
    <!-- End Panel -->
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="userModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
role="dialog" tabindex="-1">
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
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="email" placeholder="Email"  value="{{$user->email}}">
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="phone" placeholder="Telefono " value="{{$phones}}">
              </div>
            </div>
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
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
