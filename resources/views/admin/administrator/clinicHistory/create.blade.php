    <div class="panel" id="HClinicWizardFormContainer"style="display:none;">
            <div class="panel-heading">
              <h3 class="panel-title" style="text-align:center;">Historia Clinica - {{$pet->name}}</h3>
            </div>
            <div class="panel-body">
              <!-- Steps -->
              <div class="pearls row links-hclinic">

                <div class="pearl current col-xs-2">
                  <div class="pearl-icon"><i class="icon wb-check-circle" aria-hidden="true"></i></div>
                  <span class="pearl-title">Informacion Basica</span>
                </div>
                <div class="pearl col-xs-2">
                  <div class="pearl-icon"><i class="icon wb-check-circle" aria-hidden="true"></i></div>
                  <span class="pearl-title">Examen Basico</span>
                </div>
                <div class="pearl col-xs-2">
                  <div class="pearl-icon"><i class="icon wb-check-circle" aria-hidden="true"></i></div>
                  <span class="pearl-title">Anamnesis</span>
                </div>
                <div class="pearl col-xs-2">
                  <div class="pearl-icon"><i class="icon wb-check-circle" aria-hidden="true"></i></div>
                  <span class="pearl-title">Examen por Sistema</span>
                </div>
                <div class="pearl col-xs-2">
                  <div class="pearl-icon"><i class="icon wb-check-circle" aria-hidden="true"></i></div>
                  <span class="pearl-title">Observaciones Grales</span>
                </div>
                <!--
                <div class="pearl col-xs-2">
                  <div class="pearl-icon"><i class="icon wb-add-file" aria-hidden="true"></i></div>
                  <span class="pearl-title">Informacion Final</span>
                </div>
              -->
              </div>
              <!-- End Steps -->
              <!-- Wizard Content -->
              <form class="wizard-content" id="HClinicFormContainer" name="formDataHC" method="post" action="">




                <div class="wizard-pane active" id="paso1" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                               <label class="control-label">Dieta</label>
                                 <input type="text" class="form-control" id="inputPhone" name="diet">
                              </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                             <label class="control-label">Procedencia</label>
                               <select class="form-control" id="origin" name="origin">
                                <option value="urbana">Urbana</option>
                                 <option value="rural">Rural</option>
                                 <option value="callejero">Callejero</option>
                               </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                 <label class="control-label">Vacunas
                                 </label>
                                   <select class="form-control" id="vaccines" name="vaccines">
                                    <option value="si">Si</option>
                                     <option value="no">No</option>
                                   </select>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                 <label class="control-label">Desparacitaciones</label>
                                   <select class="form-control" id="cleaning" name="cleaning">
                                    <option value="si">Si</option>
                                     <option value="no">No</option>
                                   </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                           <div class="col-lg-6">
                             <div class="form-group">
                               <label class="control-label">Productos</label>
                               <textarea class="form-control" id="products" name="products"></textarea>
                             </div>
                           </div>
                           <div class="col-lg-6">
                           <div class="form-group">
                             <label class="control-label">Fecha</label>
                               <input type="date" class="form-control" id="date" name="dateProduct">
                           </div>
                           </div>
                       </div>
                </div>

                <div class="wizard-pane" id="paso2" role="tabpanel">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="control-label">Actitud</label>
                        <input type="text" class="form-control" id="attitude" name="attitude">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Peso</label>
                        <input type="text" class="form-control" id="weight" name="weight">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Temperatura</label>
                        <input type="text" class="form-control" id="temperature" name="temperature">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Frecuencia cardiaca</label>
                        <input type="text" class="form-control" id="hearRate" name="hearRate">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Mucosas</label>
                        <input type="text" class="form-control" id="mucous" name="mucous">
                      </div>
                    </div>
                    <div class="col-lg-6">
                     <div class="form-group">
                        <label class="control-label">Condición corporal</label>
                        <input type="text" class="form-control" id="bodyCondition" name="bodyCondition">
                      </div>
                     <div class="form-group">
                         <label class="control-label">Hidratación</label>
                         <input type="text" class="form-control" id="hydration" name="hydration">
                      </div>
                     <div class="form-group">
                       <label class="control-label">Pulso</label>
                       <input type="text" class="form-control" id="pulse" name="pulse">
                     </div>
                     <div class="form-group">
                       <label class="control-label">Frecuencia respiratoria</label>
                       <input type="text" class="form-control" id="breathingFrequency" name="breathingFrequency">
                     </div>
                     <div class="form-group">
                       <label class="control-label">Tiempo de llenado capilar</label>
                       <input type="text" class="form-control" id="capilaryRefillTime" name="capilaryRefillTime">
                     </div>
                   </div>
                 </div>
                </div>

                <div class="wizard-pane" id="paso3" role="tabpanel">
                  <div class="row">
                     <div class="col-lg-12">
                     <div class="form-group">
                       <label class="control-label">Anamnesis</label>
                       <textarea class="form-control" id="anamenesis" name="anamenesis"> </textarea>
                     </div>
                     </div>
                     <div class="col-lg-12">
                     <div class="form-group">
                       <label class="control-label">Enfermedades o procedimientos anteriores</label>
                       <textarea class="form-control" id="diseases" name="diseases"></textarea>
                     </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="media">
                         <input type="file" name="imagen_diagnostica" id="imagen_diagnostica" style="display:none;" />
                         <div class="media-body">
                           <a href="#" id="btn_img_diagnostica">
                           <img src="{{URL::asset('admin/assets/images/3.png')}}" style="width:6%;">
                           <span class="title-btn" style="display: -webkit-inline-box; color: #ff0066; vertical-align: bottom; font-weight: bold;">Cargar Imagen diagnostica</span>
                         </a>
                         </div>
                       </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="media">
                          <input type="file" name="examen_laboratorio" id="examen_laboratorio" style="display:none;" />
                         <div class="media-body">
                           <a href="#" id="btn_examen_lab">
                           <img src="{{URL::asset('admin/assets/images/4.png')}}" style="width:6%;">
                           <span class="title-btn" style="display: -webkit-inline-box; color: #ff0066; vertical-align: bottom; font-weight: bold;">Cargar Examen Laboratorio</span>
                         </a>
                         </div>
                       </div>
                     </div>
                  </div>
                </div>

                <div class="wizard-pane" id="paso4" role="tabpanel">
                  <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                       <label class="control-label">Locomocion</label>
                       <input type="text" class="form-control" id="locomotion" name="locomotion">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Sistema respiratorio</label>
                        <input type="text" class="form-control" id="respiratorySystem" name="respiratorySystem">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Sistema genitourinario</label>
                        <input type="text" class="form-control" id="genitourinarySystem" name="genitourinarySystem">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Sistema cardiovascular</label>
                        <input type="text" class="form-control" id="cardiovascularSystem" name="cardiovascularSystem">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ojos</label>
                        <input type="text" class="form-control" id="eyes" name="eyes">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nodulos linfaticos</label>
                        <input type="text" class="form-control" id="lymphNodes" name="lymphNodes">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="control-label">Musculo esqueletico</label>
                      <input type="text" class="form-control" id="skeletalMuscle" name="skeletalMuscle">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Sistema digestivo</label>
                        <input type="text" class="form-control" id="digestiveSystem" name="digestiveSystem">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Estado reproductivo</label>
                      <input type="text" class="form-control" id="inputPhone" name="reproductiveStatus">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Sistema nervioso</label>
                      <input type="text" class="form-control" id="nervousSystem" name="nervousSystem">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Oidos</label>
                      <input type="text" class="form-control" id="ears" name="ears">
                    </div>
                    <div class="form-group">
                       <label class="control-label">Piel y anexos</label>
                       <input type="text" class="form-control" id="skin" name="skin">
                     </div>
                    </div>
                  </div>
                </div>

                <div class="wizard-pane" id="paso5" role="tabpanel">
                  <div class="row">
                     <div class="col-lg-12">
                       <div class="form-group">
                           <label class="control-label" for="inputNames">Observaciones Generales</label>
                           <textarea class="input-block-level" id="summernote" data-plugin="summernote" name="observations" rows="18"></textarea>
                       </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                           <label class="control-label" for="inputNames">Nombres y Apellidos (Veterinario)</label>
                           <input type="text" class="form-control" placeholder="Ej:Juan Martinez" id="inputNames" name="nameVeterinary">
                       </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                           <label class="control-label" for="inputNames">Estado Mascota</label>
                           <input type="text" class="form-control" placeholder="" id="inputNames" name="state">
                       </div>
                     </div>
                  </div>
                    <input type="submit" name="sendForm" id="sendForm" value="Enviar" style="display:none;"/>


                </div>

                <!--<div class="wizard-pane active" id="finish" role="tabpanel">
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                  <input type="hidden" name="action" value="ClinicHistory" />


                      <div class="row">
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label class="control-label" for="inputNames">Nombres y Apellidos (Veterinario)</label>
                                  <input type="text" class="form-control" placeholder="Ej:Juan Martinez" id="inputNames" name="nameVeterinary">
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label class="control-label" for="inputNames">Estado Mascota</label>
                                  <input type="text" class="form-control" placeholder="" id="inputNames" name="state">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                              Panel Standard Editor
                              <div class="form-group">
                                  <label class="control-label" for="inputNames">Observaciones Generales</label>
                                  <textarea class="input-block-level" id="summernote" data-plugin="summernote" name="observations" rows="18"></textarea>
                              </div>
                        </div>
                      </div>
                </div>

                -->

              </form>
              <!-- Wizard Content -->
            </div>
          </div>
