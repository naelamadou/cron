<div class="modal fade bs-example-modal-lg" id="voirdetail<?=$id?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h2 class="modal-title" id="myModalLabel"> <strong>
                        <center>Voir les Details de L'erreur</center>
                    </strong></h2>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <label class="card-inside-title">Date Comptable</label><span class="card-inside-title">
                                    <?php echo $res['DCO']?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <label class="card-inside-title">Agence </label><span class="card-inside-title">
                                    <?php echo $res['AGE']?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <label class="card-inside-title">Numero de Comptable</label><span class="card-inside-title">
                                    <?php echo $res['NCP']?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <label class="card-inside-title">Code Opération</label><span class="card-inside-title">
                                    <?php echo $res['OPE']?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <label class="card-inside-title">Libelle</label><span class="card-inside-title">
                                    <?php echo $res['LIBELLE']?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <label class="card-inside-title">Caisse</label><span class="card-inside-title">
                                    <?php echo $res['CAISSE']?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                   
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <label class="card-inside-title">Code utilisateur</label><span class="card-inside-title">
                                    <?php echo $res['CUTI']?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <label class="card-inside-title">Utilisateur Caisse</label><span class="card-inside-title">
                                    <?php echo $res['UTI_CAISSE']?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <label class="card-inside-title">Numéro de pièce comptable</label><span class="card-inside-title">
                                    <?php echo $res['PIE']?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <label class="card-inside-title">Montant de l'Operation</label><span class="card-inside-title">
                                    <?php echo number_format(intval($res['MON']), 0, '.', ' ')?></span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- formulaire pour envoyer erreur -->
<div class="modal fade bs-example-modal-lg" id="envoyerErreur<?=$id?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <strong>
                        <center>Envoie de l'erreur de Caissse</center>
                    </strong>
                </h4>
            </div>

            <div class="modal-body">
                <!-- debut formulaire pour commentaire -->
                <div class="x_panel">

                    <div class="x_content">

                        <form id="demo-form" data-parsley-validate method="post" action="../controller/userController.php">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="card-inside-title">Veillez Choisir l'agence *:
                                        <?= $res['AGE'] ?></label>
                                    <select name="id_agence" class="form-control" required="Veillez choisir une agence">
                                        <option></option>
                                        <?php foreach ($listeAgence as $agence ): ?>
                                        <option value=<?=$agence['id'] ?> >
                                            <?= $agence['codeAgence_UC'].'-'. $agence['libelleAgence'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!--          <input type="hidden"  name="id_com"> -->

                            <input type="hidden" name="id_users" value="<?= $_SESSION['id'] ?>">
                            <input type="hidden" name="status" value="<?= $res['status'] ?>">
                            <!--  <input type="hidden"  name="heure"> -->
                            <input type="hidden" name="id_erreur" value="<?= $res['id'] ?>">
                            <label class="card-inside-title">Effectuer Commentaire* </label>
                            <div class="form-line">
                                <textarea id="descr" required="required" class="form-control no-resize auto-growth" name="desc_com" rows="5" cols="40" placeholder="effectuer un commentaire" required></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" name="envoyerCommentaire" value="envoyer">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fin formulaire commentaire -->

