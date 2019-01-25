@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.admin')
@stop

@section('style')
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/asspinner/asSpinner.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/select2/select2.css')}}">
@stop

@section('content')

<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/">Inicio</a></li>
            <li class="active">Veterinarias</li>
          </ol>
          <h2 class="page-title">Transferir Usuario</h2>
        </div>
  </div>
  <div class="col-xlg-6 col-md-6">

        <!-- Modal -->
        <div class="modal fade" id="transferFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
        role="dialog" tabindex="-1">
            <div class="modal-dialog">
            {!! Form::open(array('url' => 'control/users/transfer', 'method' => 'POST', 'class' => 'modal-content', 'autocomplete' => 'off' )) !!}

            <input type="hidden" name="veterinary" id="veterinary" value="" />
            <input type="hidden" name="userId" id="userId" value="{{$userId}}" />
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="input-group-addon" style="background-color: white; border: white;">
                    <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">Cambiar Cliente</h4>
                    <br><i class="icon fa-share-square-o" aria-hidden="true" style="font-size: 30px"></i>

                </span>
                <p style="text-align: center;font-size: 12px;">Desea asignar este usuario a la nueva veterinaria?</p>
            </div>
            <div class="modal-body">

                <div class="row">
                  <div class="col-sm-12 pull-right">
                    <input class="btn btn-primary submit-btn" type="submit" value="Cambiar Usuario"/>
                  </div>
                </div>
            </div>
            {!! Form::close() !!}
            </div>
        </div>
        <!-- End Modal -->


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
                            <th>Veterinaria</th>
                            <th>Sede</th>
                            <th>Ciudad</th>
                            <th>Dirección</th>
                            <th>Telefono</th>
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($veterinary as $data)
                          <tr>
                            <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$data->nameVet}}</td>
                            @if($data->principal == TRUE)
                            <td>{{$data->nameVet}} - Sede Principal</td>
                            @else
                            <td>Sucursal - {{$data->nameHeadquarter}}</td>
                            @endif
                            <td>{{$data->city}}</td>
                            <td>{{$data->address}}</td>
                            <td>{{$data->phone}}</td>
                            <td>
                              <a href="#" class="btn btn-primary" onclick="transferUser('{{Crypt::encrypt($data->id)}}')"role="menuitem" data-target="#transferFormModal" data-toggle="modal">Asignar usuario</a></li>
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
<script src=".{{URL::asset('admin/global/vendor/bootbox/bootbox.js')}}"></script>
@stop

@section('script')
<script src="{{URL::asset('admin/global/js/components/datatables.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v2.js')}}"></script>

<script type="text/javascript">

  function transferUser(veterinaryId){
      document.getElementById("veterinary").value = veterinaryId;
  }
</script>

@stop
