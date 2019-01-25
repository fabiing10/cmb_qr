<div class="modal fade" id="reportModal" aria-hidden="false" aria-labelledby="reportModal" role="dialog" tabindex="-1">
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
        <label>Realizaremos el reporte de tu mascota, necesitamos contar con mayor informacion para poder difundirlo en nuestra comunidad.</p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
          <textarea type="text" class="form-control" cols="80" name="description" placeholder="Descripcion de perdida"></textarea>
        </div>
      </div>

  </div>
  <div class="row">
    <div class="col-sm-12 pull-right">
      <input class="btn btn-primary submit-btn" type="submit" value="Reportar"/>
    </div>
  </div>
</div>
{!! Form::close() !!}
</div>
</div>
