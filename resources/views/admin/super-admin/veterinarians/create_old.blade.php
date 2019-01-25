

<!-- Modal -->
<div class="modal fade" id="veterinaryModal" aria-hidden="false" aria-labelledby="veterinaryModal"
role="dialog" tabindex="-1">
  <div class="modal-dialog">

      {!! Form::open(array('url' => 'control/veterinary', 'method' => 'POST', 'class' => 'modal-content', 'id' => 'form-veterinary', 'autocomplete' => 'off')) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <span class="input-group-addon" style="background-color: white; border: white;">
        <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">Nueva Veterinaria</h4>
        </span>
      </div>
      <div class="modal-body">
        <input type="hidden" name="active_tab" id="active_tab" value="veterinary" />
        <div class="panel-veterinary">
            <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="icon fa-paw" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="name" placeholder="Nombre Veterinaria" autocomplete="off" required>
                      </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="icon fa-user" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="country" placeholder="Pais" autocomplete="off">
                      </div>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon fa-map-marker" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="address" placeholder="Dirección">
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
                          <span class="input-group-addon"><i class="icon fa-paw" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="identification" placeholder="Rut Veterinaria">
                      </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="icon fa-phone" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="phone" placeholder="Teléfono">
                      </div>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="icon fa-envelope" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="email" placeholder="Correo Electrónico">
                      </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="icon fa-lock" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="url" placeholder="Pagina Web">
                      </div>
                  </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <button class="btn btn-primary next-btn center-btn" type="button">Siguiente</button>
                </div>

            </div>
        </div>

        <div class="panel-option" style="display:none;">
          <div class="row">
            <div class="alert alert-icon alert-primary alert-dismissible" role="alert">

              <i class="icon wb-user" aria-hidden="true"></i> Deseas generar un usuario administrador a la veterinaria?
              <p class="margin-top-15">
                <button class="btn btn-primary next-to-admin" type="button">Crear Usuario</button>
                <button class="btn btn-primary btn-outline next-to-finish" type="button">No, lo hare despues.</button>
              </p>
            </div>
          </div>
        </div>


        <div class="panel-administrator" style="display:none;">
          <div class="row">
              <div class="col-lg-12 form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="identificationAdmin" placeholder="Identificacion">
                </div>
              </div>
          </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="nameAdmin" placeholder="Nombre ">
                  </div>
                </div>
                <div class="col-lg-6 form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="lastNameAdmin" placeholder="Apellido">
                  </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="emailAdmin" placeholder="Email">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="phoneAdmin" placeholder="Telefono ">
                  </div>
                </div>
                <div class="col-lg-6 form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="addressAdmin" placeholder="Direccion">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="usernameAdmin" placeholder="Username " autocomplete="off">
                  </div>
                </div>
                <div class="col-lg-6 form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                    <input type="password" class="form-control" name="passwordAdmin" placeholder="Password" autocomplete="off">
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-sm-12 pull-right">
                <input class="btn btn-primary submit-btn center-btn" type="submit" value="Guardar"/>
              </div>
            </div>
        </div>

      </div>
      {!! Form::close() !!}

  </div>
</div>
<!-- End Modal -->
