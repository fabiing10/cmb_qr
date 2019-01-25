@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.user')
@stop

@section('style')


<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/summernote/summernote.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/asspinner/asSpinner.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/select2/select2.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/formvalidation/formValidation.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/jquery-wizard/jquery-wizard.css')}}">
<style media="screen">

@media (max-width: 770px) {
  .none-mobile{
    display: none;
  }
  .btn-administrator{
    width: 100% !important;
  }
  header.panel-heading {
    height: 50px !important;
  }
}
@media (min-width: 770px){
  .none-desktop{
    display: none;
  }
}
@media (max-width: 812px){
  img.user-profile-img {
    width: 25% !important;
    border-radius: 100%;
  }
}
/* Phone Query */
@media (max-width: 480px){
  a.btn.btn-w80-p30 {
      width: 80%;
      padding: 3% !important;
  }

    img.user-profile-img {
      width: 70% !important;
      border-radius: 100%;
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
            <li><a href="/user">Inicio/</a></li>
          </ol>
        </div>
  </div>
</div>
<?php
$image = json_decode($user->imageProfile);
//Decode Values
$phonesResult = json_decode($user->phones);

if($phonesResult == ""){
  $phones = "Sin asignar";
}else{
  $phones = $phonesResult->phone;
}

?>

  @foreach ($pets as $pet)
  <?php
  //imagen Mascota
  $petImage = json_decode($pet->imageProfile);
  // characteristics Pet
  $CharacteristicsResult = json_decode($pet->characteristics);
  if($CharacteristicsResult == ""){
    $Characteristics = "Sin asignar";
    $Raza = "Sin asignar";
    $Color = "Sin asignar";
  }else{
    $Characteristics = $CharacteristicsResult->medida;
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
            <img src="admin/assets/images/pet-icon.png" class="user-profile-img">
            @endif
          </a>
          <h4 class="profile-user">{{$pet->name}}</h4>
          <br/>
          <a href="/user/pets/edit/{{Crypt::encrypt($pet->id)}}" class="btn btn-icon btn-primary btn-action-profile btn-w80-p30" style="padding:6px; background-color: #ff0066 !important; border-color: #ff0066 !important; margin-left: 4px;">
            Editar Mascota
          </a>
          <br>
          @if($pet->petStatus == 1)
            @if($pet->haveCode != true)
            <a href="#" class="btn btn-icon btn-primary btn-action-profile btn-w80-p30" data-toggle="modal" type="button" data-target="#notCodeModal"> Perdi mi mascota</a>
            @else
            <a href="#" class="btn btn-icon btn-primary btn-action-profile btn-w80-p30" data-toggle="modal" type="button" onclick="setPetId('{{Crypt::encrypt($pet->id)}}')" data-target="#reportModal"><span class="flaticon-pet22"></span> Perdi mi mascota</a>
            @endif
          @else
          <a href="#" class="btn btn-icon btn-primary btn-action-profile btn-w80-p30" data-toggle="modal" type="button" onclick="setPetId('{{Crypt::encrypt($pet->id)}}')" data-target="#foundModal"><span class="flaticon-dog65"></span> Encontre mi mascota</a>
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
        <div class="block-option none-mobile" style="position: relative; bottom: 65px;">
          <a href="/user/pets/add" class="btn btn-icon btn-primary btn-add-option" style="padding:0px; background-color: #ffffff !important;">
            <img src="admin/assets/images/add-pet.png" style="width:100%;">
          </a>
          <span class="title-btn">Agregar Mascota</span>
        </div>
        <div class="block-option">
          <a href="/user/pets/add" class="btn btn-dark-identipet none-desktop btn-w80-p30" style="margin-top:23px;">Agregar Mascota</a>
        </div>
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
                        <?php
                        $code_value = $code->getCodeByPet($pet->id);
                        if($code_value != "Sin Asignar"){
                          echo $code_value;
                        }else{
                          echo "Sin Asignar";
                        }
                         ?>
                      </h4>
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
                      <h4 class="media-heading">{{$Characteristics}}</h4>
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
                      <img src="admin/assets/images/2.png" style="width:10%;">
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
                      <span>Dirrecion</span>
                      <br>
                      <h4 class="media-heading">{{$v->address}}</h4>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="media">
                    <div class="media-body">
                      <span>Ciudad</span>
                      <br>
                      <h4 class="media-heading">{{$v->city}}</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="media">
                    <div class="media-body">
                      <span>Correo electronico</span>
                      <br>
                      <h4 class="media-heading">{{$v->email}}</h4>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="media">
                    <div class="media-body">
                      <span>Pagina Web</span>
                      <br>
                      <h4 class="media-heading">{{$v->url}}</h4>
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

  @include('admin.user.pets.report')
  @include('admin.user.pets.found')
  @include('admin.user.pets.notCode')
<!--
<!-- Modal -->
<!--
<div class="modal fade" id="userModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
role="dialog" tabindex="-1">
    <div class="modal-dialog">
    {!! Form::open(array('url' => 'user', 'method' => 'POST', 'class' => 'modal-content', 'enctype' => 'multipart/form-data')) !!}

    <input type="hidden" name="userId" id="userId" value="{{$user->id}}" />
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <span class="input-group-addon" style="background-color: white; border: white;">
            <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">Actualizar Perfil</h4>
            <br>
            @if($image->img_profile != 'none')
            <img src="{{URL::asset('uploads/images/')}}/{{$image->img_profile}}" class="user-profile-img" style="width: 180px;">
            @else
            <i class="glyphicon glyphicon-user profile-picture" aria-hidden="true"></i>
            @endif
            <input type="file" class="form-control" name="image" id="image">
        </span>
    </div>
    <div class="modal-body">
      <div class="row">
          <div class="col-lg-12 form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name="identification" placeholder="Identificacion" value="{{$user->identification}}">
            </div>
          </div>
      </div>
        <div class="row">
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="name" placeholder="Nombre"  value="{{$user->name}}">
              </div>
            </div>
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="lastName" placeholder="Apellido"  value="{{$user->lastName}}">
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="email" placeholder="Email"  value="{{$user->email}}">
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="phone" placeholder="Telefono " value="{{$phones}}">
              </div>
            </div>
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="address" placeholder="Direccion" value="{{$user->address}}">
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Username" disabled="" value="{{$user->username}}">
              </div>
            </div>
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12 pull-right">
            <input class="btn btn-primary submit-btn" type="submit" value="Actualizar Perfil"/>
          </div>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
</div>
-->
<!-- End Modal -->

@include('admin.user.pets.create')
@include('admin.user.pets.report')
@include('admin.user.pets.notCode')
@include('admin.user.pets.found')
@include('admin.user.pets.codes')

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
<script src="{{URL::asset('admin/global/js/components/datatables.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/jquery-wizard.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/forms/wizard.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/summernote.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v2.js')}}"></script>



<script type="text/javascript">

function setPetId(id){
  $('.petId').val(id);
  $('#petIdValue').val(id);
}

function getClinicHistory(Id){
  $.get( "clinicHistory/"+Id).done(function(data) {

      //document.getElementById("razon").innerHTML =data.description;

      reference = $.parseJSON(data.reference);
      //Set Reference
      $("#veterinary").html(reference.veterinary);
      $("#state").html(reference.state);
      $("#userVeterinary").html(reference.userVeterinary);
      $("#date").html(reference.date);
      $("#observations").html(reference.observations);

      //Set Characteristics
      characteristics = $.parseJSON(data.characteristics);

      $("#diet").html(characteristics.diet);
      $("#reproductiveStatus").html(characteristics.reproductiveStatus);
      $("#vaccines").html(characteristics.vaccines);
      $("#cleaning").html(characteristics.cleaning);
      $("#products").html(characteristics.products);
      $("#dateProduct").html(characteristics.dateProduct);
      $("#origin").html(characteristics.origin);
      $("#weight").html(characteristics.weight);
      $("#temperature").html(characteristics.temperature);
      $("#hearRate").html(characteristics.hearRate);
      $("#breathingFrequency").html(characteristics.breathingFrequency);
      $("#capilaryRefillTime").html(characteristics.capilaryRefillTime);
      $("#mucous").html(characteristics.mucous);
      $("#skinTugor").html(characteristics.skinTugor);
      $("#pulse").html(characteristics.pulse);
      $("#other").html(characteristics.other);
      $("#anamenesis").html(characteristics.anamenesis);
      $("#diseases").html(characteristics.diseases);
      $("#attitude").html(characteristics.attitude);
      $("#bodyCondition").html(characteristics.bodyCondition);
      $("#hydration").html(characteristics.hydration);
      $("#locomotion").html(characteristics.locomotion);
      $("#respiratorySystem").html(characteristics.respiratorySystem);
      $("#digestiveSystem").html(characteristics.digestiveSystem);
      $("#genitourinarySystem").html(characteristics.genitourinarySystem);
      $("#eyes").html(characteristics.eyes);
      $("#ears").html(characteristics.ears);
      $("#lymphNodes").html(characteristics.lymphNodes);
      $("#skin").html(characteristics.skin);
      $("#skeletalMuscle").html(characteristics.skeletalMuscle);
      $("#nervousSystem").html(characteristics.nervousSystem);
      $("#cardiovascularSystem").html(characteristics.cardiovascularSystem);
  });

}
(function() {
  $("#btnHistoryClinic").click(function(){
      $("#HClinicWizardFormContainer").fadeIn();
  });

  var defaults = $.components.getDefaults("wizard");
  var options = $.extend(true, {}, defaults, {
    onInit: function() {
      $('#HClinicFormContainer').formValidation({
        framework: 'bootstrap',
        fields: {
          username: {
            validators: {
              notEmpty: {
                message: 'The username is required'
              }
            }
          }
        }
      });
    },
    validator: function() {
      var fv = $('#HClinicFormContainer').data('formValidation');

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

    $("#sendForm").trigger( "click" );


    },
    buttonsAppendTo: '.panel-body'
  });

  $("#HClinicWizardFormContainer").wizard(options);

})();


</script>
@stop
