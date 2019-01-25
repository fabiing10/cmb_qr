<!-- Modal -->
<div class="modal fade" id="createFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
role="dialog" tabindex="-1">
    <div class="modal-dialog">
    {!! Form::open(array('url' => 'administrator/clients', 'method' => 'POST', 'class' => 'modal-content', 'autocomplete' => 'off')) !!}

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <span class="input-group-addon" style="background-color: white; border: white;">
            <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">Crear Cliente</h4>
            <br><i class="icon fa-male" aria-hidden="true" style="font-size: 30px"></i>
        </span>
    </div>
    <div class="modal-body">
      <div class="row">
          <div class="col-lg-12 form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name="identification" placeholder="Identificacion" required>
            </div>
          </div>
      </div>
        <div class="row">
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="name" placeholder="Nombre" required>
              </div>
            </div>
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="lastName" placeholder="Apellido" required>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="email" placeholder="Correo Electronico" required>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="phone" placeholder="Telefono" required>
              </div>
            </div>
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="address" placeholder="Direccion" required>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Nombre Usuario" required>
              </div>
            </div>
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12 pull-right">
            <input class="btn btn-primary submit-btn" type="submit" value="Crear Cliente"/>
          </div>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
</div>
<!-- End Modal -->
