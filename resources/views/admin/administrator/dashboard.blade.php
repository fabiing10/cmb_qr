@extends('admin.layouts.master')

@section('menu')
  @include('admin.layouts.menu.administrator')
@stop



@section('style')
<link rel="stylesheet" href="{{URL::asset('admin/assets/examples/css/widgets/statistics.css')}}">
@stop

@section('content')
<div class="row">
  <div class="col-xlg-12 col-md-12">
    <h3>Citas Medicas</h3>
  <div class="panel">
          <header class="panel-heading">
            <div class="panel-actions"></div>
            <br>
          </header>
          <div class="panel-body table-responsive">
          <table id="medicalAppointments" class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>Fecha/Hora</th>
                <th>Mascota</th>
                <th>Propietario</th>
                <th>Estado</th>
                <th>Detalles</th>
              </tr>
          </thead>
              <tbody>
                <tr>
                  <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>Sin datos</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
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

    $('#medicalAppointments').dataTable( {
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
      $($.fn.dataTable.tables(true)).DataTable()
         .columns.adjust()
         .responsive.recalc();
    });
    </script>
@stop
