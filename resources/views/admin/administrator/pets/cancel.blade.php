<div class="modal fade" id="cancelAppoiment" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
  <div class="modal-dialog" style="background-color: white;">
    <div class="modal-body">

          <div class="row">
            {!! Form::open(array('url' => 'administrator/appointments/cancel', 'method' => 'POST', 'class' => 'modal-content')) !!}
            <input type="hidden" name="idAppointment" id="idAppointment" value="">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              <span class="input-group-addon" style="background-color: white; border: white;">
              <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">Cancelar Cita</h4>
              </span>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12">
                  <center><label>Desea Cancelar la Cita Medica?</label></center>
                  <center><input class="btn btn-primary" type="submit" value="Cancelar"/></center>
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
