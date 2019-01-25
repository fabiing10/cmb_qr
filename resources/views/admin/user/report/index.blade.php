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
  <title>Reporte</title>
</head>
<body>
  <style media="screen">
    td{
      padding: 20px;
      width: 200px;
      text-align: center;
    }
    body{
      background-color: #f1f4f5;
      font-family: Roboto,sans-serif;
    }
    .row{
      background-color: white;
      margin: 50px;
      padding: 50px;
    }
    span{
      color: #76838f;
    }
    .img_profile{
      width: 100px;
      height: 100px;
    }
  </style>
<div class="row">
  <?php
  //Decode Values
  $profile = json_decode($pet->imageProfile);
  ?>
  <div class="widget widget-shadow text-center">
    <div class="widget-header" style="padding: 20px 0px;">
      <div class="widget-header-content">
        <a class="avatar avatar-full" href="javascript:void(0)">

          @if($profile->img_profile != 'none')
          <center><img src="{{URL::asset('uploads/images/')}}/{{$profile->img_profile}}" alt="..." class="img_profile"></center>
          @else
          <center><img src="{{URL::asset('admin/assets/images/pet-icon.png')}}" alt="..." class="img_profile"></center>
          @endif
        </a>
      </div>
    </div>
  </div>
<center><h2 style="color: #ff0066;">RESUMEN HISTORIA CLINICA ({{$pet->name}})</h2></center>
<center><h4 style="color: #4f4f4f;">INFORMACION BASICA</h2></center>
<center><table>
<tr>
  <td colspan="6">
    <span>Dieta</span><br/><br/>
    <strong>{{$diet}}</strong>
  </td>
  <td colspan="6">
    <span>Procedencia</span><br/><br/>
    <strong>{{$origin}}</strong>
  </td>
</tr>
<tr>
  <td colspan="6">
    <span>Vacunas</span><br/><br/>
    <strong>{{$vaccines}}</strong>
  </td>
  <td colspan="6">
    <span>Desparacitaciones</span><br/><br/>
    <strong>{{$cleaning}}</strong>
  </td>
</tr>
<tr>
  <td colspan="6">
    <span>Productos</span><br/><br/>
    <strong>{{$products}}</strong>
  </td>
  <td colspan="6">
    <span>Fecha</span><br/><br/>
    <strong>{{$date}}</strong>
  </td>
</tr>
</table></center>
<center><h4 style="color: #4f4f4f;">EXAMEN CLINICO BASICO</h2></center>
<center><table>
<tr>
  <td colspan="6">
    <span>Actitud</span><br/><br/>
    <strong>{{$attitude}}</strong>
  </td>
  <td colspan="6">
    <span>Condicion Corporal</span><br/><br/>
    <strong>{{$bodyCondition}}</strong>
  </td>
</tr>
<tr>
  <td colspan="6">
    <span>Peso</span><br/><br/>
    <strong>{{$weight}}</strong>
  </td>
  <td colspan="6">
    <span>Hidratacion</span><br/><br/>
    <strong>{{$hydration}}</strong>
  </td>
</tr>
<tr>
  <td colspan="6">
    <span>Temperatura</span><br/><br/>
    <strong>{{$temperature}}</strong>
  </td>
  <td colspan="6">
    <span>Pulso</span><br/><br/>
    <strong>{{$pulse}}</strong>
  </td>
</tr>
<tr>
  <td colspan="6">
    <span>Frecuencia Cardiaca</span><br/><br/>
    <strong>{{$hearRate}}</strong>
  </td>
  <td colspan="6">
    <span>Frecuencia Respiratoria</span><br/><br/>
    <strong>{{$breathingFrequency}}</strong>
  </td>
</tr>
<tr>
  <td colspan="6">
      <span>Mucosas</span><br/><br/>
    <strong>{{$mucous}}</strong>
  </td>
  <td colspan="6">
    <span>Tiempo de llenado Capilar</span><br/><br/>
    <strong>{{$capilaryRefillTime}}</strong>
  </td>
</tr>
</table></center>
<center><h4 style="color: #4f4f4f;">ANAMNESIS</h2></center>
<center><table>
<tr>
  <td colspan="6">
    <span>Anamnesis</span><br/><br/>
    <strong>{{$anamenesis}}</strong>
  </td>
</tr>
<tr>
  <td colspan="6">
    <span>Enfermedades o procedimientos anteriores</span><br/><br/>
    <strong>{{$diseases}}</strong>
  </td>
</tr>
</table></center>
<center><h4 style="color: #4f4f4f;">EXAMEN POR SISTEMA</h2></center>
<center><table>
<tr>
  <td colspan="6">
    <span>Locomocion</span><br/><br/>
    <strong>{{$locomotion}}</strong>
  </td>
  <td colspan="6">
    <span>Musculo Esqueletico</span><br/><br/>
    <strong>{{$skeletalMuscle}}</strong>
  </td>
</tr>
<tr>
  <td colspan="6">
    <span>Sistema Respiratorio</span><br/><br/>
    <strong>{{$respiratorySystem}}</strong>
  </td>
  <td colspan="6">
    <span>Sistema Dijestivo</span><br/><br/>
    <strong>{{$digestiveSystem}}</strong>
  </td>
</tr>
<tr>
  <td colspan="6">
    <span>Sistema Genitourinario</span><br/><br/>
    <strong>{{$genitourinarySystem}}</strong>
  </td>
  <td colspan="6">
    <span>Estado Reproductivo</span><br/><br/>
    <strong>{{$reproductiveStatus}}</strong>
  </td>
</tr>
<tr>
  <td colspan="6">
    <span>Sistema Cardiovascular</span><br/><br/>
    <strong>{{$cardiovascularSystem}}</strong>
  </td>
  <td colspan="6">
    <span>Sistema Nervioso</span><br/><br/>
    <strong>{{$nervousSystem}}</strong>
  </td>
</tr>
<tr>
  <td colspan="6">
      <span>Ojos</span><br/><br/>
    <strong>{{$eyes}}</strong>
  </td>
  <td colspan="6">
    <span>Oidos</span><br/><br/>
    <strong>{{$ears}}</strong>
  </td>
</tr>
<tr>
  <td colspan="6">
    <span>Nodulos Linfaticos</span><br/><br/>
    <strong>{{$lymphNodes}}</strong>
  </td>
  <td colspan="6">
    <span>Piel y Anexos</span><br/><br/>
    <strong>{{$skin}}</strong>
  </td>
</tr>
</table></center>
<center><h4 style="color: #4f4f4f;">OBSERVACIONES GENERALES</h2></center>
<center><table>
<tr>
  <td colspan="6">
    <span>Observaciones Generales</span><br/><br/>
    <strong>{{$observations}}</strong>
  </td>
</tr>
<tr>
  <td colspan="6">
    <span>Imagen Diagnostica</span><br/><br/>
    @if($imagen_diagnostica != 'none')
    <img src="{{URL::asset('uploads/images/')}}/{{$imagen_diagnostica}}" alt="...">
    @else
    <strong>no se encontro Imagen Diagnostica</strong>
    @endif
  </td>
  <td colspan="6">
    <span>Resultado Laboratorio</span><br/><br/>
    @if($examen_laboratorio != 'none')
    <img src="{{URL::asset('uploads/images/')}}/{{$examen_laboratorio}}" alt="...">
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
</table></center>
</div>
</body>
</html>
