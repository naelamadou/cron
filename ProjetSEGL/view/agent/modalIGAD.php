<div class="modal fade bs-example-modal-lg" id="envoyerIGAD<?=$id?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <label class="card-inside-title">Veillez Choisir le responsable IGAD Conserné</label>
                                    <select name="id_users" class="form-control">
                                        <option>-- Choisir Responsable --</option>
                                        <?php foreach ($getlisteUserByIGAD as $igad ): ?>
                                        <option value=<?=$igad['id'] ?> >
                                            <?=$igad['email'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!--          <input type="hidden"  name="id_com"> -->

                            <!--  <input type="hidden"  name="heure"> -->
                            <input type="hidden" name="id_listeErreur" value="<?= $res['id'] ?>">
                            <input type="hidden" name="fichier" value="<?= $res['fichier'] ?>">
                            <label class="card-inside-title">Effectuer Commentaire* </label>
                            <div class="form-line">
                                <textarea id="descr" required="required" class="form-control no-resize auto-growth" name="desc_com" rows="5" cols="40" placeholder="effectuer un commentaire"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" name="envoyerPoursuite" value="envoyer">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>