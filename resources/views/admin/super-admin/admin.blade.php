@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.admin')
@stop

@section('style')
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/asspinner/asSpinner.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/select2/select2.css')}}">
@stop


@section('content')
<div class="row" data-plugin="matchHeight" data-by-row="true">
    <div class="col-xlg-12 col-md-12">


        <button class="btn btn-primary" data-target="#exampleFormModal" data-toggle="modal"
        type="button"><i class="site-menu-icon wb-user-add" aria-hidden="true"></i>Nuevo Administrador</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
        role="dialog" tabindex="-1">
            <div class="modal-dialog">
            {!! Form::open(array('url' => 'control/admin', 'method' => 'POST', 'class' => 'modal-content')) !!}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="input-group-addon" style="background-color: white; border: white;">
                    <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">Crear Administrador</h4>
                    <i class="icon fa-male" aria-hidden="true" style="font-size: 30px"></i>
                </span>
            </div>
            <div class="modal-body">
              <div class="row">
                  <div class="col-lg-12 form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="identification" placeholder="Identificacion">
                    </div>
                  </div>
              </div>
                <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="name" placeholder="Nombre ">
                      </div>
                    </div>
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="lastName" placeholder="Apellido">
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="email" placeholder="Email">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="phone" placeholder="Telefono ">
                      </div>
                    </div>
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="address" placeholder="Direccion">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 form-group">
                      <div class="form-group">
                      <label>Porfavor Seleccione la veterinaria</label>
                        <select class="form-control" data-plugin="select2" name="veterinary">
                          <optgroup label="Veterinarias" id="veterinary_list">
                            @foreach($veterinary as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                          </optgroup>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="username" placeholder="Username ">
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
                    <input class="btn btn-primary submit-btn" type="submit" value="Crear Administrador"/>
                  </div>
                </div>
            </div>
            {!! Form::close() !!}
            </div>
        </div>
        <!-- End Modal -->


    <!-- Fin boton formulario-->
    </div>
    <div class="col-xlg-12 col-md-12">
        <!-- tabla veterinarias -->
        <div class="panel">
                <header class="panel-heading">
                  <div class="panel-actions"></div>
                  <br>
                </header>
                <div class="panel-body">
                  <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                      <tr>
                        <th>Identificacion</th>
                        <th>Nombre y Apellido</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Veterinaria</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($administrators as $administrator)
                      <tr>
                        <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i>{{$administrator->identification}}</td>
                        <td>{{$administrator->name}} {{$administrator->lastName}}</td>
                        <td>{{$administrator->username}}</td>
                        <td>{{$administrator->email}}</td>

                        <td>{{$administrator->veterinaryName}}</td>
                        <td></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
        <!-- fin tabla veterinarias -->
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
<script src=".{{URL::asset('admin/global/vendor/bootbox/bootbox.js')}}"></script>

<script src="{{URL::asset('admin/global/vendor/select2/select2.full.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/switchery/switchery.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/asspinner/jquery-asSpinner.min.js')}}"></script>

@stop

@section('script')

<script src="{{URL::asset('admin/global/js/components/select2.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/switchery.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/asspinner.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/datatables.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v2.js')}}"></script>


@stop
