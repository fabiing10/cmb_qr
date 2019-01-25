@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.administrator')
@stop

@section('style')



<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/summernote/summernote.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/asspinner/asSpinner.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/select2/select2.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/formvalidation/formValidation.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/jquery-wizard/jquery-wizard.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}">

@stop

@section('content')

<?php
// characteristics Pet
$CharacteristicsResult = json_decode($pet->characteristics);
if($CharacteristicsResult == ""){
  $Characteristics = "Sin asignar";
  $Raza = "Sin asignar";
  $Color = "Sin asignar";
}else{
  $medida = $CharacteristicsResult->medida;
  $Raza = $CharacteristicsResult->raza;
  $Color = $CharacteristicsResult->color;
}

 ?>
<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/user">Inicio</a></li>
            <li><a href="/user/pets">Mascotas</a></li>
            <li class="active">Actualizar Mascota</li>
          </ol>
          <h2 class="page-title">Mascotas</h2>
        </div>
  </div>
</div>

<div class="row" data-plugin="matchHeight" data-by-row="true">
    <div class="col-xlg-12 col-md-12">
      <!-- Panel Wizard Form Container -->
          <div class="panel" id="petWizardFormContainer">
            <h4 class="panel-form-container">Actualizar Mascota</h4>
            <div class="panel-body">
              <!-- Steps -->
              <div class="pearls row">
                <div class="pearl current col-xs-4">
                  <div class="pearl-icon"><i class="icon wb-large-point" aria-hidden="true"></i></div>
                  <span class="pearl-title">Datos Mascota</span>
                </div>
              </div>
              <!-- End Steps -->
              <!-- Wizard Content -->
              <form class="wizard-content" id="dataFormContainer" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                    <input type="hidden" name="_id" value="{{Crypt::encrypt($pet->id)}}" />
                    <input type="hidden" name="petType" id="petType" value="{{$pet->petType}}" />
                    <input type="hidden" name="petRace" id="petRace" value="{{$Raza}}" />


                <div class="wizard-pane active" id="exampleBillingOne" role="tabpanel">
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon wb-help pink-icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Digite el codigo de seguimiento asignado" title="" aria-describedby="tooltip939992"></i></span>
                          @if($code_value === 0)
                            <input type="text" class="form-control" name="codePet" placeholder="Codigo QR"  value="">
                          @else
                              <input type="text" class="form-control" name="codePet" placeholder="Codigo QR" readonly="readonly" >
                          @endif

                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input type="text" class="form-control" name="namePet" placeholder="Mascota" value="{{$pet->name}}">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          @if($pet->petType == 1)
                          <select class="form-control" id="petType" name="petType" required="" onchange="selectRace(this)" >
                                <option value="1" selected>Canino</option>
                                <option value="2">Felino</option>
                          </select>
                          @elseif($pet->petType == 2)
                          <select class="form-control" id="petType" name="petType" required="" onchange="selectRace(this)">
                                <option value="1">Canino</option>
                                <option value="2" selected>Felino</option>
                          </select>
                          @else
                          <select class="form-control" id="petType" name="petType" required="" onchange="selectRace(this)">
                                <option value="">Escoge una Mascota</option>
                                <option value="1" >Canino</option>
                                <option value="2">Felino</option>
                          </select>
                          @endif
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <select class="form-control" id="raza" name="raza" required="">

                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          @if($pet->gender == '1')
                          <select class="form-control" id="gender" name="gender" required="">
                                  <option value="1"selected>Macho</option>
                                  <option value="2">Hembra</option>
                          </select>
                          @else
                          <select class="form-control" id="gender" name="gender" required="">

                                  <option value="1">Macho</option>
                                  <option value="2" selected>Hembra</option>
                          </select>
                          @endif
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>

                            <select class="form-control" id="color_canine" name="color_canine" required="" style="{{ ($pet->petType === 1) ? 'display:block;' : 'display:none;'}}">

                                  <option value="Abigarrado" {{ ($Color === "Abigarrado") ? 'selected=true' : ''}}>Abigarrado</option>
                                  <option value="Albaricoque" {{ ($Color === "Albaricoque") ? 'selected=true' : ''}}>Albaricoque</option>
                                  <option value="Albino" {{ ($Color === "Albino") ? 'selected=true' : ''}}>Albino</option>
                                  <option value="Amarillo" {{ ($Color === "Amarillo") ? 'selected=true' : ''}}>Amarillo</option>
                                  <option value="Arlequín" {{ ($Color === "Arlequín") ? 'selected=true' : ''}}>Arlequín</option>
                                  <option value="Ascob" {{ ($Color === "Ascob") ? 'selected=true' : ''}}>Ascob</option>
                                  <option value="Atigrado" {{ ($Color === "Atigrado") ? 'selected=true' : ''}}>Atigrado</option>
                                  <option value="Avellana" {{ ($Color === "Avellana") ? 'selected=true' : ''}}>Avellana</option>
                                  <option value="Azul" {{ ($Color === "Azul") ? 'selected=true' : ''}}>Azul</option>
                                  <option value="Azul grisáceo o grizzle" {{ ($Color === "Azul grisáceo o grizzle") ? 'selected=true' : ''}}>Azul grisáceo o grizzle</option>
                                  <option value="Azul mirlo" {{ ($Color === "Azul mirlo") ? 'selected=true' : ''}}>Azul mirlo</option>
                                  <option value="Belton" {{ ($Color === "Belton") ? 'selected=true' : ''}}>Belton</option>
                                  <option value="Bleiz" {{ ($Color === "Bleiz") ? 'selected=true' : ''}}>Bleiz</option>
                                  <option value="Bronce" {{ ($Color === "Bronce") ? 'selected=true' : ''}}>Bronce</option>
                                  <option value="Café" {{ ($Color === "Café") ? 'selected=true' : ''}}>Café</option>
                                  <option value="Caoba" {{ ($Color === "Caoba") ? 'selected=true' : ''}}>Caoba</option>
                                  <option value="Cervato" {{ ($Color === "Cervato") ? 'selected=true' : ''}}>Cervato</option>
                                  <option value="Cobre" {{ ($Color === "Cobre") ? 'selected=true' : ''}}>Cobre</option>
                                  <option value="Collar" {{ ($Color === "Collar") ? 'selected=true' : ''}}>Collar</option>
                                  <option value="Con anteojos" {{ ($Color === "Con anteojos") ? 'selected=true' : ''}}>Con anteojos</option>
                                  <option value="Cortado" {{ ($Color === "Cortado") ? 'selected=true' : ''}}>Cortado</option>
                                  <option value="Champaña" {{ ($Color === "Champaña") ? 'selected=true' : ''}}>Champaña</option>
                                  <option value="Chocolate" {{ ($Color === "Chocolate") ? 'selected=true' : ''}}>Chocolate</option>
                                  <option value="Encendido" {{ ($Color === "Encendido") ? 'selected=true' : ''}}>Encendido</option>
                                  <option value="Ensillado" {{ ($Color === "Ensillado") ? 'selected=true' : ''}}>Ensillado</option>
                                  <option value="Flameado" {{ ($Color === "Flameado") ? 'selected=true' : ''}}>Flameado</option>
                                  <option value="Fuego" {{ ($Color === "Fuego") ? 'selected=true' : ''}}>Fuego</option>
                                  <option value="Golondrino" {{ ($Color === "Golondrino") ? 'selected=true' : ''}}>Golondrino</option>
                                  <option value="Gris carbonado" {{ ($Color === "Gris carbonado") ? 'selected=true' : ''}}>Gris carbonado</option>
                                  <option value="Hígado" {{ ($Color === "Hígado") ? 'selected=true' : ''}}>Hígado</option>
                                  <option value="Isabela" {{ ($Color === "Isabela") ? 'selected=true' : ''}}>Isabela</option>
                                  <option value="Leonado" {{ ($Color === "Leonado") ? 'selected=true' : ''}}>Leonado</option>
                                  <option value="Lila" {{ ($Color === "Lila") ? 'selected=true' : ''}}>Lila</option>
                                  <option value="Manchado" {{ ($Color === "Manchado") ? 'selected=true' : ''}}>Manchado</option>
                                  <option value="Manteado" {{ ($Color === "Manteado") ? 'selected=true' : ''}}>Manteado</option>
                                  <option value="Marcado" {{ ($Color === "Marcado") ? 'selected=true' : ''}}>Marcado</option>
                                  <option value="Marcas de lápiz" {{ ($Color === "Marcas de lápiz") ? 'selected=true' : ''}}>Marcas de lápiz</option>
                                  <option value="Marrón" {{ ($Color === "Marrón") ? 'selected=true' : ''}}>Marrón</option>
                                  <option value="Máscara" {{ ($Color === "Máscara") ? 'selected=true' : ''}}>Máscara</option>
                                  <option value="Matices" {{ ($Color === "Matices") ? 'selected=true' : ''}}>Matices</option>
                                  <option value="Moteado" {{ ($Color === "Moteado") ? 'selected=true' : ''}}>Moteado</option>
                                  <option value="Naranja" {{ ($Color === "Naranja") ? 'selected=true' : ''}}>Naranja</option>
                                  <option value="Paja" {{ ($Color === "Paja") ? 'selected=true' : ''}}>Paja</option>
                                  <option value="Pardo" {{ ($Color === "Pardo") ? 'selected=true' : ''}}>Pardo</option>
                                  <option value="Particolor" {{ ($Color === "Particolor") ? 'selected=true' : ''}}>Particolor</option>
                                  <option value="Pincelado" {{ ($Color === "Pincelado") ? 'selected=true' : ''}}>Pincelado</option>
                                  <option value="Plateado" {{ ($Color === "Plateado") ? 'selected=true' : ''}}>Plateado</option>
                                  <option value="Porcelana" {{ ($Color === "Porcelana") ? 'selected=true' : ''}}>Porcelana</option>
                                  <option value="Roano" {{ ($Color === "Roano") ? 'selected=true' : ''}}>Roano</option>
                                  <option value="Rubio carbonado" {{ ($Color === "Rubio carbonado") ? 'selected=true' : ''}}>Rubio carbonado</option>
                                  <option value="Sal y pimienta" {{ ($Color === "Sal y pimienta") ? 'selected=true' : ''}}>Sal y pimienta</option>
                                  <option value="Sepia" {{ ($Color === "Sepia") ? 'selected=true' : ''}}>Sepia</option>
                                  <option value="Tricolor" {{ ($Color === "Tricolor") ? 'selected=true' : ''}}>Tricolor</option>
                                  <option value="otro" {{ ($Color === "otro") ? 'selected=true' : ''}}>Otro</option>

                          </select>

                          <select class="form-control" id="color_feline" name="color_feline" required="" style="{{ ($pet->petType === 2) ? 'display:block;' : 'display:none;'}}">

                                  <option value="Negro (negro)" {{ ($Color === "Negro (negro)") ? 'selected=true' : ''}}>Negro (negro)</option>
                                  <option value="Rojo (rojo, naranja, amarillo canario, mermelada)" {{ ($Color === "Rojo (rojo, naranja, amarillo canario, mermelada)") ? 'selected=true' : ''}}>Rojo (rojo, naranja, amarillo canario, mermelada)</option>
                                  <option value="Azul (azul, gris)" {{ ($Color === "Azul (azul, gris)") ? 'selected=true' : ''}}>Azul (azul, gris)</option>
                                  <option value="Chocolate (marrón oscuro)" {{ ($Color === "Chocolate (marrón oscuro)") ? 'selected=true' : ''}}>Chocolate (marrón oscuro)</option>
                                  <option value="Foca (marrón claro, canela)" {{ ($Color === "Foca (marrón claro, canela)") ? 'selected=true' : ''}}>Foca (marrón claro, canela)</option>
                                  <option value="Plateado (gris, plata)" {{ ($Color === "Plateado (gris, plata)") ? 'selected=true' : ''}}>Plateado (gris, plata)</option>
                                  <option value="Otro" {{ ($Color === "Otro") ? 'selected=true' : ''}}>Otro</option>
                          </select>

                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>



                            <select class="form-control" id="medida_canine" name="medida_canine" required="" style="{{ ($pet->petType === 1) ? 'display:block;' : 'display:none;'}}">

                                    <option value="Gigante" {{ ($medida === "Gigante") ? 'selected=true' : 'checked=false'}} >Gigante</option>
                                    <option value="Grande" {{ ($medida === "Grande") ? 'selected=true' : 'checked=false'}}>Grande</option>
                                    <option value="Mediano" {{ ($medida === "Mediano") ? 'selected=true' : 'checked=false'}}>Mediano</option>
                                    <option value="Pequeño" {{ ($medida === "Pequeño") ? 'selected=true' : 'checked=false'}}>Pequeño</option>
                                    <option value="Toy" {{ ($medida === "Toy") ? 'selected=true' : 'checked=false'}}>Toy</option>
                                    <option value="Mini Toy" {{ ($medida === "Mini Toy") ? 'selected=true' : 'checked=false'}}>Mini Toy</option>
                            </select>

                            <select class="form-control" id="medida_feline" name="medida_feline" required="" style="{{ ($pet->petType === 2) ? 'display:block;' : 'display:none;'}}">
                                    <option value="Grande" {{ ($medida === "Grande") ? 'selected=true' : 'checked=false'}}>Grande</option>
                                    <option value="Mediano" {{ ($medida === "Mediano") ? 'selected=true' : 'checked=false'}}>Mediano</option>
                                    <option value="Pequeño" {{ ($medida === "Pequeño") ? 'selected=true' : 'checked=false'}}>Pequeño</option>
                                    <option value="Mini" {{ ($medida === "Mini") ? 'selected=true' : 'checked=false'}}>Mini</option>
                            </select>

                        </div>
                      </div>
                      <div class="col-lg-6 form-group text-center">
                        <div class="input-group input-group-file text-center w-100" style="width: 100%;">
                            <a href="#" onclick="imageUpload()" class="btn btn-icon btn-primary btn-action-profile btn-w80-p30" style="padding:6px; background-color: #ff0066 !important; border-color: #ff0066 !important; margin-left: 4px;">Foto Mascota</a>
                            <br/>
                            No subir imagen mayor a 2MB
                            <input type="file" name="image" id="image" multiple="" style="display:none;">
                            </span>
                          </span>
                        </div>
                    </div>
                  </div>
                  <input type="submit" name="enviar" id="sendForm" style="display:none;">
                </div>

              </form>
              <!-- Wizard Content -->
            </div>
          </div>
          <!-- End Panel Wizard Form Container -->

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
<script src="{{URL::asset('admin/global/vendor/select2/select2.full.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/switchery/switchery.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/asspinner/jquery-asSpinner.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/formvalidation/formValidation.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/formvalidation/framework/bootstrap.js')}}"></script>

<script src="{{URL::asset('admin/global/vendor/jquery-wizard/jquery-wizard.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/summernote/summernote.min.js')}}"></script>


@stop

@section('script')
<script src="{{URL::asset('admin/global/js/components/select2.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/switchery.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/asspinner.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/datatables.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/jquery-wizard.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/forms/wizard.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/summernote.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v2.js')}}"></script>



<script type="text/javascript">

function setUser(id){
    $("#user").val(id);
    $(".pull-right").trigger( "click" );
}

function imageUpload(){
  $("#image").trigger("click");
}

function selectRace(sel){
  var petType = sel.value;
  if(petType == 1){
    $("#color").fadeOut();
    $("#color_canine").fadeIn();
    $("#color_feline").fadeOut();
    //Medidas
    $("#medida_canine").fadeIn();
    $("#medida_feline").fadeOut();
    $("#medida").fadeOut();
    //Raza
    $("#raza_otro").fadeOut();
    $("#raza").fadeIn();

  }else if(petType == 2){
    $("#color").fadeOut();
    $("#color_canine").fadeOut();
    $("#color_feline").fadeIn();
    //Medidas
    $("#medida_canine").fadeOut();
    $("#medida_feline").fadeIn();
    $("#medida").fadeOut();
    //Raza
    $("#raza_otro").fadeOut();
    $("#raza").fadeIn();
  }else{
    $("#color").fadeIn();
    $("#color_canine").fadeOut();
    $("#color_feline").fadeOut();
    //Medidas
    $("#medida_canine").fadeOut();
    $("#medida_feline").fadeOut();
    $("#medida").fadeIn();
    //Raza
    $("#raza_otro").fadeIn();
    $("#raza").fadeOut();
  }

  $("#raza").empty();
  $.get( "/races/"+petType, function(data) {
    var listitems;
    $.each(data, function (index, value) {
      listitems += '<option value=' + value.id + '>' + value.race + '</option>';
    });
  $("#raza").append(listitems);

  });

}


(function() {
  var petType = $('#petType').val();
  var race = $('#petRace').val();
  $("#raza").empty();
  $.get( "/races/"+petType, function(data) {
    var listitems;
    $.each(data, function (index, value) {
      if(value.id == race){
        listitems += '<option value=' + value.id + ' selected>' + value.race + '</option>';
      }else{
        listitems += '<option value=' + value.id + '>' + value.race + '</option>';
      }

    });
  $("#raza").append(listitems);

  });



  $("[name='codePet']").change(function(){
        $("#codePet").html($("[name='codePet']").val());
  });
  $("[name='namePet']").change(function(){
        $("#namePet").html($("[name='namePet']").val());
  });

  $("[name='petType']").change(function(){
        $("#typePet").html($("[name='petType']").val());
  });

  $("[name='raza']").change(function(){
        $("#razaPet").html($("[name='raza']").val());
  });

  $("[name='gender']").change(function(){
        $("#genderPet").html($("[name='gender']").val());
  });

  $("[name='color']").change(function(){
        $("#colorPet").html($("[name='color']").val());
  });


  $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
         }
  });



  var defaults = $.components.getDefaults("wizard");
  var options = $.extend(true, {}, defaults, {
    onInit: function() {
      $('#dataFormContainer').formValidation({
        framework: 'bootstrap',
        fields: {
          codePet: {
              validators: {
                remote: {
                    message: 'El codigo no existe',
                    url: '/validate/form/code',
                    type: 'POST',
                    delay: 2000
                }
              }
          },namePet: {
              validators: {
                notEmpty: {
                  message: 'Digite el nombre de su mascota'
                }
              }
          },petType: {
              validators: {
                notEmpty: {
                  message: 'Digite la especie de su mascota'
                }
              }
          },gender: {
              validators: {
                notEmpty: {
                  message: 'Seleccione el genero'
                }
              }
          },
          color: {
              validators: {
                notEmpty: {
                  message: 'Digite el color de su mascota'
                }
              }
          },image: {
              validators: {
                file: {
                  extension: 'jpeg,jpg,png',
                  type: 'image/jpeg,image/png',
                  maxSize: 2097152,   // 2048 * 1024
                  message: 'El archivo seleccionado es invalido'
                }
              }
          },

        }
      });
    },
    validator: function() {
      var fv = $('#dataFormContainer').data('formValidation');
      var $this = $(this);
      // Validate the container
      fv.validateContainer($this);
      var isValidStep = fv.isValidContainer($this);
      if (isValidStep === false || isValidStep === null) {
        return false;
      }
      return true;
    },
    onFinish: function() {
      $("#sendForm").trigger("click");

    },buttonsAppendTo: '.panel-body'
  });

  $("#petWizardFormContainer").wizard(options);

})();


</script>
@stop
