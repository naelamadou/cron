
 <div class="modal fade bs-example-modal-lg" id="voirdetail<?=$id?>" tabindex="-1" role="dialog" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                            </button>
                                            <h2 class="modal-title" id="myModalLabel"> <strong><center>Voir les Details de L'erreur</center></strong></h2>
                                          </div>
                                          <div class="modal-body">
                                            <!-- debut formulaire pour voir les Voirdetails -->
                                          <form class="form-horizontal form-label-left input_mask">

                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Comptable</label>:<?php echo $res['DCO']?>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Agence </label>:<?php echo $res['AGE']?>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Comptable</label>:<?php echo $res['NCP']?>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Code Opération</label>:<?php echo $res['OPE']?>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Libelle</label>:<?php echo $res['LIBELLE']?>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Caisse</label>:<?php echo $res['CAISSE']?>
                                                </div>
                                                 <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Montant de l'Operation</label>:<?php echo $res['MON']?>
                                                </div>
                                                 <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Code utilisateur</label>:<?php echo $res['Cuti']?>
                                                </div>
                                                 <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Utilisateur Caisse</label>:<?php echo $res['Uti']?>
                                                </div>
                                                 <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Numéro de pièce comptable</label>:<?php echo $res['PIE']?>
                                                </div>
                                                 <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Numéro de pièce comptable d'origine</label>:<?php echo $res['PIEO']?>
                                                </div>
                                                 <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero id:<?php echo $res['id_agence']?></label>:<?php echo $res['DCO']?>
                                                </div>

                                      </form>
                                            <!-- fin formulaire Voirdetails -->
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                                            
                                          </div>

                                        </div>
                                      </div>
                              </div>
<!-- formulaire pour envoyer erreur -->
<div class="modal fade bs-example-modal-lg" id="envoyerErreur<?=$id?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel"><strong><center>Envoie de l'erreur de Caissse</center></strong></h4>
                        </div>
                        <div class="modal-body">
                          <!-- debut formulaire pour commentaire -->
                          <div class="x_panel">
                              <div class="x_title">
                                <h2><strong><center>Envoyer erreur</center></strong></h2>
                                <div class="clearfix"></div>
                              </div>
                                   <div class="x_content">

                                       <!-- start form for validation -->
                                        <form id="demo-form" data-parsley-validate method="post" action="../controller/userController.php">
                                              
                                              <label for="heard">Choisir l'agence  *:</label>
                                              <div>
                                             <input type="text" readonly name="AGE" value="<?php echo $res['AGE']?>">
                                             <input type="hidden"  name="id_com">
                                             <input type="hidden"  name="id_users">
                                             <input type="hidden"  name="status">
                                                </div>
                                              <label for="message">effectuer Commentaire*</label>
                                              <textarea id="message" required="required" class="form-control" name="commentaire" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="200" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                                data-parsley-validation-threshold="10"></textarea>

                                              <br/>
                                         
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" name="envoyer" valider="envoyer">
                                              </div>
                                        </form>
                      
                                    
                    <!-- end form for validations -->

                                </div>
                          </div>
                    </div> 
              </div> 
          </div>
    </div>             
                          <!-- fin formulaire commentaire -->
                      
                          
                    