<!-- Modal -->
<div class="modal fade" id="codesModal" aria-hidden="false" aria-labelledby="codesModal"
role="dialog" tabindex="-1">
  <div class="modal-dialog">

      {!! Form::open(array('url' => 'administrator/codes/assign/headquarter', 'method' => 'POST', 'class' => 'modal-content')) !!}
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
            <label>Porfavor seleccione la cantidad de codigos a asignar</label>
            <div class="form-group">
              <select class="form-control" data-plugin="select2" name="cantCodes">
                <optgroup label="Veterinarias" id="cantCodes">
                  <option value="">Seleccione un Valor</option>
                  @for ($i = 1; $i < $codesCount; $i++)
                      <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </optgroup>
              </select>
            </div>

          </div>
        </div>

        <div class="row" id="rowVeterinary">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Porfavor Seleccione la Sede</label>
              <select class="form-control" data-plugin="select2" name="headquarter">
                <optgroup label="Veterinarias" id="headquarter_list">
                  @foreach($headquartersVeterinary as $data)
                  <option value="{{$data->id}}">{{$data->city}} - {{$data->address}}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 pull-right">
           <input class="btn btn-primary" type="submit" value="Asignar"/>
          </div>
        </div>

      </div>
      {!! Form::close() !!}

  </div>
</div>
<!-- End Modal -->
