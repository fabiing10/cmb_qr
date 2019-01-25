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

<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/control">Inicio</a></li>
            <li><a href="/control/users">Usuarios</a></li>
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
              <img src="{{URL::asset('admin/assets/images/pet-icon.png')}}" alt="...">
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
          <li class="active" role="presentation"><a data-toggle="tab" href="#profile" aria-controls="profile"role="tab">Perfil</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active animation-slide-left" id="profile" role="profile">
            <div class="row">
              <div class="col-sm-6">
                <ul class="list-group" style="margin-top: 15px;">
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Identificación</h4><br>
                        <span>{{$user->identification}}</span>
                      </div>
                    </div>
                  </li>
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
                        <h4 class="media-heading">Correo Electronico</h4><br>
                        <span><a href="mailto:{{$user->email}}">{{$user->email}}</a></span>
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
                        <h4 class="media-heading">Nombres</h4><br>
                        <span>{{$user->name}}</span>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="media">
                      <div class="media-body">
                        <h4 class="media-heading">Telefono</h4><br>
                        <span>{{$user->phone}}</span>
                      </div>
                    </div>
                  </li>
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
