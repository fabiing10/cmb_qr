@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.administrator')
@stop

@section('style')


<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/clockpicker/clockpicker.css')}}">

<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/asspinner/asSpinner.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/select2/select2.css')}}">
@stop

@section('content')


<div class="row" data-plugin="matchHeight" data-by-row="true">
    <div class="col-xlg-12 col-md-12">
        <!-- boton formulario-->
        <div class="panel-title">
            <h3>Selecciona una mascota</h3>
        </div>
        <!-- Fin boton formulario-->
        @include('admin.administrator.appointments.create')
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
                              <th>Propietario</th>
                              <th>Edad</th>
                              <th>Raza</th>
                              <th>Color</th>
                              <th>Opciones</th>
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
                  <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$pet->name}}</td>
                  <td>{{$pet->nameUser}} {{$pet->lastNameUser}}</td>
                  <td>{{$pet->age}}</td>
                  <td>
                    <?php
                    $raza = $characteristic->getRace($pet->id);
                    echo $raza;
                    ?>
                  </td>
                  <td>{{$characteristics->color}}</td>
                  <td>


                    <button class="btn btn-primary" data-target="#exampleFormModal" data-toggle="modal"
                    type="button" onclick="assignIdPet('{{Crypt::encrypt($pet->id)}}')"><i class="site-menu-icon wb-add-file" aria-hidden="true"></i>Asignar Cita</button>

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
<script src="{{URL::asset('admin/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/select2/select2.full.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/switchery/switchery.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/asspinner/jquery-asSpinner.min.js')}}"></script>


@stop

@section('script')

<script src="{{URL::asset('admin/global/js/components/clockpicker.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/select2.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/switchery.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/asspinner.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/datatables.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v2.js')}}"></script>
<script>

function assignIdPet(id){
  $("#pet").val(id)
}




</script>


@stop
