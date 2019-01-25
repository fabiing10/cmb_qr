@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.codes')
@stop


@section('content')

<div class="page animsition">
    <div class="gmap" id="gmap"></div>
  </div>
  <!-- End Page -->
<!--   <script src="http://maps.google.com/maps/api/js?sensor=false"></script>-->

@stop



@section('plugins')
<script src="{{URL::asset('admin/global/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables-fixedheader/dataTables.fixedHeader.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables-bootstrap/dataTables.bootstrap.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables-tabletools/dataTables.tableTools.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/asrange/jquery-asRange.min.js')}}"></script>
<script src=".{{URL::asset('admin/global/vendor/bootbox/bootbox.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/gmaps/gmaps.js')}}"></script>

@stop

@section('script')

<script src="{{URL::asset('admin/global/js/components/datatables.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/gmaps.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/pages/map-google.js')}}"></script>


@stop
