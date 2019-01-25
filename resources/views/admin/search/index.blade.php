@extends('admin.layouts.login')

@section('style')
<style>
label {
    font-weight: 300;
    margin-right: 9px;
    font-weight: bold;
}
</style>
@stop
@section('content')
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
data-animsition-out="fade-out">>
   <div class="page-content vertical-align-middle">
     <div class="brand">

</div>
    {!! Form::open(array('method' => 'POST', 'class' => 'found-form','role' => 'form')) !!}
    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
    <div class="row">
          <div class="col-lg-12">
              <div class="form-group">
                <img src="{{URL::asset('admin/assets/images/logo0.png')}}" alt="..." class="img-profile-f">
                <h2>Bienvenido {{$user->name}}!</h2>
              </div>
              <!--
              <div class="form-group">
                  <p>Es una maravillosa noticia para la comunidad cuando alguien encuentra una mascota, Si haz encontrado una mascota digita el código que aparece en su collar en el siguiente campo:</p>
              </div>
            -->
              <div class="form-group">
                <select class="form-control" id="event" name="event" required="">
                        <option value="">Escoge un evento a realizar</option>
                        <option value="1">Almuerzo</option>
                        <option value="2">Cena</option>
                        <option value="3">Onces</option>
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
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCLN-p5qNc11t-RJ2P1dbwJhL-4d6M_xb4"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLN-p5qNc11t-RJ2P1dbwJhL-4d6M_xb4"></script>-->
<script type="text/javascript" src="https://hpneo.github.io/gmaps/gmaps.js"></script>
@endsection
