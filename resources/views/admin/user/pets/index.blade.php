@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.user')
@stop

@section('style')
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}">
<style media="screen">
@media (max-width: 800px) {
  .none-mobile{
    display: none;
  }
  .btn{
    width: 49% !important;
  }
  .btn-administrator{
    width: 100% !important;
  }
  header.panel-heading {
    height: 50px !important;
  }
  .input-group-addon, .input-group-btn {
    white-space: normal;
  }
  img.user-profile-img {
    width: 20%;
    border-radius: 100%;
  }
}
@media (min-width: 800px){
  .none-desktop{
    display: none;
  }
}
@media (max-width: 480px){
  img.user-profile-img {
    width: 70%;
    border-radius: 100%;
  }
  .btn-action-profile {
    font-size: 15px;
    width: 60% !important;
    height: 39px;
    vertical-align: middle !important;
  }
  .btn-action-profile {
    font-size: 17px;
    width: 60% !important;
    height: 35px;
    vertical-align: middle !important;
    line-height: 18px;
  }
}
</style>
@stop

@section('content')
<div class="row" style="padding-top: 10px;">
  <div class="col-xlg-6 col-md-6">
        <div class="page-header" style="padding:5px 10px;">
          <ol class="breadcrumb">
            <li><a href="/user">Inicio</a></li>
            <li class="active">Mascotas</li>
          </ol>
        </div>
  </div>
</div>
@foreach ($pets as $pet)
<?php
//imagen Mascota
$petImage = json_decode($pet->imageProfile);
// characteristics Pet
$CharacteristicsResult = json_decode($pet->characteristics);
if($CharacteristicsResult == ""){
  $medida = "Sin asignar";
  $Raza = "Sin asignar";
  $Color = "Sin asignar";
}else{
  $medida = $CharacteristicsResult->medida;
  $Raza = $CharacteristicsResult->raza;
  $Color = $CharacteristicsResult->color;
}

 ?>
<div class="row">
<div class="col-md-3">
  <!-- Page Widget -->
  <div class="widget widget-shadow text-center">
    <div class="widget-header" style="padding: 20px 0px;">
      <div class="widget-header-content">
        <a class="profile-img" href="javascript:void(0)">
          @if($petImage->img_profile != 'none')
          <img src="{{URL::asset('uploads/images/')}}/{{$petImage->img_profile}}" class="user-profile-img">
          @else
          <img src="{{URL::asset('admin/assets/images/pet-icon.png')}}" class="user-profile-img">
          @endif
        </a>
        <h4 class="profile-user">{{$pet->name}}</h4>
        <a href="/user/pets/edit/{{Crypt::encrypt($pet->id)}}" class="btn btn-icon btn-primary btn-action-profile" style="padding:6px; background-color: #ff0066 !important; border-color: #ff0066 !important;">
          Editar Mascota
        </a>
        <br>
        @if($pet->petStatus == 1)
          @if($pet->haveCode != true)
          <a href="#" class="btn btn-icon btn-primary btn-action-profile" data-toggle="modal" type="button" data-target="#notCodeModal">Perdi mi mascota</a>
          @else
          <a href="#" class="btn btn-icon btn-primary btn-action-profile" data-toggle="modal" type="button" onclick="setPetId('{{Crypt::encrypt($pet->id)}}')" data-target="#reportModal"><span class="flaticon-pet22"></span> Perdi mi mascota</a>
          @endif
        @else
        <a href="#" class="btn btn-icon btn-primary btn-action-profile" data-toggle="modal" type="button" onclick="setPetId('{{Crypt::encrypt($pet->id)}}')" data-target="#foundModal"><span class="flaticon-dog65"></span> Encontre mi mascota</a>
        @endif
      </div>
    </div>
  </div>
  <!-- End Page Widget -->
</div>
<div class="col-md-9">
  <!-- Panel -->
  <div class="panel">
    <div class="panel-body nav-tabs-animate nav-tabs-horizontal">
      <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
        <li class="active" role="presentation"><a data-toggle="tab" href="#profile-pet{{$pet->id}}" aria-controls="profile-pet"
          role="tab">Perfil Mascota</a></li>
          <li role="presentation"><a data-toggle="tab" href="#data-Veterinary{{$pet->id}}" aria-controls="data-Veterinary"
            role="tab">Datos Veterinaria</a></li>
      </ul>
    @if($pet->haveCode != TRUE AND $pet->petRequest != TRUE)
      <div class="block-option none-mobile" style="position: relative; bottom: 65px;">
        <a href="#" data-target="#codigosModal" data-toggle="modal" onclick="setPetId({{$pet->id}})" class="btn btn-icon btn-primary btn-add-option wb-agregar-codigos" style="padding:0px;background-color: #ffffff !important;"></a>
        <span class="title-btn">Solicitar Codigo</span>
      </div>
      <div class="block-option">
        <a href="#" class="btn btn-dark-identipet none-desktop" data-target="#codigosModal" data-toggle="modal" onclick="setPetId({{$pet->id}})" style="margin-top:23px;">Solicitar Codigo</a>
        <a href="/user/pets/add" class="btn btn-dark-identipet none-desktop" style="margin-top:23px;">Agregar Mascota</a>
      </div>
    @else
    <div class="block-option none-mobile" style="position: relative; bottom: 65px;">
      <a href="/user/pets/add" class="btn btn-icon btn-primary btn-add-option" style="padding:0px;background-color: #ffffff !important;">
        <img src="{{URL::asset('admin/assets/images/add-pet.png')}}" style="width:100%;">
      </a>
      <span class="title-btn">Agregar Mascota</span>
    </div>
    <div class="block-option">
      <a href="/user/pets/add" class="btn btn-dark-identipet none-desktop" style="margin-top:23px;">Agregar Mascota</a>
    </div>
    @endif
      <div class="tab-content">
        <div class="tab-pane active animation-slide-left" id="profile-pet{{$pet->id}}" role="profile-pet">
          <div class="row">
            <div class="row">
            <div class="col-sm-6">
                  <div class="media">
                    <div class="media-body">
                      <span>Codigo QR </span>
                      <br>
                      <h4 class="media-heading">
                        @if($pet->haveCode == TRUE)
                        <?php
                          $c = $code->getCodeByPet($pet->id);
                          echo $c;
                         ?>
                      @else
                        @if($pet->petRequest == TRUE)
                          Codigo Solicitado
                        @else
                          Sin asignar
                        @endif

                      @endif</h4>
                    </div>
                  </div>
                </div>
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Nombre de la Mascota</span>
                    <br>
                    <h4 class="media-heading">{{$pet->name}}</h4>
                  </div>
                </div>
              </div>
              </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Especie</span>
                    <br>
                      @if($pet->petType == 1)
                        <h4 class="media-heading">Canina</h4>
                      @elseif($pet->petType == 2)
                        <h4 class="media-heading">Fenina</h4>
                      @elseif($pet->petType == 3)
                        <h4 class="media-heading">Pez</h4>
                      @else
                        <h4 class="media-heading">Hamster</h4>
                      @endif
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Raza</span>
                    <br>
                    <h4 class="media-heading">
                      <?php
                      $raza = $characteristic->getRace($pet->id);
                      echo $raza;
                      ?>
                    </h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Genero</span>
                    <br>
                      @if($pet->gender == '1')
                        <h4 class="media-heading">Macho</h4>
                      @else
                        <h4 class="media-heading">Hembra</h4>
                      @endif
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Color</span>
                    <br>
                    <h4 class="media-heading">{{$Color}}</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Tamaño</span>
                    <br>
                    <h4 class="media-heading">{{$medida}}</h4>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Edad</span>
                    <br>
                    <h4 class="media-heading">{{$pet->age}} meses</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <a href="/user/pets/profile/{{Crypt::encrypt($pet->id)}}">
                    <img src="../admin/assets/images/2.png" style="width:10%;">
                    <span class="title-btn" style="display: -webkit-inline-box; color: #ff0066; vertical-align: center; font-weight: bold;">Mas Detalles</span>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @foreach ($veterinarians as $v)
        <div class="tab-pane animation-slide-left" id="data-Veterinary{{$pet->id}}" role="data-Veterinary">
          <div class="row">
            <div class="row">
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Nombre Veterinaria</span>
                    <br>
                    <h4 class="media-heading">{{$v->name}}</h4>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Sede</span>
                    <br>
                    <h4 class="media-heading">{{$v->nameHeadquarter}}</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Dirección</span>
                    <br>
                    <h4 class="media-heading">{{$v->address}}</h4>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Teléfono</span>
                    <br>
                    <h4 class="media-heading">{{$v->movil}}</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Correo Electrónico</span>
                    <br>
                    <h4 class="media-heading"><a href="mailto:{{$v->email}}">{{$v->email}}</a></h4>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="media">
                  <div class="media-body">
                    <span>Pagina Web</span>
                    <br>
                    <h4 class="media-heading"><a href="{{$v->url}}">{{$v->url}}</a></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- End Panel -->
</div>
</div>
@endforeach


      @include('admin.user.pets.create')
      @include('admin.user.pets.report')
      @include('admin.user.pets.notCode')
      @include('admin.user.pets.found')
      @include('admin.user.pets.codes')

</div>


<div class="row" data-plugin="matchHeight" data-by-row="true">

  <div class="block-option-add-responsive none-mobile" style="">
    <a href="/user/pets/add" class="btn btn-icon btn-primary btn-add-option" style="padding:0px;background-color: #ffffff !important;">
      <img src="{{URL::asset('admin/assets/images/add-pet.png')}}" style="width:100%;">
    </a>
    <span class="title-btn">Agregar Mascota</span>
  </div>
  <center>
    <div class="block-option none-desktop">
      <a href="/user/pets/add" class="btn btn-dark-identipet" style="margin-top:23px;margin-bottom:23px;">Agregar Mascota</a>
    </div>
  </center>

  <!-- Panel -->
  <div class="panel panel-desktop">
    <div class="panel-body nav-tabs-animate nav-tabs-horizontal">
      <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
        <li class="active" role="presentation"><a data-toggle="tab" href="#pets" aria-controls="pets" role="tab">Mascotas</a></li>
        <li class="" role="presentation"><a data-toggle="tab" href="#pets-report" aria-controls="pets-report" role="tab">Mascotas Perdidas</a></li>

      </ul>
      <div class="block-option none-mobile" style="position: relative; bottom: 65px;">
        <a href="/user/pets/add" class="btn btn-icon btn-primary btn-add-option" style="padding:0px;background-color: #ffffff !important;">
          <img src="{{URL::asset('admin/assets/images/add-pet.png')}}" style="width:100%;">
        </a>
        <span class="title-btn">Agregar Mascota</span>

      </div>
      <div class="block-option none-desktop">
        <a href="/user/pets/add" class="btn btn-dark-identipet" style="margin-top:23px;margin-bottom:23px;">Agregar Mascota</a>
      </div>

      <div class="tab-content" style="overflow: inherit !important;">
        <div class="tab-pane active animation-slide-left" id="pets" role="pets">
          <div class="row">
                <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable" id="dataTablePets">
                          <thead>
                              <tr>
                              <th>Estado</th>
                              <th>Codigo</th>
                              <th>Nombre</th>
                              <th>Especie</th>
                              <th>Raza</th>
                              <th>Genero</th>
                              <th>Color</th>
                              <th>Edad</th>
                              <th>Detalles</th>
                              </tr>
                          </thead>

                          <tbody>
                              @foreach($activePets as $pet)
                              <?php
                                $characteristics = json_decode($pet->characteristics);
                              ?>
                              <tr>
                              <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>
                                @if($pet->petStatus == 2)
                                  Perdido
                                @else
                                  Activo
                                @endif
                              </td>
                              <td>
                                @if($pet->haveCode == TRUE)
                                  {{$code->getCodeByPet($pet->id)}}
                                @else
                                  Sin Codigo
                                @endif
                              </td>


                              <td width="">{{$pet->name}}</td>
                              <td>

                                @if($pet->petType == 1)
                                  Canino
                                @elseif($pet->petType == 2)
                                  Felino
                                @elseif($pet->petType == 3)
                                  Pez
                                @else
                                  Hamster
                                @endif

                              </td>
                              <td>
                                <?php
                                $raza = $characteristic->getRace($pet->id);
                                echo $raza;
                                ?>
                              </td>
                              <td>
                                @if($pet->gender == '1')
                                  Macho
                                @else
                                  Hembra
                                @endif
                              </td>
                              <td>{{$characteristics->color}}</td>
                              <td>{{$pet->age}} Meses</td>



                              <td>
                                <div class="dropdown">
                                  <button type="button" class="btn dropdown-toggle btn-table btn-danger btn-outline" id="exampleColorDropdown6"
                                  data-toggle="dropdown" aria-expanded="false">Opciones
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="exampleColorDropdown6"
                                  role="menu">
                                    <li role="presentation"><a href="/user/pets/profile/{{Crypt::encrypt($pet->id)}}" role="menuitem">Detalles</a></li>
                                    @if($pet->haveCode == TRUE)
                                    <li role="presentation"><a href="#" role="menuitem" data-toggle="modal" type="button" onclick="setPetId('{{Crypt::encrypt($pet->id)}}')" data-target="#reportModal">Reportar</a></li>
                                    @else
                                    <li role="presentation"><a href="#" role="menuitem" type="button" data-target="#codigosModal" data-toggle="modal" onclick="setPetId({{$pet->id}})">Solicitar Codigo</a></li>
                                    @endif
                                  </ul>
                              </div>


                              </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>

          </div>
        </div>
        <div class="tab-pane animation-slide-left" id="pets-report" role="pets-report">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable" id="dataTablePetReport">
              <thead>
                  <tr>
                  <th>Estado</th>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Especie</th>
                  <th>Raza</th>
                  <th>Genero</th>
                  <th>Color</th>
                  <th>Edad</th>
                  <th>Opciones</th>
                  </tr>
              </thead>

              <tbody>
                  @foreach($reportPets as $pet)
                  <?php
                    $characteristics = json_decode($pet->characteristics);
                  ?>
                  <tr>
                  <td>
                    <i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>
                    @if($pet->petStatus == 2)
                      Perdido
                    @else
                      Activo
                    @endif
                  </td>
                  <td>
                    @if($pet->haveCode == TRUE)
                      {{$code->getCodeByPet($pet->id)}}
                    @else
                      Sin Codigo
                    @endif
                  </td>
                  <td width="">{{$pet->name}}</td>
                  <td>
                    @if($pet->petType == 1)
                      Canino
                    @elseif($pet->petType == 2)
                      Felino
                    @elseif($pet->petType == 3)
                      Pez
                    @else
                      Hamster
                    @endif

                  </td>
                  <td>
                    <?php
                    $raza = $characteristic->getRace($pet->id);
                    echo $raza;
                    ?>
                  </td>
                  <td>
                    @if($pet->gender == '1')
                      Macho
                    @else
                      Hembra
                    @endif
                  </td>
                  <td>{{$characteristics->color}}</td>
                  <td>{{$pet->age}}  Meses</td>



                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn dropdown-toggle btn-table btn-danger btn-outline" id="exampleColorDropdown6"
                      data-toggle="dropdown" aria-expanded="false">Opciones
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="exampleColorDropdown6"
                      role="menu">
                        <li role="presentation"><a href="/user/pets/profile/{{Crypt::encrypt($pet->id)}}" role="menuitem">Detalles</a></li>
                        <li role="presentation"><a href="/user/pets/profile/history/{{Crypt::encrypt($pet->id)}}" role="menuitem"  type="button" >Ver Reporte</a></li>
                        @if($pet->petStatus == 2)
                          <li role="presentation"><a href="#" role="menuitem" data-toggle="modal" type="button" onclick="setPetId('{{Crypt::encrypt($pet->id)}}')" data-target="#foundModal">La encontre!</a></li>
                        @endif
                      </ul>
                  </div>

                  </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>

        </div>



      </div>
    </div>
  </div>
  <!-- End Panel -->


    <div class="col-xlg-12 col-md-12 responsive-table">

      <div class="block-option responsive-none" style="position: relative; bottom: 65px;">
        <a href="/user/pets/add" class="btn btn-icon btn-primary btn-add-option" style="padding:0px;background-color: #ffffff !important;">
          <img src="{{URL::asset('admin/assets/images/add-pet.png')}}" style="width:100%;">
        </a>
        <span class="title-btn">Agregar Mascota</span>
      </div>

      <div class="row bg-movil">
        <h2>Mascotas</h2>
      </div>
      <table class="table table-hover responsive dataTable table-striped "  id="dataTablePetsMovil">
                <thead>
                    <tr>
                    <th>Estado</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Raza</th>
                    <th>Color</th>
                    <th>Edad</th>

                    <th>Genero</th>
                    <th>Tipo</th>
                    <th>Detalles</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($activePets as $pet)
                    <?php
                      $characteristics = json_decode($pet->characteristics);
                    ?>
                    <tr>
                    <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>
                      @if($pet->petStatus == 2)
                        Perdido
                      @else
                        Activo
                      @endif
                    </td>
                    <td>
                      @if($pet->haveCode == TRUE)
                        {{$code->getCodeByPet($pet->id)}}
                      @else
                        Sin Codigo
                      @endif
                    </td>


                    <td width="">{{$pet->name}}</td>
                    <td>
                      <?php
                      $raza = $characteristic->getRace($pet->id);
                      echo $raza;
                      ?>
                    </td>
                    <td>{{$characteristics->color}}</td>
                    <td>{{$pet->age}} Meses</td>

                    <td>
                      @if($pet->gender == '1')
                        Macho
                      @else
                        Hembra
                      @endif
                    </td>
                    <td>

                      @if($pet->petType == 1)
                        Perro
                      @elseif($pet->petType == 2)
                        Gato
                      @elseif($pet->petType == 3)
                        Pez
                      @else
                        Hamster
                      @endif

                    </td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle btn-table btn-danger btn-outline" id="exampleColorDropdown6"
                        data-toggle="dropdown" aria-expanded="false">Opciones
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="exampleColorDropdown6"
                        role="menu">
                          <li role="presentation"><a href="/user/pets/profile/{{Crypt::encrypt($pet->id)}}" role="menuitem">Detalles</a></li>
                          @if($pet->haveCode == TRUE)
                          <li role="presentation"><a href="#" role="menuitem" data-toggle="modal" type="button" onclick="setPetId('{{Crypt::encrypt($pet->id)}}')" data-target="#reportModal">Reportar</a></li>
                          @else
                          <li role="presentation"><a href="#" role="menuitem" type="button" data-target="#codigosModal" data-toggle="modal" onclick="setPetId({{$pet->id}})">Solicitar Codigo</a></li>
                          @endif
                        </ul>
                    </div>


                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

      <div class="row bg-movil">
        <h2>Mascotas Perdidas</h2>
      </div>
      <table class="table table-hover responsive dataTable table-striped " id="dataTablePetReportMovil">
          <thead>
              <tr>
              <th>Estado</th>
              <th>Codigo</TH>
              <th>Nombre </th>
              <th>Raza </th>
              <th>Color </th>
              <th>Edad</th>
              <th>Genero</th>
              <th>Especie</th>
              <th>Detalles</th>
              </tr>
          </thead>

          <tbody>
              @foreach($reportPets as $pet)
              <?php
                $characteristics = json_decode($pet->characteristics);
              ?>
              <tr>
              <td>
                <i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>
                @if($pet->petStatus == 2)
                  Perdido
                @else
                  Activo
                @endif
              </td>
              <td>
                @if($pet->haveCode == TRUE)
                  {{$code->getCodeByPet($pet->id)}}
                @else
                  Sin Codigo
                @endif
              </td>
              <td width="">{{$pet->name}}</td>
              <td>
                <?php
                $raza = $characteristic->getRace($pet->id);
                echo $raza;
                ?>
              </td>
              <td>{{$characteristics->color}}</td>
              <td>{{$pet->age}}  Meses</td>

              <td>
                @if($pet->gender == '1')
                  <h4 class="media-heading">Macho</h4>
                @else
                  <h4 class="media-heading">Hembra</h4>
                @endif
              </td>
              <td>

                @if($pet->petType == 1)
                  Perro
                @elseif($pet->petType == 2)
                  Gato
                @elseif($pet->petType == 3)
                  Pez
                @else
                  Hamster
                @endif

              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn dropdown-toggle btn-table btn-danger btn-outline" id="exampleColorDropdown6"
                  data-toggle="dropdown" aria-expanded="false">Opciones
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="exampleColorDropdown6"
                  role="menu">
                    <li role="presentation"><a href="/user/pets/profile/{{Crypt::encrypt($pet->id)}}" role="menuitem">Detalles</a></li>
                    <li role="presentation"><a href="/user/pets/profile/history/{{Crypt::encrypt($pet->id)}}" role="menuitem"  type="button" >Ver Reporte</a></li>
                    @if($pet->petStatus == 2)
                      <li role="presentation"><a href="#" role="menuitem" data-toggle="modal" type="button" onclick="setPetId('{{Crypt::encrypt($pet->id)}}')" data-target="#foundModal">La encontre!</a></li>
                    @endif
                  </ul>
              </div>

              </td>
              </tr>
              @endforeach
          </tbody>
      </table>

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


@stop

@section('script')
<script src="{{URL::asset('admin/global/js/components/select2.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/switchery.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/asspinner.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v2.js')}}"></script>

<script type="text/javascript">
$(document).ready(function($) {
$('#dataTablePets').DataTable( {
    responsive: true,
    language: {
      "sSearchPlaceholder": "Buscar ",
      "lengthMenu": "_MENU_",
      "search": "_INPUT_",
      "paginate": {
        "previous": '<i class="icon wb-chevron-left-mini"></i>',
        "next": '<i class="icon wb-chevron-right-mini"></i>'
      }
    }
} );

$('#dataTablePetReport').DataTable( {
    responsive: true,
    language: {
      "sSearchPlaceholder": "Buscar ",
      "lengthMenu": "_MENU_",
      "search": "_INPUT_",
      "paginate": {
        "previous": '<i class="icon wb-chevron-left-mini"></i>',
        "next": '<i class="icon wb-chevron-right-mini"></i>'
      }
    }
} );

$('#dataTablePetsMovil').DataTable( {
    responsive: true,
    language: {
      "sSearchPlaceholder": "Buscar ",
      "lengthMenu": "_MENU_",
      "search": "_INPUT_",
      "paginate": {
        "previous": '<i class="icon wb-chevron-left-mini"></i>',
        "next": '<i class="icon wb-chevron-right-mini"></i>'
      }
    }
} );

$('#dataTablePetReportMovil').DataTable( {
    responsive: true,
    language: {
      "sSearchPlaceholder": "Buscar ",
      "lengthMenu": "_MENU_",
      "search": "_INPUT_",
      "paginate": {
        "previous": '<i class="icon wb-chevron-left-mini"></i>',
        "next": '<i class="icon wb-chevron-right-mini"></i>'
      }
    }
} );
});
function setPetId(id){
  $('.petId').val(id);
  $('#petIdValue').val(id);
}


</script>

@stop
