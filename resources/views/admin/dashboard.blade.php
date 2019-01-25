@extends('admin.layouts.master')

@section('menu')
@include('admin.layouts.menu.admin')
@stop


@section('content')
<div class="row" data-plugin="matchHeight" data-by-row="true">
    <div class="col-xlg-8 col-md-12">
      <!-- boton formulario-->
                    <div class="example-wrap">
                <div class="example">
                  <button class="btn btn-primary" data-target="#exampleFormModal" data-toggle="modal"
                  type="button"><i class="site-menu-icon wb-add-file" aria-hidden="true"></i>Nueva Veterinaria</button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      {!! Form::open(array('url' => 'control/veterinaria', 'method' => 'POST', 'class' => 'modal-content')) !!}
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <span class="input-group-addon" style="background-color: white; border: white;">
                        <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">Nueva Veterinaria</h4>
                        <i class="icon fa-cube" aria-hidden="true" style="font-size: 30px"></i>
                        </span>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-6 form-group">
                          <div class="form-group">
                          <div class="input-group">
                          <span class="input-group-addon">
                          <i class="icon fa-paw" aria-hidden="true"></i>
                          </span>

                          <input type="text" class="form-control" name="name" placeholder="Nombre Veterinaria">
                          </div>
                          </div>
                          <div class="form-group">
                          <div class="input-group">
                          <span class="input-group-addon">
                          <i class="icon fa-user" aria-hidden="true"></i>
                          </span>
                          <input type="text" class="form-control" name="country" placeholder="Pais">
                          </div>
                          </div>
                          <div class="form-group">
                          <div class="input-group">
                          <span class="input-group-addon">
                          <i class="icon fa-map-marker" aria-hidden="true"></i>
                          </span>
                            <input type="text" class="form-control" name="address" placeholder="Dirección">
                          </div>
                          </div>
                          <div class="form-group">
                          <div class="input-group">
                          <span class="input-group-addon">
                          <i class="icon fa-building" aria-hidden="true"></i>
                          </span>
                            <input type="text" class="form-control" name="city" placeholder="Ciudad">
                          </div>
                          </div>
                          </div>
                          <div class="col-lg-6 form-group">
                            <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                            <i class="icon fa-paw" aria-hidden="true"></i>
                            </span>
                            <input type="text" class="form-control" name="identification" placeholder="Rut Veterinaria">
                            </div>
                            </div>
                          <div class="form-group">
                          <div class="input-group">
                          <span class="input-group-addon">
                          <i class="icon fa-phone" aria-hidden="true"></i>
                          </span>
                            <input type="text" class="form-control" name="phone" placeholder="Teléfono">
                          </div>
                          </div>
                          <div class="form-group">
                          <div class="input-group">
                          <span class="input-group-addon">
                          <i class="icon fa-envelope" aria-hidden="true"></i>
                          </span>
                            <input type="text" class="form-control" name="email" placeholder="Correo Electrónico">
                          </div>
                          </div>
                          <div class="form-group">
                          <div class="input-group">
                          <span class="input-group-addon">
                          <i class="icon fa-lock" aria-hidden="true"></i>
                          </span>
                            <input type="text" class="form-control" name="url" placeholder="Pagina Web">
                          </div>
                          </div>
                           <div class="col-sm-12 pull-right">
                            <input class="btn btn-primary" type="submit" value="Guardar"/>
                          </div>
                           </div>

                        </div>
                      </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
                  <!-- End Modal -->
                </div>
              </div>
      <!-- Fin boton formulario-->
    </div>
    <div class="col-xlg-6 col-md-12">
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
                        <th>Veterinaria</th>
                        <th>Administrador</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><i class="icon fa-angle-right responsive-icon arrow-function" aria-hidden="true" style="display:none;font-size: 22px;" data-selected="right"></i></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
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
@stop

@section('script')

<script src="{{URL::asset('admin/global/js/components/datatables.js')}}"></script>


@stop
