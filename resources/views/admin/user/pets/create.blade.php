<div class="modal fade" id="petModal" aria-hidden="false" aria-labelledby="petModal"
role="dialog" tabindex="-1">
    <div class="modal-dialog">
    {!! Form::open(array('url' => 'user/pets', 'method' => 'POST', 'class' => 'modal-content', 'enctype' => 'multipart/form-data')) !!}

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <span class="input-group-addon" style="background-color: white; border: white;">
            <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;margin-bottom:5px;">Agregar Mascota</h4>
            <i class="icon fa-paw" aria-hidden="true" style="font-size: 30px"></i>
        </span>
    </div>
    <div class="modal-body">
      <div class="row">
          <div class="col-lg-12 form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name="name" placeholder="Nombre Mascota">
            </div>
          </div>
      </div>
        <div class="row">
          <div class="col-lg-6 form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
              <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Cumpleaños" data-plugin="datepicker"  data-date-format="yyyy-mm-dd">
            </div>
          </div>
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="file" class="form-control" name="image" placeholder="Subir Photo">
              </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-6 form-group">
              <div class="input-group">
                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                  <select class="form-control" id="company" name="gender" required="">
                          <option value="">Escoge un genero</option>
                          <option value="1">Macho</option>
                          <option value="2">Hembra</option>
                  </select>
              </div>
            </div>
            <div class="col-lg-6 form-group">
                <div class="form-group">
                  <select class="form-control" id="petType" name="petType" required="" onchange="selectRace()">
                        <option value="">Escoge un tipo</option>
                        <option value="1">Perro</option>
                        <option value="2">Gato</option>
                  </select>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-lg-6 form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                <input type="integer" class="form-control" name="color" placeholder="Color">
              </div>
            </div>
            <div class="col-lg-6 form-group">
              <div class="input-group">
                  <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                  <select class="form-control" id="raza" name="raza" required="">
                        <option value="">Escoge una raza</option>
                  </select>
              </div>
            </div>
        </div>

        <div class="row">

              <div class="col-lg-12 form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon wb-user" aria-hidden="true"></i></span>
                    <select class="form-control" id="medida" name="medida" >
                          <option value="grande">Grande</option>
                          <option value="mediano">Mediano</option>
                          <option value="pequeño">Pequeño</option>
                    </select>
                  </div>
              </div>

        </div>
        <div class="row">
            <div class="col-lg-12 form-group">
              <div class="input-group">
                <textarea class="form-control" name="description" rows="5" cols="60" placeholder="Describe a la mascota" required=""></textarea>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12 pull-right">
            <input class="btn btn-primary submit-btn" type="submit" value="Crear Mascota"/>
          </div>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
</div>



<script type="text/javascript">

  function selectRace(){

      var petType = document.getElementById("petType").value;
      $("#raza").empty();
      $.get( "races/"+petType, function( data ) {

        var listitems;
        $.each(data, function (index, value) {
          listitems += '<option value='+value.race+'>' + value.race + '</option>';
        });
      $("#raza").append(listitems);

      });

  }

</script>
