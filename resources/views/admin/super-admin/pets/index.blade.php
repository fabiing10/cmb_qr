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
            <li class="active">Mascotas</li>
          </ol>
          <h2 class="page-title">Mascotas</h2>
        </div>
  </div>
  <div class="col-xlg-6 col-md-6">
    <div class="block-option">
      <a href="pets/reporte/excel" class="btn btn-dark-identipet" style="margin-top:23px;">Listado Mascotas</a>
    </div>
  </div>
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
                  <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                      <thead>
                          <tr>
                            <th>Código QR</th>
                            <th>Especie</th>
                            <th>Raza</th>
                            <th>Nombre Mascota</th>
                            <th>Veterinaria</th>
                            <th>Estado</th>
                            <th>Detalles</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($pets as $pet)
                          <?php
                              //Decode Values
                              $image = json_decode($pet->imageProfile);
                              $characteristics = json_decode($pet->characteristics);
                          ?>
                          <tr>
                            <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>
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
                              <?php
                              $raza = $characteristic->getRace($pet->id);
                              echo $raza;
                               ?>
                            </td>
                            <td>{{$pet->name}}</td>
                            <td>{{$pet->veterinary}}</td>
                            <td>
                              @if($pet->petStatus == 1)
                                Activo
                              @else
                                Inactivo
                              @endif
                            </td>
                          <td width="100">
                            <a class="btn btn-dark-identipet" href="pets/profile/{{Crypt::encrypt($pet->id)}}">Ver Detalles</a>
                          </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
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
    <script src="{{URL::asset('admin/global/vendor/bootbox/bootbox.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/select2/select2.full.min.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/switchery/switchery.min.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/asspinner/jquery-asSpinner.min.js')}}"></script>
@stop

@section('script')
    <script src="{{URL::asset('admin/global/js/components/select2.js')}}"></script>
    <script src="{{URL::asset('admin/global/js/components/switchery.js')}}"></script>
    <script src="{{URL::asset('admin/global/js/components/asspinner.js')}}"></script>
    <script src="{{URL::asset('admin/global/js/components/datatables.js')}}"></script>
    <script src="{{URL::asset('admin/assets/examples/js/dashboard/v2.js')}}"></script>
@stop
