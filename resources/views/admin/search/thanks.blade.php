@extends('admin.layouts.login')

@section('content')
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
data-animsition-out="fade-out">>
   <div class="page-content vertical-align-middle">
     <div class="brand">
<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
</div>
    <div class="row report-container">

          <div class="col-md-12">
              <div class="form-group" style="width: 70%;">
                <img src="{{URL::asset('admin/assets/images/pet-icon.png')}}" alt="..." class="img-profile-f">
                <h2 style="color:white;">Registro Exitoso!</h2>
              </div>
              <div class="form-group" style="width: 70%;">
                  <p>Es una maravillosa noticia para la comunidad cuando alguien encuentra una mascota</p>
              </div>
              <div class="form-group" style="width: 70%;">
                <br>
                  <button type="submit" onclick="window.location.href='/'" class="btn btn-primary">
                     Volver al inicio
                  </button>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')


@endsection
