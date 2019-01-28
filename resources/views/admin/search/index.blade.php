@extends('admin.layouts.login')

@section('style')
<style>
label {
    font-weight: 300;
    margin-right: 9px;
    font-weight: bold;
}
.bg-report label {
    width: 100%;
}
.row.bg-report {
    background: #33365fb5;
    padding: 12px;
    border-radius: 11px;
}
</style>
@stop
@section('content')
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
data-animsition-out="fade-out">>
   <div class="page-content vertical-align-middle" style="width: 320px;padding: 9px 0px;">
    {!! Form::open(array('method' => 'POST', 'class' => 'found-form','role' => 'form')) !!}
    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
    <div class="row">
          <div class="col-lg-12">
              <div class="form-group">
                <img src="{{URL::asset('admin/assets/images/logo0.png')}}" alt="..." class="img-profile-f">
                <h3 style='color:white;'>{{$user->name}} {{$user->lastName}}!</h3>
              </div>

              <div class="form-group">
                <select class="form-control" id="event" name="event" required="">
                        <option value="">Seleccione una opcion</option>

                        @if($activate == true)
                        <option value="{{$event}}">{{$event}}</option>
                        @endif
                        <option value="Entrada">Entrada</option>
                        <option value="Salida">Salida</option>
                </select>
              </div>
              <div class="form-group">
                <br>
                  <button type="submit" class="btn btn-primary">
                     Enviar
                  </button>
              </div>
          </div>
        </div>


        {!! Form::close() !!}
        <div class="row bg-report">
          <div class="col-lg-12">
            <label for="">Entradas: {{$countEntrada}}</label>
            <label for="">Salidas: {{$countSalida}}</label>
            <label for="">Desayuno: {{$countDesayuno}}</label>
            <label for="">Almuerzo: {{$countAlmuerzo}}</label>
            <label for="">Cena: {{$countCena}}</label>
          </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCLN-p5qNc11t-RJ2P1dbwJhL-4d6M_xb4"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLN-p5qNc11t-RJ2P1dbwJhL-4d6M_xb4"></script>-->
<script type="text/javascript" src="https://hpneo.github.io/gmaps/gmaps.js"></script>
@endsection
