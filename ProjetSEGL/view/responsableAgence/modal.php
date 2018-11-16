<div class="modal fade bs-example-modal-lg" id="voirdetail<?=$id?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h2 class="modal-title" id="myModalLabel"> <strong><center>Voir les Details de L'erreur</center></strong></h2>
            </div>
                      <div class="modal-body">
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                           <label class="card-inside-title">Date Comptable</label><span class="card-inside-title"><?php echo $res['DCO']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label class="card-inside-title">Agence </label><span class="card-inside-title"><?php echo $res['AGE']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                           <label class="card-inside-title">Numero de Comptable</label><span class="card-inside-title"><?php echo $res['NCP']?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                           <label class="card-inside-title">Code Opération</label><span class="card-inside-title"><?php echo $res['OPE']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                             <label class="card-inside-title">Libelle</label><span class="card-inside-title"><?php echo $res['LIBELLE']?></span>
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label class="card-inside-title">Caisse</label><span class="card-inside-title"><?php echo $res['CAISSE']?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                          <label class="card-inside-title">Code Opération</label><span class="card-inside-title"><?php echo $res['OPE']?></span>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label class="card-inside-title">Code utilisateur</label><span class="card-inside-title"><?php echo $res['CUTI']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label class="card-inside-title">Utilisateur Caisse</label><span class="card-inside-title"><?php echo $res['UTI_CAISSE']?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label class="card-inside-title">Numéro de pièce comptable</label><span class="card-inside-title"><?php echo $res['PIE']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                           <label class="card-inside-title">Montant de l'Operation</label><span class="card-inside-title"><?php echo number_format(intval($res['MON']), 0, '.', ' ')?></span>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="row clearfix">
                                
                                    <div class="form-group">
                                        <div class="form-line">
                                          <blockquote class="blockquote">
                                            <p class="mb-0">Commentaire</p>
                                            <footer class="card-inside-title lead">:<?php echo $res['desc_com']?><cite title="Source Title"></cite></footer>
                                          </blockquote>
                                           
                                        </div>
                                    </div>
                                
                            </div>           
                </div>
         </div>
  </div>
</div>
<!-- formulaire pour envoyer erreur -->
<div class="modal fade bs-example-modal-md" id="envoyerErreur<?=$id?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                              <strong>
                              <center class="card-inside-title">Remplir la grille</center>
                              </strong>
                            </h4>
              </div>
                    <div class="modal-body ">
                          <!-- debut formulaire pour commentaire -->
                          <form id="demo-form" data-parsley-validate method="post" action="../controller/userController.php" enctype="multipart/form-data">
                          <div class="x_panel">
                              <div class="x_title">
                                <strong class="card-inside-title">Choisir le fichier</strong>
                                <div class="clearfix"></div>
                              </div>
                                   <div class="x_content">
                                      <div class="btn-group">
                                        <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                                        <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" name="fichier" />
                                      </div>
                                      <input type="hidden"  name="id_responsable" value="<?= $_SESSION['id'] ?>">
                                       <input type="hidden"  name="id_listeErreur" value="<?php echo $res['id']?>">
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          <input type="submit" class="btn btn-primary" name="addGrille" value="envoyer">
                                      </div>
                                </div>
                          </div>
                        </form>
                    </div> 
              </div> 
          </div>
    </div>            
                          <!-- fin formulaire commentaire -->
                  
 

                      
