<div class="modal fade" id="deleteUser" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
  <div class="modal-dialog" style="background-color: white;">
    <div class="modal-body">

          <div class="row">
            {!! Form::open(array('url' => 'user/profile/delete/', 'method' => 'POST', 'class' => 'modal-content')) !!}
            <input type="hidden" name="userId" id="userId" value="">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              <span class="input-group-addon" style="background-color: white; border: white;">
              <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">Eliminar Usuario</h4>
              </span>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12">
                  <center><label>Desea eliminar el Usuario?</label></center>
                  <center><input class="btn btn-primary" type="submit" value="Eliminar"/></center>
                </div>
              </div>
              </div>
            </div>
            {!! Form::close() !!}
          </div>
    </div>
</div>
<!-- End Modal -->
</div>
