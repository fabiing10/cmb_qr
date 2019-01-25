<?php
//Decode Values
$characteristics = json_decode($clinicHistory->characteristics);
$characteristicsmore = json_decode($clinicHistory->reference);
/*if($characteristicsmore == ""){
  $observations = "Sin asignar";
  $state = "Sin asignar";
  $userVeterinary = "Sin asignar";
  }
  else{

}*/
$observations = $characteristicsmore->observations;
$state = $characteristicsmore->state;
$userVeterinary = $characteristicsmore->userVeterinary;
  $diet = $characteristics->diet;
  $origin = $characteristics->origin;
  $vaccines = $characteristics->vaccines;
  $cleaning = $characteristics->cleaning;
  $products = $characteristics->products;
  $date = $characteristics->dateProduct;
  $attitude = $characteristics->attitude;
  $bodyCondition = $characteristics->bodyCondition;
  $weight = $characteristics->weight;
  $hydration = $characteristics->hydration;
  $temperature = $characteristics->temperature;
  $pulse = $characteristics->pulse;
  $hearRate = $characteristics->hearRate;
  $breathingFrequency = $characteristics->breathingFrequency;
  $mucous = $characteristics->mucous;
  $capilaryRefillTime = $characteristics->capilaryRefillTime;
  $anamenesis = $characteristics->anamenesis;
  $diseases = $characteristics->diseases;
  $locomotion = $characteristics->locomotion;
  $skeletalMuscle = $characteristics->skeletalMuscle;
  $respiratorySystem = $characteristics->respiratorySystem;
  $digestiveSystem = $characteristics->digestiveSystem;
  $genitourinarySystem = $characteristics->genitourinarySystem;
  $reproductiveStatus = $characteristics->reproductiveStatus;
  $cardiovascularSystem = $characteristics->cardiovascularSystem;
  $nervousSystem = $characteristics->nervousSystem;
  $eyes = $characteristics->eyes;
  $ears = $characteristics->ears;
  $skin = $characteristics->skin;
  $lymphNodes = $characteristics->lymphNodes;
  $examen_laboratorio = $characteristics->examen_laboratorio;
  $imagen_diagnostica = $characteristics->imagen_diagnostica;
?>
<html>
<head>
  <title>Reporte Historia clinica</title>
<link rel="stylesheet" href="{{URL::asset('admin/assets/css/layouts.css')}}">
  <style media="screen">
  html, body{
    margin: 0px;
    padding: 0px;
    padding-top: 0px;
  }
  li {
    list-style: none;
    text-align: center;
  }
  ul {
    margin: 0px;
    padding: 0px;
    text-align: center;
  }
    td{
      padding: 5px;
      width: 200px;
      text-align: center;
    }
    body{
      background-color: #FFF;
      font-family: Roboto,sans-serif;
    }
    .row{
      background-color: white;
      margin: 10px;
      padding: 10px;
      display: block;
      width: 100%;
    }
    .col-6{
      width: 50%;
      float: left;
    }
    span{
      color: #76838f;
    }
    .img_profile{
      width: 100px;
      height: 100px;
    }
  </style>

</head>
<body>
<div class="row">
      <?php
      //Decode Values
      $profile = json_decode($pet->imageProfile);
      ?>
      <center><img src="{{URL::asset('assets/logo-identipet.png')}}" alt="..." width="150"></center>
      <center><h2 style="color: #ff0066;">RESUMEN HISTORIA CLINICA ({{$pet->name}})</h2></center>
      <div class="widget widget-shadow text-center">
        <div class="widget-header" style="padding: 10px 0px;">
          <div class="widget-header-content">
            <a class="avatar avatar-full" href="javascript:void(0)">

              @if($profile->img_profile != 'none')
              <center><img src="{{URL::asset('uploads/images/')}}/{{$profile->img_profile}}" alt="..." width="100" ></center>
              @else
              <center><img src="{{URL::asset('admin/assets/images/pet-icon.png')}}" alt="..." width="100"></center>
              @endif
            </a>
          </div>
        </div>
      </div>
    <center><h4 style="color: #4f4f4f;">INFORMACION BASICA</h2></center>
    <center>
      <table border="0" style="margin:0 auto;">
        <tr>
          <td colspan="6">
            <span>Dieta</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$diet}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Procedencia</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$origin}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Vacunas</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$vaccines}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Desparacitaciones</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$cleaning}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Productos</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$products}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Fecha</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$date}}</strong>
          </td>
        </tr>
        </table>
      </center>
        <center><h4 style="color: #4f4f4f;">EXAMEN CLINICO BASICO</h2></center>
        <center>
          <table border="0" style="margin:0 auto;">
        <tr>
          <td colspan="6">
            <span>Actitud</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$attitude}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Condicion Corporal</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$bodyCondition}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Peso</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$weight}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Hidratacion</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$hydration}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Temperatura</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$temperature}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Pulso</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$pulse}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Frecuencia Cardiaca</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$hearRate}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Frecuencia Respiratoria</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$breathingFrequency}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Mucosas</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$mucous}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Tiempo de llenado Capilar</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$capilaryRefillTime}}</strong>
          </td>
        </tr>
        </table>
        <br>
      </center>
        <center><h4 style="color: #4f4f4f;">ANAMNESIS</h2></center>
        <center>
          <table border="0" style="margin:0 auto;">
        <tr>
          <td colspan="6">
            <span>Enfermedades o procedimientos anteriores</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$diseases}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Anamnesis</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$anamenesis}}</strong>
          </td>
        </tr>
        </table>
      </center>
        <center><h4 style="color: #4f4f4f;">EXAMEN POR SISTEMA</h2></center>
        <center>
          <table border="0" style="margin:0 auto;">
        <tr>
          <td colspan="6">
            <span>Locomocion</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$locomotion}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Musculo Esqueletico</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$skeletalMuscle}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Sistema Respiratorio</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$respiratorySystem}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Sistema Dijestivo</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$digestiveSystem}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Sistema Genitourinario</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$genitourinarySystem}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Estado Reproductivo</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$reproductiveStatus}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Sistema Cardiovascular</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$cardiovascularSystem}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Sistema Nervioso</span><br/><br/
          </td>
          <td colspan="6">
            <strong>{{$nervousSystem}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
              <span>Ojos</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$eyes}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Oidos</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$ears}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Nodulos Linfaticos</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$lymphNodes}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Piel y Anexos</span><br/><br/>
          </td>
          <td colspan="6">
            <strong>{{$skin}}</strong>
          </td>
        </tr>
        </table>
      </center>
        <center><h4 style="color: #4f4f4f;">OBSERVACIONES GENERALES</h2></center>
        <center>
          <table border="0" style="margin:0 auto;">
        <tr>
          <td colspan="12">
            <strong>{{$observations}}</strong>
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Imagen Diagnostica</span><br/><br/>
            @if($imagen_diagnostica != 'none')
            <img src="{{URL::asset('uploads/images/')}}/{{$imagen_diagnostica}}" alt="..." style="width: 200px; height: 200px;">
            @else
            <strong>no se encontro Imagen Diagnostica</strong>
            @endif
          </td>
          <td colspan="6">
            <span>Resultado Laboratorio</span><br/><br/>
            @if($examen_laboratorio != 'none')
            <img src="{{URL::asset('uploads/images/')}}/{{$examen_laboratorio}}" alt="..." style="width: 200px; height: 200px;">
            @else
            <strong>no se encontraron resultados</strong>
            @endif
          </td>
        </tr>
        <tr>
          <td colspan="6">
            <span>Estado de la mascota</span><br/><br/>
            <strong>{{$state}}</strong>
          </td>
          <td colspan="6">
            <span>Nombre Medico Veterinario</span><br/><br/>
            <strong>{{$userVeterinary}}</strong>
          </td>
        </tr>
    </table>
</center>
</div>
</body>
</html>
