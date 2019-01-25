<!-- Modal -->
<div class="modal fade" id="deleteFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
role="dialog" tabindex="-1">
    <div class="modal-dialog">
    {!! Form::open(array('url' => 'control/users/delete', 'method' => 'POST', 'class' => 'modal-content', 'autocomplete' => 'off' )) !!}

    <input type="hidden" name="userDelete" id="userDelete" value="" />
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <span class="input-group-addon" style="background-color: white; border: white;">
            <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">Eliminar Cliente</h4>
            <br><i class="icon wb-warning" aria-hidden="true" style="font-size: 30px"></i>

        </span>
        <p style="text-align: center;font-size: 12px;">Para eliminar un usuario debes estar seguro de hacerlo, se perderan todos sus datos e Informacion contenida en nuestro sistema. Porfavor digita el email del usuario que vas a eliminar para comprobar que estas seguro de esta decision.</p>
    </div>
    <div class="modal-body">
      <div class="row">
          <div class="col-lg-12 form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="icon fa-inbox" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name="email" placeholder="Email" required>
            </div>
          </div>
      </div>

        <div class="row">
          <div class="col-sm-12 pull-right">
            <input class="btn btn-primary submit-btn" type="submit" value="Eliminar Usuario"/>
          </div>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
</div>
<!-- End Modal -->
