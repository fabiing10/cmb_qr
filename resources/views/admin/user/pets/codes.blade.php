<!-- Modal -->
<div class="modal fade" id="codigosModal" aria-hidden="false" aria-labelledby="codigosModal"
role="dialog" tabindex="-1">
  <div class="modal-dialog">

      {!! Form::open(array('url' => 'user/pets/request', 'method' => 'POST', 'class' => 'modal-content')) !!}
      <div class="modal-header">
    
        <input type="hidden" name="petId" id="petIdValue" />
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <span class="input-group-addon" style="background-color: white; border: white;">
        <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">Crear Codigos</h4>
        </span>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <center><label>Desea Solicitar un codigo para su mascota?</label></center>
            <center><input class="btn btn-primary" type="submit" value="Solicitar Codigo"/></center>
          </div>
        </div>
        </div>
      </div>
      {!! Form::close() !!}
  </div>
<!-- End Modal -->
