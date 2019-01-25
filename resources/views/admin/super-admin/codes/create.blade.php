<!-- Modal -->
<div class="modal fade" id="codesModal" aria-hidden="false" aria-labelledby="codesModal"
role="dialog" tabindex="-1">
  <div class="modal-dialog">

      {!! Form::open(array('url' => 'control/codes', 'method' => 'POST', 'class' => 'modal-content')) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <span class="input-group-addon" style="background-color: white; border: white;">
        <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">Crear Codigos</h4>
        <i class="icon fa-cube" aria-hidden="true" style="font-size: 30px"></i>
        </span>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <label>Porfavor seleccione la cantidad de codigos a crear</label>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">
                <i class="icon fa-paw" aria-hidden="true"></i>
                </span>
                <input type="number" name="quantity" class="form-control" value="1" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <label>Desea asignar estos codigos a una Veterinaria?</label>
            <div class="form-group">
              <div class="input-group">
                <input type="checkbox" id="selectVeterinary" name="selectVeterinary" data-plugin="switchery"/>
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="rowVeterinary" style="display:none;">
          <div class="col-sm-12">
            <div class="form-group">
            <label>Porfavor Seleccione la veterinaria</label>
              <select class="form-control" data-plugin="select2" name="veterinary">
                <optgroup label="Veterinarias" id="veterinary_list">
                  @foreach($veterinary as $data)
                  <option value="{{$data->id}}">{{$data->name}}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 pull-right">
           <input class="btn btn-primary" type="submit" value="Generar Codigos"/>
          </div>
        </div>

      </div>
      {!! Form::close() !!}

  </div>
</div>
<!-- End Modal -->
