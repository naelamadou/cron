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
                      <h1><strong><center>Liste des <em>erreurs non traitées</em> de caisse</center></strong></h1>
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Date comptable</th>
                          <th>Agence</th>
                          <th>Numéro de compte</th>
                          <th>Code opération</th>
                          <th>Libelle</th>
                          <th>Caisse</th>
                          <th>Mon</th> 
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                
                    include_once '../model/db.php';
                    $db=getConnexionBD();
                    $sql="select * from listeErreur";
                    $req=$db->query($sql);
                    while ($res=$req->fetch()) {
                        $id = $res['id'];
                        ?>
                        <tr>
                            <td> <?php echo $res['DCO']?> </td>
                            <td> <?php echo $res['AGE']?> </td>
                            <td> <?php echo $res['NCP']?> </td>
                            <td> <?php echo $res['OPE']?> </td>
                            <td> <?php echo $res['LIBELLE']?> </td>
                            <td> <?php echo $res['CAISSE']?> </td>
                            <td> <?php echo $res['MON']?> </td>
                              <div class="modal fade bs-example-modal-lg" id="voirdetail" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel"> Voir les Details de L'erreur</h4>
                        </div>
                        <div class="modal-body">
                          <!-- debut formulaire pour voir les Voirdetails -->
                        <form class="form-horizontal form-label-left input_mask">

                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Comptable</label>:<?php echo $res['DCO']?>
                              </div>

                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Agence </label>
                              </div>

                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Comptable</label>
                              </div>

                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">Code Opération</label>
                              </div>

                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Libelle</label>
                              </div>

                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">Caisse</label>
                              </div>
                               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">Montant de l'Operation</label>
                              </div>
                               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">Code utilisateur</label>
                              </div>
                               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">Utilisateur Caisse</label>
                              </div>
                               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">Numéro de pièce comptable</label>
                              </div>
                               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">Numéro de pièce comptable d'origine</label>
                              </div>
                               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero id:<?php echo $res['NCP']?></label>
                              </div>

                    </form>
                          <!-- fin formulaire Voirdetails -->
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">envoyer</button>
                        </div>

                      </div>
                    </div>
                  </div>
                         </tr>
                          
                        <?php
                    }
                ?>
              </tbody>
                        
      </table>
      
                  <!--Debut Formulaire Large modal -->
                  <div class="modal fade bs-example-modal-lg" id="envoyerErreur" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Envoyer l'erreur de Caissse</h4>
                        </div>
                        <div class="modal-body">
                          <!-- debut formulaire pour commentaire -->
                          <div class="x_panel">
                              <div class="x_title">
                                <h2>envoyer erreur</h2>
                                <div class="clearfix"></div>
                              </div>
                                   <div class="x_content">

                    <!-- start form for validation -->
                                    <form id="demo-form" data-parsley-validate>

                                          <label for="email">Email * :</label>
                                          <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required />

                                          <label for="message">Commentaire*</label>
                                          <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="200" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                            data-parsley-validation-threshold="10"></textarea>

                                          <br/>                                        
                                    </form>
                    <!-- end form for validations -->

                  </div>
                </div>
                          <!-- fin formulaire commentaire -->
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">envoyer</button>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!--Debut Formulaire Large modal -->


                    <!--Debut Formulaire Large voirdetail -->
                 
                  <!--Debut Formulaire Large modal -->
      </div>
            <!-- Fin datatable -->

          </div>
          <!-- /page content -->
        <!-- footer content -->
     <?php require_once'footer.php'; ?>