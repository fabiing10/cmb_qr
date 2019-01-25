<div class="modal fade" id="foundModal" aria-hidden="false" aria-labelledby="foundModal" role="dialog" tabindex="-1">
<div class="modal-dialog">
{!! Form::open(array('url' => 'user/pet/report/found', 'method' => 'POST', 'class' => 'modal-content')) !!}

<input type="hidden" name="petId" class="petId" />
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
  </button>
  <span class="input-group-addon" style="background-color: white; border: white;">
      <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">
        Que Felicidad, encontraste a <span class="pet"></span>!</h4>
      <i class="icon fa-male" aria-hidden="true" style="font-size: 30px"></i>
  </span>
</div>
<div class="modal-body">

  <div class="row">
      <div class="col-lg-12 form-group">
        <label>Nos alegra saber que encontraste tu mascota, ahora es tiempo de compartir con ella no sin antes confirmar que sea <span class="pet"></span>. Ingresa el codigo de tu mascota en el siguiente campo para confirmar.</p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
          <input type="text" class="form-control" cols="80" name="code" />
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
