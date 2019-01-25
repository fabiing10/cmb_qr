@extends('admin.layouts.login')

@section('content')
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
data-animsition-out="fade-out">>
   <div class="page-content vertical-align-middle">
     <div class="brand">

</div>
    {!! Form::open(array('method' => 'POST', 'class' => 'found-form','role' => 'form')) !!}
    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />

    <div class="row report-container">

          <div class="col-md-12">
                      @if(Session::has('error_message'))
                        <div class="message-error">
                          <h3>Error :(</h3>
                          <p>No existe ninguna mascota con ese código</p>
                        </div>
                      @endif
                      <div class="form-group">
                        <img src="{{URL::asset('admin/assets/images/pet-icon.png')}}" alt="..." class="img-profile-f">
                        <h2>Encontraste una Mascota!</h2>
                      </div>
                      <div class="form-group">
                          <p>Es una maravillosa noticia para la comunidad cuando alguien encuentra una mascota, Si haz encontrado una mascota digita el código que aparece en su collar en el siguiente campo:</p>
                      </div>
                      <div class="form-group">
                           <input class="form-control" name="code" id="code" />
                      </div>
                      <div class="form-group">
                        <br>
                          <button type="submit" class="btn btn-primary">
                             Reportar
                          </button>
                      </div>


                          </div>


                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
@endsection

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLN-p5qNc11t-RJ2P1dbwJhL-4d6M_xb4"></script>
<script type="text/javascript" src="https://hpneo.github.io/gmaps/gmaps.js"></script>

@endsection
