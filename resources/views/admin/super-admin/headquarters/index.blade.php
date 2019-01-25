@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.admin')
@stop


@section('content')

<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/login">Inicio</a></li>
            <li class="active">Veterinaria</li>
          </ol>
          <h2 class="page-title">Veterinaria - {{$veterinary->name}}</h2>
        </div>
  </div>
  <div class="col-xlg-6 col-md-6">
      <div class="panel links-panel">
          <div class="panel-body">
            <a href="#" class="btn btn-icon btn-danger btn-outline" data-target="#exampleFormModal" data-toggle="modal"> Nueva Sede</a>
          </div>
      </div>
  </div>
  @include('admin.super-admin.headquarters.create')
</div>

<div class="row" data-plugin="matchHeight" data-by-row="true">

<div class="col-xlg-12 col-md-12">


  <!-- tabla veterinarias -->
  <div class="panel">
          <header class="panel-heading">
            <div class="panel-actions"></div>
            <br>
          </header>
          <div class="panel-body">


            <div class="row">
              <div class="col-lg-12">
                <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                  <thead>
                    <tr>
                      <th>Tipo</th>
                      <th>Pais</th>
                      <th>Ciudad</th>
                      <th>Dirección</th>
                      <th>Telefono</th>
                      <th>Url</th>
                      <th>Correo</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($headquarters as $headquarter)
                    <tr>
                      <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$headquarter->principal}}</td>
                      <td>{{$headquarter->country}}</td>
                      <td>{{$headquarter->city}}</td>
                      <td>{{$headquarter->address}}</td>
                      <td>{{$headquarter->phone}}</td>
                      <td>{{$headquarter->url}}</td>
                      <td>{{$headquarter->email}}</td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn btn-icon btn-danger btn-outline" id="exampleColorDropdown6"
                          data-toggle="dropdown" aria-expanded="false">Opciones
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="exampleColorDropdown6"
                          role="menu">
                            <li role="presentation"><a href="/control/veterinary/headquarters/{{Crypt::encrypt($headquarter->veterinaryId)}}" role="menuitem">Ver Sedes</a></li>
                            <li role="presentation"><a href="delete" role="menuitem">Eliminar</a></li>
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
  <!-- fin tabla veterinarias -->
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
@stop

<script type="text/javascript">

  function loadHeadquarters(HeadquarterId){
    alert(HeadquarterId)
  }
</script>
