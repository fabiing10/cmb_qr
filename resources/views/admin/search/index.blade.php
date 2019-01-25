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
    <input type="hidden" name="latitud" id="latitud" />
    <input type="hidden" name="longitud" id="longitud" />

    <div class="row">
              @foreach($pet as $p)
          <div class="col-md-6">
              <div class="form-group">
                  <?php
                    //Decode Values
                    $image = json_decode($p->imageProfile);
                  ?>
                  @if($image->img_profile != 'none')
                  <img src="{{URL::asset('uploads/images/')}}/{{$image->img_profile}}" alt="..." class="img-profile-f">
                  @else
                  <img src="{{URL::asset('admin/assets/images/pet-icon.png')}}" alt="..." class="img-profile-f">
                  @endif
              </div>

                        <div class="form-group">
                          <h2>Has Encontrado a {{$p->name}}</h2>
                        </div>



                        <div class="form-group">
                            <p>Es una excelente Noticia que hayas encontrado a {{$p->name}}, Su dueño estara muy feliz de saber que lo encontraste y para ello necesitamos informarle!<br>
                            Puedes dejar un mensaje al dueño o comunicarte con el, su informacion es:.</p>
                        </div>
                        <div class="form-group">
                            @foreach($users as $user)
                            <label>Dueño(a): </label><span>{{$user->name}}</span>
                            <br>
                            <label>Email:</label><span>{{$user->email}}</span>
                            <br>
                            <?php
                                $phonesResult = json_decode($user->phones);
                                if($phonesResult == ""){
                                  $phones = "Sin asignar";
                                }else{
                                  $phones = $phonesResult->phone;
                                }
                            ?>
                            <label>Telefono: </label><span>{{$phones}}</span>
                            @endforeach
                        </div>

                        <div class="form-group">
                              <label>Mensaje:</label>
                             <textarea class="form-control" name="description" required></textarea>
                        </div>


                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                   Reportar
                                </button>
                        </div>


                          </div>
                          @endforeach
                          <div class="col-md-6">
                              <div id="map"></div>
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
<script type="text/javascript">

map = new GMaps({
        div: '#map',
        lat: -12.043333,
        lng: -77.028333
      });

GMaps.geolocate({
  success: function(position) {
    map.setCenter(position.coords.latitude, position.coords.longitude);
    $("#latitud").val(position.coords.latitude)
    $("#longitud").val(position.coords.longitude)
    map.addMarker({
        lat: position.coords.latitude,
        lng: position.coords.longitude,
        title: 'Lima',
        click: function(e) {
          infoWindow: {
            content: '<p>HTML Content</p>'
          }
        }
    });

  },
  error: function(error) {
    alert('Geolocation failed: '+error.message);
  },
  not_supported: function() {
    alert("Your browser does not support geolocation");
  },
  always: function() {

  }
});
</script>
@endsection
