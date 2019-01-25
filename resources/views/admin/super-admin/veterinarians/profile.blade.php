@extends('admin.layouts.master')

<?php
$characteristics = json_decode($veterinary->characteristics);
?>

@section('style')
<link rel="stylesheet" href="{{URL::asset('admin/global/fonts/octicons/octicons.css')}}">

<style type="text/css">
  strong.profile-stat-count {
      width: 100%;
      display: block;
  }
</style>
@stop

@section('menu')
@include('admin.layouts.menu.admin')
@stop


@section('content')

<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/control">Inicio</a></li>
            <li><a href="/control/veterinary">Veterinarias</a></li>
            <li class="active">{{$veterinary->name}}</li>
          </ol>

        </div>
  </div>
</div>

<div class="row" data-plugin="matchHeight" data-by-row="true">

  <div class="row">
          <div class="col-md-3">
            <!-- Page Widget -->
            <div class="widget widget-shadow text-center" style="padding: 25px 5px;">
              <div class="widget-header">
                <div class="widget-header-content">
                  <a class="imgProfile" href="javascript:void(0)">
                    <i class="icon oi-home" aria-hidden="true" style="font-size: 51px;"></i>
                    <!--<img src="../../../global/portraits/5.jpg" alt="...">-->
                  </a>
                  <h4 class="profile-user">{{$veterinary->name}}</h4>
                  <p class="profile-job"><a target="_blank" href="{{$veterinary->url}}">{{$veterinary->url}}</a></p>



                </div>
              </div>
              <div class="widget-footer">
                <div class="row no-space">
                  <div class="col-xs-6">
                    <strong class="profile-stat-count">{{$countUsers}}</strong>
                    <span>Usuarios</span>
                  </div>
                  <div class="col-xs-6">
                    <strong class="profile-stat-count">{{$countPets}}</strong>
                    <span>Mascotas</span>
                  </div>

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
                    role="tab">Sedes</a></li>
                  <li role="presentation"><a data-toggle="tab" href="#administrators" aria-controls="activities" role="tab">Administradores</a></li>
                  <li role="presentation"><a data-toggle="tab" href="#clients" aria-controls="clients" role="tab">Usuarios</a></li>
                  <li role="presentation"><a data-toggle="tab" href="#pets" aria-controls="pets" role="tab">Mascotas</a></li>



                </ul>
                <div class="tab-content">
                  <div class="tab-pane active animation-slide-left" id="activities" role="tabpanel">
                    <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Ciudad</th>
                      <th>Dirección</th>
                      <th>Telefono</th>
                      <th>Correo</th>
                      <!--<th>Opciones</th>-->
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($headquarters as $headquarter)
                    <tr>
                      <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>
                        @if($headquarter->principal == TRUE)
                          {{$veterinary->name}}
                        @else
                          {{$headquarter->nameHeadquarter}}
                        @endif
                      </td>

                      <td>{{$headquarter->city}}</td>
                      <td>{{$headquarter->address}}</td>
                      <td>{{$headquarter->phone}}</td>

                      <td>{{$headquarter->email}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

                  </div>

                  <div class="tab-pane animation-slide-left" id="administrators" role="tabpanel">
                    <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                  <thead>
                    <tr>
                      <th><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>Nombres</th>
                      <th>Sede</th>
                      <th>Ciudad</th>
                      <th>Telefono</th>
                      <th>Correo</th>
                      <th>Username</th>
                      <!--<th>Opciones</th>-->
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($administrators as $admin)
                    <tr>
                      <td>{{$admin->name}} {{$admin->lastName}}</td>
                      <td>
                        @if($admin->principalHeadquarter == TRUE)
                          {{$veterinary->name}}
                        @else
                          {{$headquarter->nameHeadquarter}}
                        @endif
                      </td>
                      <td>
                        {{$admin->cityHeadquarter}}
                      </td>
                      <td>
                        {{$admin->phoneHeadquarter}}
                      </td>
                      <td>{{$admin->email}}</td>
                      <td>{{$admin->username}}</td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>

                  </div>

                  <div class="tab-pane animation-slide-left" id="pets" role="tabpanel">
                    <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                        <thead>
                            <tr>
                              <th><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>Codigo QR</th>
                              <th>Especie</th>
                              <th>Genero</th>
                              <th>Raza</th>
                              <th>Estado</th>
                              <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($pets as $pet)
                            <?php
                                $image = json_decode($pet->imageProfile);
                                $characteristics = json_decode($pet->characteristics);

                            ?>
                            <tr>
                              <td>
                                @if($pet->haveCode == TRUE)
                                  <?php
                                    $c = $code->getCodeByPet($pet->id);
                                    echo $c;
                                   ?>
                                @else
                                  Sin asignar
                                @endif
                              </td>
                              <td>
                                @if($pet->petType == 1)
                                   Canino(a)
                                @elseif($pet->petType == 2)
                                   Felino(a)
                                @else
                                   Otros
                                @endif
                              </td>

                            <td>
                              @if($pet->gender == 1)
                                Macho
                              @else
                                Hembra
                              @endif
                            </td>
                            <td>
                              <?php
                              $raza = $characteristic->getRace($pet->id);
                              echo $raza;
                              ?>
                            </td>
                            <td>
                              @if($pet->petStatus == 1)
                                 Activo
                              @elseif($pet->petType == 2)
                                 Perdido
                              @else
                                 Inactivo
                              @endif
                            </td>
                            <td width="100">
                              <a class="btn btn-primary btn-dark-identipet" href="/control/pets/profile/{{Crypt::encrypt($pet->id)}}">Ver Detalles</a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                  </div>

                  <div class="tab-pane animation-slide-left" id="clients" role="tabpanel">
                    <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                      <thead>
                        <tr>
                          <th><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>Identificacion</th>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th>Correo</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($clients as $client)
                        <tr>
                          <td>{{$client->identification}}</td>
                          <td>{{$client->name}}</td>
                          <td>{{$client->lastName}}</td>
                          <td>{{$client->email}}</td>

                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn btn-dark-identipet dropdown-toggle" id="exampleColorDropdown6"
                              data-toggle="dropdown" aria-expanded="false">Opciones
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="exampleColorDropdown6"
                              role="menu">
                                <li role="presentation">
                                  <li role="presentation"><a href="/control/users/profile/{{Crypt::encrypt($client->id)}}" role="menuitem">Detalles</a></li>
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
            <!-- End Panel -->
          </div>
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
<script src=".{{URL::asset('admin/global/vendor/bootbox/bootbox.js')}}"></script>
@stop

@section('script')
<script src="{{URL::asset('admin/global/js/components/datatables.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v1.js')}}"></script>

<script type="text/javascript">

  $('.next-btn').click(function(){

    var option = $('#active_tab').val();
    if(option == "veterinary"){
        console.log(option)
        $(".panel-veterinary").fadeOut();
        $(".panel-option").fadeIn();
    }
  });

  $('.next-to-admin').click(function(){
    $('#active_tab').val("administrator");
    $(".panel-option").fadeOut();
    $(".panel-administrator").fadeIn();
  });

  $('.next-to-finish').click(function(){
    $('#form-veterinary').submit();
  });

  $('.close').click(function(){
    $('#active_tab').val("veterinary");
        $(".panel-option").fadeOut();
        $(".panel-administrator").fadeOut();
        $(".panel-veterinary").fadeIn();

  });

  function loadHeadquarters(HeadquarterId){
    alert(HeadquarterId)
  }
</script>
@stop
