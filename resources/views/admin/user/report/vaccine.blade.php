<html>
<head>
  <title>Reporte Vacunas</title>
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
<center><h2 style="color: #ff0066;">RESUMEN VACUNA ({{$pet->name}})</h2></center>
<center><h4 style="color: #4f4f4f;">INFORMACION BASICA</h2></center>
<center>
  <table>
<tr>
    <td colspan="6">
    <span>Tipo Vacuna</span><br/><br/>
    <strong>{{$vaccine->typeVaccine}}</strong><br/><br/>
    <span>Vacunas</span><br/><br/>
    <ul>
      <?php $vacunas = json_decode($vaccine->vaccines);
  $value = count($vacunas);
      for ($i=0; $i < $value; $i++) {
        echo "<li>".$vacunas[$i]."</li>";
      //  echo $vacunas[$i];
     }
      ?>

    </ul>
  </td>
    <td colspan="6">
      <span>Sticker</span><br/><br/>
      @if($vaccine->sticker != 'none')
      <img src="{{URL::asset('uploads/images/')}}/{{$vaccine->sticker}}" alt="..." style="width: 200px; height: 200px;">
      @else
      <strong>no se encontraron resultados</strong>
      @endif
    </td>
</tr>
<tr>
  <td colspan="6">
    <span>Edad Mascota</span><br/><br/>
    <strong>{{$vaccine->agePet}}</strong>
  </td>
  <td colspan="6">
    <span>Lote</span><br/><br/>
    <strong>{{$vaccine->lote}}</strong>
  </td>
</tr>
<tr>
  <td colspan="6">
    <span>Laboratorio</span><br/><br/>
    <strong>{{$vaccine->laboratory}}</strong>
  </td>
  <td colspan="6">
    <span>Fecha</span><br/><br/>
    <strong>{{$vaccine->date}}</strong>
  </td>
</tr>
</table>
</center>
</div>
</body>
</html>
