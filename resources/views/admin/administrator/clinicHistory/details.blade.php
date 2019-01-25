<div class="modal fade" id="detailHistoryClinic" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
  <div class="modal-dialog" style="background-color: white;">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <span class="input-group-addon" style="background-color: white; border: white;">
      <h4 class="modal-title" id="exampleFormModalLabel" align="center" style="background-color: white; border: white;">Historia CLinica</h4>
      <i class="icon fa-file" aria-hidden="true" style="font-size: 30px"></i>
      </span>
    </div>
    <div class="modal-body">
          <div class="row">
            <div class="example-wrap">
                <div class="nav-tabs-horizontal">
                  <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
                    <li class="active" role="presentation"><a data-toggle="tab" href="#generalInfo" aria-controls="exampleTabsOne" role="tab" aria-expanded="false">Informacion Basica</a></li>
                    <li role="presentation" class=""><a data-toggle="tab" href="#clinicHistory" aria-controls="exampleTabsTwo" role="tab" aria-expanded="false">Examen Basico</a></li>
                    <li role="presentation" class=""><a data-toggle="tab" href="#imagenes" aria-controls="exampleTabsTwo" role="tab" aria-expanded="false">Imagenes</a></li>
                    <li role="presentation" class=""><a data-toggle="tab" href="#clinicHistory2" aria-controls="exampleTabsTwo" role="tab" aria-expanded="false">Anamnesis</a></li>
                    <li role="presentation" ><a data-toggle="tab" href="#observationsTab" aria-controls="exampleTabsThree" role="tab" aria-expanded="true">Observaciones</a></li>

                  </ul>
                  <div class="tab-content tab-details padding-top-20">
                    <div class="tab-pane active" id="generalInfo" role="tabpanel">
                      <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                             <label class="control-label" style="text-align:center;">Mascota</label>
                             <span id="namePet" style="text-align: center;width: 100%;display: block;">{{$pet->name}}</span>
                            </div>

                            <div class="form-group">
                              @if($image->img_profile != 'none')
                              <img src="{{URL::asset('uploads/images/')}}/{{$image->img_profile}}" class="img-profile-pet">
                              @else
                              <img src="{{URL::asset('admin/assets/images/pet-icon.png')}}" class="img-profile-pet">
                              @endif
                            </div>

                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                             <label class="control-label">Dieta</label>
                             <span id="diet"></span>
                            </div>
                            <div class="form-group">
                             <label class="control-label">Procedencia</label>
                             <span id="origin"></span>
                            </div>
                            <div class="form-group">
                             <label class="control-label">Vacunas</label>
                             <span id="vaccines"></span>
                            </div>
                            <div class="form-group">
                             <label class="control-label">Desparacitaciones</label>
                             <span id="cleaning"></span>
                            </div>
                            <div class="form-group">
                             <label class="control-label">Productos</label>
                             <span id="products"></span>
                            </div>
                            <div class="form-group">
                              <label class="control-label">Fecha</label>
                              <span id="date"></span>
                            </div>

                            <div class="form-group">
                              <label class="control-label">Veterinaria</label>
                              <span id="veterinary"></span>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="clinicHistory" role="tabpanel">
                      <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                             <label class="control-label">Actitud</label>
                             <span id="attitude"></span>
                            </div>
                            <div class="form-group">
                              <label class="control-label">Peso</label>
                              <span id="weight"></span>
                            </div>
                            <div class="form-group">
                              <label class="control-label">Temperatura</label>
                              <span id="temperature"></span>
                            </div>
                            <div class="form-group">
                              <label class="control-label">Frecuencia Cardiaca</label>
                              <span id="hearRate"></span>
                            </div>
                            <div class="form-group">
                              <label class="control-label">Mucosas</label>
                              <span id="mucous"></span>
                            </div>

                            <div class="form-group">
                             <label class="control-label">Fecha</label>
                             <span id="dateProduct"></span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                             <label class="control-label">Condicion Corporal</label>
                             <span id="bodyCondition"></span>
                            </div>
                            <div class="form-group">
                             <label class="control-label">Hidratacion</label>
                             <span id="hydration"></span>
                           </div>
                           <div class="form-group">
                             <label class="control-label">Pulso</label>
                             <span id="pulse"></span>
                           </div>
                            <div class="form-group">
                              <label class="control-label">Frecuencia Respiratoria</label>
                              <span id="breathingFrequency"></span>
                            </div>
                            <div class="form-group">
                              <label class="control-label">Tiempo de llenado Capilar</label>
                              <span id="capilaryRefillTime"></span>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="imagenes" role="tabpanel">
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="control-label">Anamenesis</label>
                        <span id="anamenesis"></span>
                      </div>
                      <div class="row">
                      <h3>Imagen Diagnostica</h3>
                        <center><img id="img_diagnostic" width="200px"></center>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="control-label">Enfermedades o Procedimientos</label>
                        <span id="diseases"></span>
                      </div>
                      <div class="row">
                      <h3>Examen Laboratorio</h3>
                        <center><img id="examen_laboratorio" width="200px"></center>
                      </div>
                      </div>
                    </div>
                  </div>
                    <div class="tab-pane" id="clinicHistory2" role="tabpanel">
                      <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                             <label class="control-label">Locomocion</label>
                             <span id="locomotion"></span>
                            </div>
                            <div class="form-group">
                             <label class="control-label">Sistema Respiratorio</label>
                             <span id="respiratorySystem"></span>
                            </div>
                            <div class="form-group">
                             <label class="control-label">Sistema Genitourinario</label>
                             <span id="genitourinarySystem"></span>
                            </div>
                            <div class="form-group">
                             <label class="control-label">Sistema Cardiovascular</label>
                             <span id="cardiovascularSystem"></span>
                            </div>
                            <div class="form-group">
                             <label class="control-label">Ojos</label>
                             <span id="eyes"></span>
                           </div>
                           <div class="form-group">
                            <label class="control-label">Nodulos Linfaticos</label>
                            <span id="lymphNodes"></span>
                           </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                             <label class="control-label">Musculo Esqueletico</label>
                             <span id="skeletalMuscle"></span>
                            </div>
                            <div class="form-group">
                             <label class="control-label">Sistema Digestivo</label>
                             <span id="digestiveSystem"></span>
                            </div>
                            <div class="form-group">
                             <label class="control-label">Estado reproductivo</label>
                             <span id="reproductiveStatus"></span>
                            </div>
                            <div class="form-group">
                             <label class="control-label">Sistema Nervioso</label>
                             <span id="nervousSystem"></span>
                            </div>
                            <div class="form-group">
                             <label class="control-label">Oidos</label>
                             <span id="ears"></span>
                            </div>
                            <div class="form-group">
                             <label class="control-label">Piel & Anexos</label>
                             <span id="skin"></span>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="observationsTab" role="tabpanel">
                          <div class="panel">
                            <div class="panel-heading">
                              <h3 class="panel-title">Observaciones Realizadas</h3>
                            </div>
                            <div class="panel-body height-250" data-plugin="scrollable" data-skin="scrollable-shadow">
                              <div data-role="container">
                                <div data-role="content" id="observations">

                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                              <label class="control-label">Estado</label>
                              <span id="state"></span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="control-label">Medico Veterinario</label>
                              <span id="userVeterinary"></span>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>

          </div>





    </div>
</div>
<!-- End Modal -->
</div>
