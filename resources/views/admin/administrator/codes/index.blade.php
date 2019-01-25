@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.administrator')
@stop


@section('style')
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/asspinner/asSpinner.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/select2/select2.css')}}">
<style media="screen">
@media only screen and (max-width: 768px) {
  .none-mobile{
    display: none;
  }
  header.panel-heading {
    height: 50px !important;
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
<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/login">Inicio</a></li>
            <li class="active">Códigos</li>
          </ol>
          <h2 class="page-title">Códigos</h2>
        </div>
  </div>
  @if($headquarter->principal == TRUE)
      <div class="col-xlg-6 col-md-6">
          <div class="panel links-panel">
              <div class="panel-body">
                <div class="block-option none-mobile">
                  <a href="#" class="btn btn-icon btn-primary btn-add-option wb-agregar-codigos" data-target="#codesModal" data-toggle="modal" style="background-color:transparent !important;">                  </a>
                  <span class="title-btn">Asignar Codigos</span>
                </div>
                <div class="block-option none-desktop">
                  <a href="#" class="btn btn-dark-identipet none-desktop" data-target="#codesModal" data-toggle="modal" style="margin-top:23px;">Asignar Codigos</a>
                </div>
              </div>
          </div>
      </div>
      @include('admin.administrator.codes.assign')
  @endif
</div>
<div class="row" data-plugin="matchHeight" data-by-row="true">
    <div class="col-xlg-12 col-md-12">
      <div class="nav-tabs-horizontal">
        <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
          <li class="active" role="presentation"><a data-toggle="tab" href="#codes" aria-controls="exampleTabsLineOne"
            role="tab">Codigos Disponibles</a></li>
            @if($headquarter->principal == TRUE)
          <li role="presentation"><a data-toggle="tab" href="#codes-a" aria-controls="exampleTabsLineTwo"
            role="tab">Codigos Sedes</a></li>
            @endif
            <li role="presentation"><a data-toggle="tab" href="#codes-assign" aria-controls="exampleTabsLineTwo"
              role="tab">Codigos Asignados</a></li>
            <li role="presentation"><a data-toggle="tab" href="#solicitud" aria-controls="exampleTabsLineTwo"
                role="tab">Codigos Solicitados</a></li>
        </ul>
        <div class="tab-content padding-top-20">
          <div class="tab-pane active" id="codes" role="tabpanel">
            <div class="panel">
                    <header class="panel-heading">
                      <div class="panel-actions"></div>
                      <br>
                    </header>
                    <div class="panel-body">
                      <table class="table table-hover dataTable table-striped width-full" id="CodeDisponibles">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Código QR</th>
                            <th>Estado</th>
                            <th>Sede</th>
                            <th>Dirección</th>
                            <th>Ciudad</th>
                            <th>Fecha Creacion</th>
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($codes as $code)
                            <tr>
                              <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$code->id}}</td>
                              <td>{{$code->codes}}</td>
                              <td>
                                @if($code->status == TRUE)
                                  Activo
                                @else
                                  Inactivo
                                @endif
                              </td>
                              <td>
                              @if($code->principal == TRUE)
                                Principal
                              @else
                              <td>{{$code->nameHeadquarter}}</td>
                              @endif
                              </td>
                              <td>{{$code->address}}</td>
                              <td>{{$code->city}}</td>
                              <?php
                                $date = $code->created_at;
                                $fecha = explode(" ", $date);
                              ?>
                              <td>{{$fecha[0]}}</td>
                              <td>
                                <a href="/administrator/codes/assign/{{Crypt::encrypt($code->id)}}" class="btn btn-icon btn-option wb-transferir-codigo" style="padding: 4px;"></a>
                              </td>
                            </tr>
                          @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
          </div>
          @if($headquarter->principal == TRUE)
          <div class="tab-pane" id="codes-a" role="tabpanel">
            <div class="panel">
                    <header class="panel-heading">
                      <div class="panel-actions"></div>
                      <br>
                    </header>
                    <div class="panel-body">
                      <table class="table table-hover dataTable table-striped width-full" id="CodesHeadquarter">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Código QR</th>
                            <th>Estado</th>
                            <th>Sede</th>
                            <th>Dirección</th>
                            <th>Ciudad</th>
                            <th>Fecha</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($codesAssign as $code)
                            <tr>
                              <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$code->id}}</td>
                              <td>{{$code->codes}}</td>
                              <td>
                                @if($code->status == TRUE)
                                  Activo
                                @else
                                  Inactivo
                                @endif
                              </td>
                              <td>
                              @if($code->principal == TRUE)
                                Principal
                              @else
                              {{$code->nameHeadquarter}}
                              @endif
                              </td>
                              <td>{{$code->address}}</td>
                              <td>{{$code->city}}</td>
                              <?php
                                $date = $code->created_at;
                                $fecha = explode(" ", $date);
                                ?>
                              <td>{{$fecha[0]}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
          </div>
          @endif
          <div class="tab-pane" id="codes-assign" role="tabpanel">
            <div class="panel">
                    <header class="panel-heading">
                      <div class="panel-actions"></div>
                      <br>
                    </header>
                    <div class="panel-body">
                      <table class="table table-hover dataTable table-striped width-full" id="CodesAssign">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Código QR</th>
                            <th>Estado</th>
                            <th>Mascota</th>
                            <th>Propietario</th>
                            <th>Fecha</th>
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($activeCodesHeadquarterId as $code)
                            <tr>
                              <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$code->id}}</td>
                              <td>{{$code->codes}}</td>

                              <td>
                                @if($code->status == TRUE)
                                  Activo
                                @else
                                  Inactivo
                                @endif

                              </td>
                              <td>{{$code->namePet}}</td>
                              <td>{{$code->userName}}</td>
                              <td>{{$code->date}}</td>
                              <td width="100">
                                <a class="btn btn-dark-identipet" href="/administrator/pets/profile/{{Crypt::encrypt($code->petId)}}" style=" line-height: 1em !important;">Detalles</a>
                              </td>
                            </tr>
                          @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
          </div>
          <div class="tab-pane" id="solicitud" role="tabpanel">
            <div class="panel">
                    <header class="panel-heading">
                      <div class="panel-actions"></div>
                      <br>
                    </header>
                    <div class="panel-body">
                      <table class="table table-hover dataTable table-striped width-full" id="CodesRequired">
                        <thead>
                          <tr>
                            <th>Mascota</th>
                            <th>Especie</th>
                            <th>Raza</th>
                            <th>Genero</th>
                            <th>Tamaño</th>
                            <th>Color</th>
                            <th>Fecha</th>
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($pets as $pet)
                          <tr>
                            <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$pet->name}}</td>
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
                                $characteristics = json_decode($pet->characteristics);
                              ?>
                              <?php
                              $raza = $characteristic->getRace($pet->id);
                              echo $raza;
                              $fecha = explode(" ", ($pet->updated_at));
                              $date = $fecha[0];
                              ?>
                            </td>
                            <td>
                              @if($pet->gender == 1)
                                Macho
                              @else
                                Hembra
                              @endif
                            </td>
                            <td>{{$characteristics->medida}}</td>
                            <td>{{$characteristics->color}}</td>
                            <td>{{$date}}</td>
                          <td>
                            <a class="btn btn-dark-identipet" href="/administrator/codes/required/{{Crypt::encrypt($pet->id)}}">Asignar codigo</a>
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
<!--  <div class="col-xlg-12 col-md-12">
       tabla veterinarias
        <div class="panel">
                <header class="panel-heading">
                  <div class="panel-actions"></div>
                  <br>
                </header>
                <div class="panel-body">
                  <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                      <tr>
                        <th width="45"></th>
                        <th>Mascota</th>
                        <th>Codigo</th>
                        <th>Estado</th>
                        <th>Veterinaria</th>
                        <th>Fecha Creacion</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($headquarter->principal == TRUE)

                            @foreach ($activeCodes as $code)
                                <tr>
                                  <td>
                                    <?php
                                    //Decode Values
                                    $image = json_decode($code->imageProfile);
                                    ?>
                                    @if($image->img_profile != 'none')
                                      <img src="{{URL::asset('uploads/images/')}}/{{$image->img_profile}}" alt="..." style="width: 45px;">
                                    @else
                                      <img src="{{URL::asset('admin/assets/images/pet-icon.png')}}" alt="..." style="width: 45px;">
                                    @endif

                                  </td>
                                  <td>{{$code->namePet}}</td>
                                  <td>{{$code->codes}}</td>

                                  <td>
                                    @if($code->status == TRUE)
                                      Activo
                                    @else
                                      Inactivo
                                    @endif

                                  </td>
                                  <td>{{$code->name}}</td>
                                  <td>{{$code->created_at}}</td>
                                  <td>
                                      <a href="#" class="btn btn-primary">
                                        <i class="iicon wb-plus" aria-hidden="true"></i> Detalles
                                      </a>
                                  </td>

                                </tr>
                            @endforeach
                      @else

                          @foreach ($activeCodesHeadquarterId as $code)
                              <tr>
                                <td>
                                  <?php
                                  //Decode Values
                                  $image = json_decode($code->imageProfile);
                                  ?>
                                  @if($image->img_profile != 'none')
                                    <img src="{{URL::asset('uploads/images/')}}/{{$image->img_profile}}" alt="..." style="width: 45px;">
                                  @else
                                    <img src="{{URL::asset('admin/assets/images/pet-icon.png')}}" alt="..." style="width: 45px;">
                                  @endif

                                </td>
                                <td>{{$code->namePet}}</td>
                                <td>{{$code->codes}}</td>

                                <td>
                                  @if($code->status == TRUE)
                                    Activo
                                  @else
                                    Inactivo
                                  @endif

                                </td>
                                <td>{{$code->name}}</td>
                                <td>{{$code->created_at}}</td>
                                <td>
                                    <a href="#" class="btn btn-primary">
                                      <i class="iicon wb-plus" aria-hidden="true"></i> Detalles
                                    </a>
                                </td>

                              </tr>
                          @endforeach
                      @endif


                    </tbody>
                  </table>
                </div>
              </div>
         fin tabla veterinarias
    </div> -->
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

<script type="text/javascript">

$(document).ready(function($) {
  // Handler for .ready() called.
  $('#selectVeterinary').on( 'change', function() {
    if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
        $("#rowVeterinary").fadeIn();
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        $("#rowVeterinary").fadeOut();
    }

});
$('#CodeDisponibles').dataTable( {
    responsive: true,
    searching: false,
    lengthChange: false,
    destroy: true,
} );

$('#CodesHeadquarter').dataTable( {
    responsive: true,
    searching: false,
    lengthChange: false,
    destroy: true,
} );

$('#CodesAssign').dataTable( {
    responsive: true,
    searching: false,
    lengthChange: false,
    destroy: true,
} );

$('#CodesRequired').dataTable( {
    responsive: true,
    searching: false,
    lengthChange: false,
    destroy: true,
} );

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    $($.fn.dataTable.tables(true)).DataTable()
       .columns.adjust()
       .responsive.recalc();
});

});
</script>
@stop
