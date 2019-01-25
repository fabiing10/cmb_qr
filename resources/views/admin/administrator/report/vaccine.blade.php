<html>
<head>
  <title>Reporte Vacunas</title>
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
  <center><h2 style="color: #ff0066;">RESUMEN VACUNA</h2></center>
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
  <td><span>Mascota</span></td>
  <td><strong>{{$pet['name']}}</strong></td>
</tr>
<tr>
  <td><span>Fecha</span></td>
  <td><strong>{{$vaccine->date}}</strong></td>
</tr>
<tr>
  <td><span>Edad Mascota</span></td>
  <td><strong>{{$vaccine->agePet}} Meses</strong></td>
</tr>
<tr>
  <td><span>Tipo:</span></td>
  <td><strong>{{$vaccine->typeVaccine}}</strong></td>
</tr>

<tr>
  <td><span>Nombre:</span></td>
  <td>
    <ul>
      <?php
      $vacunas = json_decode($vaccine->vaccines);
      $value = count($vacunas);
      for ($i=0; $i < $value; $i++) {
        echo "<li>".$vacunas[$i]."</li>";
      }
      ?>
    </ul>
  </td>
</tr>

<tr>
  <td><span>Lote:</span></td>
  <td><strong>{{$vaccine->lote}}</strong></td>
</tr>
<tr>
  <td><span>Laboratorio</span></td>
  <td><strong>{{$vaccine->laboratory}}</strong></td>
</tr>
<tr>
  <td><span>Sticker</span></td>
</tr>
<tr>
  <td colspan="2">@if($vaccine->sticker != 'none')
  <img src="{{URL::asset('uploads/images/')}}/{{$vaccine->sticker}}" alt="..." style="width: 200px; height: 200px;">
  @else
  <strong>no se encontraron resultados</strong>
  @endif</td>
</tr>
</table>
</center>



</div>
</body>
</html>
