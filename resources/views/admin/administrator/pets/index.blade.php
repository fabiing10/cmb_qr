@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.administrator')
@stop


@section('content')
<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/login">Inicio</a></li>
            <li class="active">Mascotas</li>
          </ol>
        </div>
  </div>
  <div class="col-xlg-6 col-md-6">
      <div class="panel links-panel">

            <div class="block-option">
              <a href="pets/report/" class="btn btn-dark-identipet" style="margin-top:23px;">Listado Mascotas</a>
            </div>
          </div>
      </div>
  </div>
</div>

<div class="row" data-plugin="matchHeight" data-by-row="true">

    <div class="col-xlg-12 col-md-12">
      <div class="nav-tabs-horizontal">
              <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                <li class="active" role="presentation"><a data-toggle="tab" href="#pets" aria-controls="exampleTabsLineOne" role="tab">Mascotas</a></li>
                <li role="presentation"><a data-toggle="tab" href="#lost-Pets" aria-controls="exampleTabsLineTwo" role="tab">Macotas Perdidas</a></li>
              </ul>
              <div class="tab-content padding-top-20">
                <div class="tab-pane active" id="pets" role="tabpanel">
                  <div class="panel">
                          <div class="panel-body">
                            <table id="petsTable" class="table table-hover dataTable table-striped width-full responsive">
                                <thead>
                                    <tr>
                                      <th>Código QR</th>
                                      <th>Nombre</th>
                                      <th>Especie</th>
                                      <th>Raza</th>
                                      <th>Genero</th>
                                      <th>Color</th>
                                      <th>Tamaño</th>
                                      <th>Propietario</th>
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
                                      <td>{{$pet->name}}</td>
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
                                    <td>
                                      @if($pet->gender == 1)
                                        Macho
                                      @else
                                        Hembra
                                      @endif
                                    </td>
                                    <td>{{$characteristics->color}}</td>
                                    <td>{{$characteristics->medida}}</td>
                                    <td>{{$pet->nameUser}} {{$pet->lastNameUser}}</td>
                                    <td width="100">
                                      <a class="btn btn-dark-identipet" href="pets/profile/{{Crypt::encrypt($pet->id)}}">Detalles</a>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          </div>
                        </div>
                </div>

                <div class="tab-pane" id="lost-Pets" role="tabpanel">
                  <div class="panel">
                      <div class="panel-body">
                        <table id="lostpets" class="table table-hover dataTable table-striped width-full responsive">
                            <thead>
                                <tr>
                                  <th>Código QR</th>
                                  <th>Nombre</th>
                                  <th>Especie</th>
                                  <th>Raza</th>
                                  <th>Genero</th>
                                  <th>Color</th>
                                  <th>Tamaño</th>
                                  <th>Propietario</th>
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
                                @if($pet->petStatus == 2)
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
                                  <td>{{$pet->name}}</td>
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
                                <td>
                                  @if($pet->gender == 1)
                                    Macho
                                  @else
                                    Hembra
                                  @endif
                                </td>
                                <td>{{$characteristics->color}}</td>
                                <td>{{$characteristics->medida}}</td>
                                <td>{{$pet->nameUser}} {{$pet->lastNameUser}}</td>
                                <td width="100">
                                  <a class="btn btn-dark-identipet" href="pets/profile/{{Crypt::encrypt($pet->id)}}">Detalles</a>
                                </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
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


<script>
$(document).ready(function($) {

$('#lostpets').dataTable( {
  responsive: true,
  searching: true,
  lengthChange: false,
  destroy: true,
  paging: true,
  language: {
      search: "_INPUT_",
      searchPlaceholder: "Buscar",
      lengthMenu: "_MENU_",
      paginate: {
          previous: '‹',
          next:     '›'
      }
  },
  lengthChange: true,
  lengthMenu: [ 10, 25, 50, 75, 100 ],
} );

$('#petsTable').dataTable( {
  responsive: true,
  searching: true,
  lengthChange: false,
  destroy: true,
  paging: true,
  language: {
      search: "_INPUT_",
      searchPlaceholder: "Buscar",
      lengthMenu: "_MENU_",
      paginate: {
          previous: '‹',
          next:     '›'
      }
  },
  lengthChange: true,
  lengthMenu: [ 10, 25, 50, 75, 100 ],
} );

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  $($.fn.dataTable.tables(true)).DataTable()
     .columns.adjust()
     .responsive.recalc();
});

});
</script>
@stop
