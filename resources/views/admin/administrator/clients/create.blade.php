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
<style media="screen">

@media only screen and (max-width: 768px) {
  .pearl.col-xs-4 {
    width: 33.33333333% !important;
  }
}
</style>
@stop

@section('content')

<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/administrator">Inicio</a></li>
            <li><a href="/administrator/clients">Clientes</a></li>
            <li class="active">Nuevo Cliente</li>
          </ol>
          <h2 class="page-title">Clientes</h2>
        </div>
  </div>
</div>

<div class="row" data-plugin="matchHeight" data-by-row="true">
    <div class="col-xlg-12 col-md-12">
      <!-- Panel Wizard Form Container -->
          <div class="panel" id="petWizardFormContainer">
            <h4 class="panel-form-container">NUEVO CLIENTE</h4>
            <div class="panel-body">
              <!-- Steps -->
              <div class="pearls row">
                <div class="pearl current col-xs-4">
                  <div class="pearl-icon"><i class="icon wb-large-point" aria-hidden="true"></i></div>
                  <span class="pearl-title">Propietario</span>
                </div>
                <div class="pearl col-xs-4">
                  <div class="pearl-icon"><i class="icon wb-large-point" aria-hidden="true"></i></div>
                  <span class="pearl-title">Mascota</span>
                </div>
                <div class="pearl col-xs-4">
                  <div class="pearl-icon"><i class="icon wb-large-point" aria-hidden="true"></i></div>
                  <span class="pearl-title">Confirmación</span>
                </div>
              </div>
              <!-- End Steps -->
              <!-- Wizard Content -->
              <form class="wizard-content" id="dataFormContainer" action="" method="post" enctype="multipart/form-data">

                <div class="wizard-pane active" role="tabpanel">
                  <div class="container">
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}" />

                      <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                  <input type="text" class="form-control" name="name" placeholder="Nombres *">
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                  <input type="text" class="form-control" name="lastName" placeholder="Apellidos *">
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="identification" placeholder="Identificación">
                              </div>
                          </div>
                        </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="icon wb-map" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="address" placeholder="Dirección">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="icon wb-mobile" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="phone" placeholder="Teléfono">
                            </div>
                        </div>
                      </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon fa-building" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="city" placeholder="Ciudad">
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="icon fa-envelope" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="email" placeholder="Correo Electrónico *">
                            </div>
                        </div>
                      </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" placeholder="Usuario *" onkeypress="javascript: return ValidarNumero(event, this)">
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Contraseña **" autocomplete="off">
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="re_password" placeholder="Conf. Contraseña **" autocomplete="off">
                                </div>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="wizard-pane" id="exampleBillingOne" role="tabpanel">
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon wb-help pink-icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Digite el codigo de seguimiento asignado" title="" aria-describedby="tooltip939992"></i></span>
                          <input type="text" class="form-control" name="codePet" placeholder="Codigo QR ">
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input type="text" class="form-control" name="namePet" placeholder="Nombre *" required="">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <select class="form-control" id="petType" name="petType" required="" onchange="selectRace()">
                                <option value="">Selecciona la Especie *</option>
                                <option value="1">Canino</option>
                                <option value="2">Felino</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <select class="form-control" id="raza" name="raza" required="">
                                <option value="">Selecciona la Raza *</option>
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="row" id="characterics" style="display:none;">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <select class="form-control" id="gender" name="gender" required="" style="display:none;">
                                  <option value="">Selecciona el Genero *</option>
                                  <option value="1">Macho</option>
                                  <option value="2">Hembra</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <select class="form-control" id="color_canine" name="color_canine" required=""  style="display:none;">
                                  <option value="">Selecciona el Color *</option>
                                  <option value="Abigarrado">Abigarrado</option>
                                  <option value="Albaricoque">Albaricoque</option>
                                  <option value="Albino">Albino</option>
                                  <option value="Amarillo">Amarillo</option>
                                  <option value="Arlequín">Arlequín</option>
                                  <option value="Ascob">Ascob</option>
                                  <option value="Atigrado">Atigrado</option>
                                  <option value="Avellana">Avellana</option>
                                  <option value="Azul">Azul</option>
                                  <option value="Azul grisáceo o grizzle">Azul grisáceo o grizzle</option>
                                  <option value="Azul mirlo">Azul mirlo</option>
                                  <option value="Belton">Belton</option>
                                  <option value="Bleiz">Bleiz</option>
                                  <option value="Bronce">Bronce</option>
                                  <option value="Café">Café</option>
                                  <option value="Caoba">Caoba</option>
                                  <option value="Cervato">Cervato</option>
                                  <option value="Cobre">Cobre</option>
                                  <option value="Collar">Collar</option>
                                  <option value="Con anteojos">Con anteojos</option>
                                  <option value="Cortado">Cortado</option>
                                  <option value="Champaña">Champaña</option>
                                  <option value="Chocolate">Chocolate</option>
                                  <option value="Encendido">Encendido</option>
                                  <option value="Ensillado">Ensillado</option>
                                  <option value="Flameado">Flameado</option>
                                  <option value="Fuego">Fuego</option>
                                  <option value="Golondrino">Golondrino</option>
                                  <option value="Gris carbonado">Gris carbonado</option>
                                  <option value="Hígado">Hígado</option>
                                  <option value="Isabela">Isabela</option>
                                  <option value="Leonado">Leonado</option>
                                  <option value="Lila">Lila</option>
                                  <option value="Manchado">Manchado</option>
                                  <option value="Manteado">Manteado</option>
                                  <option value="Marcado">Marcado</option>
                                  <option value="Marcas de lápiz">Marcas de lápiz</option>
                                  <option value="Marrón">Marrón</option>
                                  <option value="Máscara">Máscara</option>
                                  <option value="Matices">Matices</option>
                                  <option value="Moteado">Moteado</option>
                                  <option value="Naranja">Naranja</option>
                                  <option value="Paja">Paja</option>
                                  <option value="Pardo">Pardo</option>
                                  <option value="Particolor">Particolor</option>
                                  <option value="Pincelado">Pincelado</option>
                                  <option value="Plateado">Plateado</option>
                                  <option value="Porcelana">Porcelana</option>
                                  <option value="Roano">Roano</option>
                                  <option value="Rubio carbonado">Rubio carbonado</option>
                                  <option value="Sal y pimienta">Sal y pimienta</option>
                                  <option value="Sepia">Sepia</option>
                                  <option value="Tricolor">Tricolor</option>
                                  <option value="otro">Otro</option>

                          </select>
                          <select class="form-control" id="color_feline" name="color_feline" required="" style="display:none;">
                                  <option value="">Selecciona el Color *</option>
                                  <option value="Negro (negro)">Negro (negro)</option>
                                  <option value="Rojo (rojo, naranja, amarillo canario, mermelada)">Rojo (rojo, naranja, amarillo canario, mermelada)</option>
                                  <option value="Azul (azul, gris)">Azul (azul, gris)</option>
                                  <option value="Chocolate (marrón oscuro)">Chocolate (marrón oscuro)</option>
                                  <option value="Foca (marrón claro, canela)">Foca (marrón claro, canela)</option>
                                  <option value="Plateado (gris, plata)">Plateado (gris, plata)</option>
                                  <option value="Otro">Otro</option>
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <select class="form-control" id="medida" name="medida" required="">
                                <option value="">Tamaño *</option>
                                <option value="grande">Grande</option>
                                <option value="mediano">Mediano</option>
                                <option value="pequeño">Pequeño</option>
                          </select>
                          <select class="form-control" id="medida_canine" name="medida_canine" required="" style="display:none;">
                                  <option value="">Tamaño *</option>
                                  <option value="Gigante">Gigante</option>
                                  <option value="Grande">Grande</option>
                                  <option value="Mediano">Mediano</option>
                                  <option value="Pequeño">Pequeño</option>
                                  <option value="Toy">Toy</option>
                                  <option value="Mini Toy">Mini Toy</option>
                          </select>
                          <select class="form-control" id="medida_feline" name="medida_feline" required="" style="display:none;">
                                  <option value="">Tamaño *</option>
                                  <option value="Grande">Grande</option>
                                  <option value="Mediano">Mediano</option>
                                  <option value="Pequeño">Pequeño</option>
                                  <option value="Mini">Mini</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input type="number" class="form-control" name="age" placeholder="Edad (meses) *" required="">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 form-group">

                    </div>
                    <div class="col-lg-4 form-group text-center">
                        <div class="input-group input-group-file text-center w-100" style="width: 100%;">
                            <a href="#" onclick="imageUpload()" class="btn btn-icon btn-primary btn-action-profile btn-w80-p30" style="padding:6px; background-color: #ff0066 !important; border-color: #ff0066 !important; margin-left: 4px;">Foto Mascota</a>
                            <br/>
                            No subir imagen mayor a 2MB
                            <input type="file" name="image" id="image" multiple="" style="display:none;">
                            </span>
                          </span>
                        </div>
                    </div>
                    <div class="col-lg-4 form-group">

                    </div>
                  </div>
                </div>
                <div class="wizard-pane data" id="exampleGettingOne" role="tabpanel">
                  <div class="confirmation-panel">
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Identificacion Cliente</label>
                        <span id="identificationClient"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Nombres Cliente</label>
                          <span id="nameClient"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Apellidos Cliente</label>
                        <span id="lastNameClient"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Direccion Cliente</label>
                          <span id="addressClient"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Telefono Cliente</label>
                        <span id="phoneClient"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Ciudad Cliente</label>
                          <span id="cityClient"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <label class="bold">Correo Electronico Cliente</label>
                        <span id="emailClient"></span>
                      </div>
                    </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Usuario Cliente</label>
                          <span id="usernameClient"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Codigo Mascota</label>
                          <span id="codePet"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Mascota</label>
                          <span id="namePet"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Especie Mascota</label>
                          <span id="typePet">

                          </span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Raza Mascota</label>
                          <span id="razaPet"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Genero Mascota</label>
                          <span id="genderPet"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Color Mascota</label>
                          <span id="colorPet"></span>

                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Edad Meses</label>
                          <span id="age"></span>
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                        <div class="input-group">
                          <label class="bold">Tamaño </label>
                          <span id="medidaPet"></span>
                        </div>
                      </div>
                  </div>
                    <input type="submit" name="sendForm" id="sendForm" value="Enviar" style="display:none;"/>
                  </div>
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

function ValidarNumero (e, campo) {
    key = e.keyCode ? e.keyCode : e.which;
    if(key == 32){return false;}
}

function imageUpload(){
  $("#image").trigger("click");
}

function setUser(id){
    $("#user").val(id);
    $(".pull-right").trigger( "click" );
}

function selectRace(){
  var petType = document.getElementById("petType").value;
  if(petType == 1){
    //Medidas
    $("#medida_canine").fadeIn();
    $("#medida_feline").fadeOut();
    $("#medida").fadeOut();
    //Raza
    $("#raza_otro").fadeOut();
    $("#raza").fadeIn();

  }else if(petType == 2){
    //Medidas
    $("#medida_canine").fadeOut();
    $("#medida_feline").fadeIn();
    $("#medida").fadeOut();
    //Raza
    $("#raza_otro").fadeOut();
    $("#raza").fadeIn();
  }else{
    //Medidas
    $("#medida_canine").fadeOut();
    $("#medida_feline").fadeOut();
    $("#medida").fadeIn();
    //Raza
    $("#raza_otro").fadeIn();
    $("#raza").fadeOut();
  }

$("#petType").change(function(){
      $("#gender").show();
      if(petType == 1){
      //Color
      $("#color_canine").fadeIn();
      $("#color_feline").fadeOut();
      $("#characterics").fadeIn();

    }else if(petType == 2){
      //Color
      $("#color_feline").fadeIn();
      $("#color_canine").fadeOut();
      $("#characterics").fadeIn();
    }else {
      $("#color_canine").fadeOut();
      $("#color_feline").fadeOut();
    }
});

  $("#raza").empty();
  $.get( "/races/"+petType, function(data) {
    var listitems = '<option> Escoge una Raza</option>';
    $.each(data, function (index, value) {
      listitems += '<option value=' + value.id + '>' + value.race + '</option>';
    });
  $("#raza").append(listitems);
  });
}

(function() {

  $("#medida_canine").change(function(){
        $("#medidaPet").html($("#medida_canine option:selected").text());
  });

  $("#medida_feline").change(function(){
        $("#medidaPet").html($("#medida_feline option:selected").text());
  });

  $("#medida").change(function(){
        $("#medidaPet").html($("#medida option:selected").text());
  });



  $("[name='identification']").change(function(){
        $("#identificationClient").html($("[name='identification']").val());
  });

  $("[name='name']").change(function(){
        $("#nameClient").html($("[name='name']").val());
  });

  $("[name='lastName']").change(function(){
        $("#lastNameClient").html($("[name='lastName']").val());
  });

  $("[name='address']").change(function(){
        $("#addressClient").html($("[name='address']").val());
  });

  $("[name='phone']").change(function(){
        $("#phoneClient").html($("[name='phone']").val());
  });

  $("[name='city']").change(function(){
        $("#cityClient").html($("[name='city']").val());
  });

  $("[name='email']").change(function(){
        $("#emailClient").html($("[name='email']").val());
  });

  $("[name='username']").change(function(){
        $("#usernameClient").html($("[name='username']").val());
  });

  $("[name='codePet']").change(function(){
        $("#codePet").html($("[name='codePet']").val());
  });
  $("[name='namePet']").change(function(){
        $("#namePet").html($("[name='namePet']").val());
  });

  $("[name='petType']").change(function(){
        var petType = $("[name='petType']").val();
        if(petType == 1){
           petTypeVal = "Canino";
        }else if(petType == 2){
           petTypeVal = "Felino";
        }else{
           petTypeVal = "Otra Especie";
        }
        $("#typePet").html(petTypeVal);
  });

  $("[name='raza']").change(function(){
        $("#razaPet").html($("[name='raza'] option:selected").text());
  });

  $("[name='gender']").change(function(){
        var gender = $("[name='gender']").val();
        if(gender == 1){
          val_gender = "Macho";
        }else{
          val_gender = "Hembra";
        }
        $("#genderPet").html(val_gender);
  });

  $("[name='color_canine']").change(function(){
        $("#colorPet").html($("[name='color_canine']").val());
  });
  $("[name='color_feline']").change(function(){
        $("#colorPet").html($("[name='color_feline']").val());
  });

  $("[name='age']").change(function(){
        $("#age").html($("[name='age']").val());
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
          name: {
              validators: {
                notEmpty: {
                  message: 'Ingresa el Nombre'
                }
              }
          },
          lastName: {
              validators: {
                notEmpty: {
                  message: 'Ingresa los Apellidos'
                }
              }
          },email: {
              validators: {
                notEmpty: {
                  message: 'Ingresa el e-Mail'
                },remote: {
                    message: 'El email ya se encuentra registrado',
                    url: '/validate/form/email',
                    type: 'POST'
                }
              }
          },username: {
              validators: {
                notEmpty: {
                  message: 'Ingresa un nombre de Usuario'
                },remote: {
                    message: 'El username ya se encuentra registrado',
                    url: '/validate/form/username',
                    type: 'POST',
                    delay: 2000
                }
              }
          },password: {
            validators: {
              notEmpty: {
                message: 'Ingresa una contraseña'
              },identical: {
                    field: 're_password',
                    message: 'La contraseña NO coincide'
                }
            }
        },re_password: {
            validators: {
                identical: {
                    field: 'password',
                    message: 'La contraseña NO coincide'
                }
            }
          },codePet: {
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
                  message: 'Ingresa el nombre de la Mascota'
                }
              }
          },petType: {
              validators: {
                notEmpty: {
                  message: 'Selecciona la Especie'
                }
              }
          },age: {
              validators: {
                notEmpty: {
                  message: 'Selecciona la Edad'
                }
              }
          },medida: {
              validators: {
                notEmpty: {
                  message: 'Selecciona el Tamaño'
                }
              }
          },medida_canine: {
              validators: {
                notEmpty: {
                  message: 'Selecciona el Tamaño'
                }
              }
          },medida_feline: {
              validators: {
                notEmpty: {
                  message: 'Selecciona el Tamaño'
                }
              }
          },raza: {
              validators: {
                notEmpty: {
                  message: 'Selecciona la Raza'
                }
              }
          },
          gender: {
              validators: {
                notEmpty: {
                  message: 'Selecciona el Genero'
                }
              }
          },
          color: {
              validators: {
                notEmpty: {
                  message: 'Selecciona el Color'
                }
              }
          },color_canine: {
              validators: {
                notEmpty: {
                  message: 'Selecciona el Color'
                }
              }
          },color_feline: {
              validators: {
                notEmpty: {
                  message: 'Selecciona el Color'
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
          }
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
