<?php require_once'header.php'; ?>
<?php require_once'sidebar.php'; ?>
<?php require_once'navebar.php'; ?>

          <!-- page content -->
          <div class="right_col" role="main">
            <!-- top tiles -->
            <!-- /top tiles -->  
            <br />
            <!-- Mon datatable -->
            <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      <h1><strong><center>Liste des <em>Agence</em> de la banque</center></strong></h1>
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>CodeAgence_UC</th>
                          <th>libelleAgence</th>
                          <th>uniteCommercial</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ($listAgence as $agence ){
                             echo "<tr>
                             <td>".$agence['codeAgence_UC']."</td>
                             <td>".$agence['libelleAgence']."</td>
                             <td>".$agence['Nom_UC']."</td>
                             </tr>";
                          }
                        ?>
                    </tbody>
                        
      </table>
      </div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajouterAgence" >Ajouter</button>
            <!-- Fin datatable -->
                              <!--Debut Formulaire Large modal ajouter UC -->
                  <div class="modal fade bs-example-modal-lg" id="ajouterAgence" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel"><strong><center>Agence</center></strong></h4>
                        </div>
                        <div class="modal-body">
                          <!-- debut de mon formulaire ajout -->
                               <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2><center><strong>Formulaire D'ajout d'une Agence</strong></center></h2> 
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
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Code agence <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="codeAgence_UC">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Libelle Agence <span class="required">*</span>
                                    </label>
                                    <br>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="last-name"  required="required" class="form-control col-md-7 col-xs-12" name="libelleAgence">
                                    </div>
                                  </div>
                                    <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Unite Commerciale <span class="required">*</span>
                                    </label>
                                    <br>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                   <select class="select2_group form-control" name="id_unite">

                                              <option></option>
                                              <?php 
                                              foreach ($listeUC as $agence) {
                                                echo "<option>".$agence['Nom_UC']."</option>";
                                              }
                                            ?>
                                    </select>
                                    </div>
                                  </div>
                                 
                                  <div class="ln_solid"></div>
                                  <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="reset">Annuler</button>
                                    <input type="submit" class="btn btn-success" name="addAgence" value="Ajouter">
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

           






          </div>
          <!-- /page content -->
        <!-- footer content -->
      <?php require_once'footer.php'; ?>