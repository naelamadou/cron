                  <!--Debut Formulaire Large modal ajouter UC -->
                  <div class="modal fade bs-example-modal-lg" id="ajouterUC" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Unite Commerciale</h4>
                        </div>
                        <div class="modal-body">
                          <!-- debut de mon formulaire ajout -->
                               <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2>Formulaire D'ajout d'un UC
                                    <ul class="nav navbar-right panel_toolbox">
                                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                      </li>
                                    </ul>
                              <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                              <br />
                              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="../controller/userController.php">
                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Code Unite <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="Code_UC">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nom Unite <span class="required">*</span>
                                    </label>
                                    <br>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="last-name"  required="required" class="form-control col-md-7 col-xs-12" name="Nom_UC">
                                    </div>
                                  </div>
                                 
                                  <div class="ln_solid"></div>
                                  <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="reset">Annuler</button>
                                    <button type="submit" class="btn btn-success" name="addUC">Ajouter</button>
                                    </div>
                                  </div>
                              </form>
                              </div>
                              </div>
                              </div>
                              </div>
                          <!-- Fin de mon formulaire Ajouter -->
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">envoyer</button>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!--FIN Formulaire Large modal ajouter UC -->


                  <!--Debut Formulaire Large modal modification  UC-->
                 <div class="modal fade bs-example-modal-lg" id="modifUC<?=$id?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Unite Commerciale</h4>
                        </div>
                        <div class="modal-body">
                          <!-- debut de mon formulaire ajout -->
                               <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2>Formulaire De modification d'un UC
                                    <ul class="nav navbar-right panel_toolbox">
                                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                      </li>
                                    </ul>
                              <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                              <br />
                              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="../controller/userController.php">
                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Code Unite <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="Code_UC" value="<?=$uc['Code_UC']?>">
                                    </div>
                                  </div>
                                  <br><br>
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nom Unite <span class="required">*</span>
                                    </label>
                                    <br>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="last-name"  required="required" class="form-control col-md-7 col-xs-12" name="Nom_UC" value="<?=$uc['Nom_UC']?>">
                                    </div>
                                  </div>
                                 
                                  <div class="ln_solid"></div>
                                  <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="reset">Annuler</button>
                                    <button type="submit" class="btn btn-success" name="modifUC">Modifier</button>
                                    </div>
                                  </div>
                              </form>
                              </div>
                              </div>
                              </div>
                              </div>
                          <!-- Fin de mon formulaire Ajouter -->
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                          
                        </div>

                      </div>
                    </div>
                  </div>
                  <!--FIN Formulaire Large modal de modification UC -->