<div class="modal fade" id="detailVaccines" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
  <div class="modal-dialog" style="background-color: white;">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <span class="input-group-addon" style="background-color: white; border: white;">
      <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">Vaunas</h4>
      <i class="icon fa-file" aria-hidden="true" style="font-size: 30px"></i>
      </span>
    </div>
    <div class="modal-body">
          <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                   <label class="control-label" style="font-weight: bold;">Mascota:</label>
                   <span id="namePet">{{$pet->name}}</span>
                  </div>
                  <div class="form-group">
                    <label class="control-label" style="font-weight: bold;">Laboratorio:</label>
                    <span id="laboratory"></span>
                  </div>
                  <div class="form-group">
                    <label class="control-label" style="font-weight: bold;">Tipo Vacuna:</label>
                    <span id="typeVaccine"></span>
                  </div>
                  <div class="form-group">
                    <label class="control-label" style="font-weight: bold;">Edad Mascota:</label>
                    <span id="agePet"></span>
                  </div>
                  <!--<div class="form-group">
                    @if($image->img_profile != 'none')
                    <img src="{{URL::asset('uploads/images/')}}/{{$image->img_profile}}" class="img-profile-pet">
                    @else
                    <img src="{{URL::asset('admin/assets/images/pet-icon.png')}}" class="img-profile-pet">
                    @endif
                  </div>-->
                </div>
                <div class="col-lg-6">

                  <div class="form-group">
                    <label class="control-label" style="font-weight: bold;">Fecha:</label>
                    <span id="fecha"></span>
                  </div>
                  <div class="form-group">
                    <label class="control-label" style="font-weight: bold;">Lote:</label>
                    <span id="lote"></span>
                  </div>
                  <div class="form-group">
                    <label class="control-label" style="font-weight: bold;">Vacuna:</label>
                    <ul id="vaccines_value"></ul>
                  </div>
                </div>
          </div>
    </div>
</div>
<!-- End Modal -->
</div>
