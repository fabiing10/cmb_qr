<div class="panel" id="HClinicWizardFormContainer"style="display:none;">
    <div class="modal-body">

      <!-- Begin row Select Pet -->
        <input type="hidden" name="pet" id="pet" />
        <!-- Begin row Description -->
        <div class="row">
          <div class="col-lg-12">
              <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">
                  <span class="icon wb-book"></span>
                </span>
              <textarea class="form-control" name="description" rows="3" placeholder="Motivo de la cita"
              required=""></textarea>
              </div>
             </div>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
              <label>Fecha</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <span class="icon wb-calendar"></span>
                </span>
                <input type="text" class="form-control" data-plugin="datepicker" name="date" required="">

              </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Hora</label>
                <div class="input-group clockpicker-wrap" data-plugin="clockpicker">
                   <input type="text" class="timepicker form-control" data-plugin="clockpicker" data-autoclose="true" name="hour">
                  <span class="input-group-addon">
                    <span class="wb-time"></span>
                  </span>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
            <label>Veterinario</label>
            <span class="input-group-addon">
              <span class="icon wb-user"></span>
            </span>
            <input type="text" class="form-control" name="veterinary" placeholder="Nombre Medico" required="">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
            <label>Costo</label>
            <span class="input-group-addon">
              <span class="icon wb-payment"></span>
            </span>
            <input type="text" class="form-control" name="cost" placeholder="Costo consulta" required="">
            </div>
          </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-12 text-right padding-top-m">
              <button type="submit" class="btn btn-primary" id="validateButton1" style="margin: 0 auto;display: block;"><i class="icon wb-check"></i>Agendar Cita</button>
            </div>
        </div>
  </div>
</div>
