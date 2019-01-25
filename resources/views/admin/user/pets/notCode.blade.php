<div class="modal fade" id="notCodeModal" aria-hidden="false" aria-labelledby="notCodeModal" role="dialog" tabindex="-1">
<div class="modal-dialog">
{!! Form::open(array('url' => 'user/pet/report', 'method' => 'POST', 'class' => 'modal-content')) !!}
<input type="hidden" name="petId" class="petId" />
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
  </button>
  <span class="input-group-addon" style="background-color: white; border: white;">
      <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">Lo sentimos! Te ayudaremos a Encontrar tu mascota!</h4>
      <i class="icon fa-male" aria-hidden="true" style="font-size: 30px"></i>
  </span>
</div>
<div class="modal-body">

  <div class="row">
      <div class="col-lg-12 form-group">
        <label>Usted no puede reportar una mascota que no tenga codigo asignado, el codigo es vital y esencial para todos los servicios de la aplicacion</p>
      </div>
  </div>
</div>
{!! Form::close() !!}
</div>
</div>
