 <div class="modal fade bs-example-modal-lg" id="detailProspect<?=$id?>" tabindex="-1" role="dialog" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                            </button>
                                            <h2 class="card-inside-title" id="myModalLabel"> <strong><center>VOIR DETAILS </center></strong></h2>
                                          </div>
                                          <div class="modal-body">
                                            <!-- debut formulaire pour voir les Voirdetails -->
                                          <form class="form-horizontal form-label-left input_mask">
                                            <!-- premier ligne modal -->
                                                <div class="row clearfix">
                                                   <div class="col-md-3">
                                                    <label class="card-inside-title">Date</label>
                                                        <div class="form-group">
                                                            <div class="card-inside-title">
                                                                <?=$reponse['date']?>
                                                            </div>
                                                        </div>  
                                                   </div>
                                                   <div class="col-md-3">
                                                     <label class="card-inside-title">NomComplet</label>
                                                        <div class="form-group">
                                                            <div class="card-inside-title">
                                                                <?=$reponse['nom']?>
                                                            </div>
                                                        </div>   
                                                   </div>
                                                    <div class="col-md-3">
                                                    <label class="card-inside-title">Adresse</label>
                                                        <div class="form-group">
                                                            <div class="card-inside-title">
                                                                <?=$reponse['adresse']?>
                                                            </div>
                                                        </div>
                                                   </div>
                                                    <div class="col-md-3">
                                                     <label class="card-inside-title">Revenue</label>
                                                        <div class="form-group">
                                                            <div class="card-inside-title">
                                                                <?=$reponse['niveauderevenue']?>
                                                            </div>
                                                        </div>
                                                   </div> 
                                                </div>
                                                <!-- Deuxieme ligne Modal -->
                                                <div class="row clearfix">                                
                                                 <div class="col-md-3">
                                                   <label class="card-inside-title">Numéro Téléphone:</label>
                                                      <div class="form-group">
                                                          <div class="card-inside-title">
                                                              <?=$reponse['telephone']?>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                   <label class="card-inside-title">Compte Courant</label>
                                                      <div class="form-group">
                                                          <div class="card-inside-title">
                                                           <?=$reponse['comptcourant']?>
                                                              
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                   <label class="card-inside-title">Compte Epargne:</label>
                                                      <div class="form-group">
                                                          <div class="card-inside-title">
                                                             <?=$reponse['comptepargne']?>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                     <label class="card-inside-title">Compte Professionnel</label>
                                                        <div class="form-group">
                                                            <div class="card-inside-title">
                                                               <?=$reponse['compteprofessionnel']?>
                                                            </div>
                                                        </div>
                                                   </div>
                                                  
                                              </div>
                                              <!-- troisieme ligne -->
                                               <div class="row clearfix">                                
                                                 <div class="col-md-3">
                                                   <label class="card-inside-title">Pret</label>
                                                      <div class="form-group">
                                                          <div class="card-inside-title">
                                                              <?=$reponse['pret']?>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                   <label class="card-inside-title">Rachat</label>
                                                      <div class="form-group">
                                                          <div class="card-inside-title">
                                                           <?=$reponse['rachat']?>
                                                              
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                   <label class="card-inside-title">Fonction</label>
                                                      <div class="form-group">
                                                          <div class="card-inside-title">
                                                             <?=$reponse['fonction']?>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                     <label class="card-inside-title">Employeur</label>
                                                        <div class="form-group">
                                                            <div class="card-inside-title">
                                                               <?=$reponse['employeur']?>
                                                            </div>
                                                        </div>
                                                   </div>
                                                  
                                              </div>
                                              <!-- 4em ligne -->
                                               <div class="row clearfix">                                
                                                 <div class="col-md-3">
                                                   <label class="card-inside-title">Tye de Contrat</label>
                                                      <div class="form-group">
                                                          <div class="card-inside-title">
                                                              <?=$reponse['typecontrat']?>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                   <label class="card-inside-title">Banque</label>
                                                      <div class="form-group">
                                                          <div class="card-inside-title">
                                                           <?=$reponse['banque']?>
                                                              
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                   <label class="card-inside-title">Agence De Depot</label>
                                                      <div class="form-group">
                                                          <div class="card-inside-title">
                                                             <?=$reponse['agencedepot']?>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                     <label class="card-inside-title">Observation</label>
                                                        <div class="form-group">
                                                            <div class="card-inside-title">
                                                               <?=$reponse['observation']?>
                                                            </div>
                                                        </div>
                                                   </div>
                                                  
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
  <!-- Envoyer Prospect -->
  <div class="modal fade bs-example-modal-lg" id="EnvoyerFV<?=$id?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h2 class="card-inside-title" id="myModalLabel"> <strong><center>AFFECTER </center></strong></h2>
        </div>
        <div class="modal-body">
          <!-- debut formulaire pour voir les Voirdetails -->
           <form id="demo-form" data-parsley-validate method="post" action="#">
                
                <label for="heard" class="card-inside-title"><strong>Veillez Choisir l'agence : <?=$reponse['agencedepot'] ?></strong> </label> 
                 <select class="form-control" name="id_agence">
                      <option></option>
                          <?php
                              foreach ($listAgence as $agence ){
                                echo "<option value='".$agence['id']."' class='card-inside-title'>".$agence['libelleAgence']."-".$agence['codeAgence_UC']."</option>";
                              }
                          ?>
                </select>
                 <!--  <div>
                     <label for="heard" class="card-inside-title"><strong>Veillez un Gestionnaire  *: </strong> </label> 
                        <select class="form-control" name="id_agence">
                      <option></option>
                         
                </select>
                  </div> -->
                  
                <label for="message" class="card-inside-title"> effectuer Commentaire* </label>
                <textarea id="descr" required="required" class="form-control" name="desc_com" rows="10" COLS="40"></textarea>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="#" value="envoyer">
                </div>
          </form>
          <!-- fin formulaire Voirdetails -->
        </div>

      </div>
    </div>
  </div>