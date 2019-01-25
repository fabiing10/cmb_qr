@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.administrator')
@stop


@section('content')
<div class="row" data-plugin="matchHeight" data-by-row="true">
    <div class="col-xlg-12 col-md-12">


    </div>
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
                          <th>Mascota</th>
                          <th>Especie</th>
                          <th>Raza</th>
                          <th>Genero</th>
                          <th>Tamaño</th>
                          <th>Color</th>
                          <th>Detalles</th>
                          </tr>
                      </thead>

                      <tbody>
                          @foreach($pets as $pet)
                          <?php
                            $characteristics = json_decode($pet->characteristics);
                          ?>
                          <tr>
                          <td>
                            <i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$pet->name}}</td>
                          <td>

                            @if($pet->petType == 1)
                              Canino(a)
                            @elseif($pet->petType == 2)
                              Felino(a)
                            @elseif($pet->petType == 3)
                              Pez
                            @else
                              Otro
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
                          <td>{{$characteristics->medida}}</td>
                          <td>{{$characteristics->color}}</td>





                          <td>
                            <a href="/administrator/codes/assign/{{$pet->id}}/{{$code->id}}/" class="btn btn-primary">
                               <i class="site-menu-icon wb-user-add" aria-hidden="true"></i>
                               Asignar Codigo
                             </a>
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
