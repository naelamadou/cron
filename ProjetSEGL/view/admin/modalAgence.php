<!-- banee -->
<!-- Ajouter une agence -->

    <div class="modal fade" id="modifAgence<?=$id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <form method="post" action="../controller/userController.php">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header text-center">
                    <h4 class="modal-title white-text w-100 font-weight-bold py-2">Modifier Agence</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="red-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class=" fa fa-desktop"></i>
                            </span>
                            <!-- recuperation de l'id -->
                            <input type="hidden" class="form-control date" name="id" value="<?=$a['id']?>">
                            <!-- code Agence -->
                            <div class="form-line">
                                <input type="text" class="form-control date" name="codeAgence_UC" value="<?=$a['codeAgence_UC']?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class=" fa fa-desktop"></i>
                            </span>
                            <!-- libelle Agence -->
                            <div class="form-line">
                                <input type="text" class="form-control date" value="<?=$a['libelleAgence']?>" name="libelleAgence">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-university"></i>
                            </span>
                            <div class="form-line">
                                <!-- select Option Unite Commerciale -->
                                <select class="form-control show-tick" name="id_unite">
                                    <option>
                                        -- Choisir l'UC --
                                    </option>
                                    <?php foreach ($listeUC as $uc ): ?>
                                    <option value=<?=$uc['id_uc'] ?> >
                                        <?= $uc['Nom_UC'] ?>
                                    </option>
                                    <?php endforeach; ?>
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <div class="form-line">
                                <!-- select Option Responsable Agence -->
                                <select class="form-control show-tick" name="id_resp">
                                     <option>
                                        -- Choisir le Responsable --
                                    </option>
                                    <?php foreach ($getlisteUserByResponsable as $us ): ?>
                                    <option value=<?=$us['id'] ?>>
                                        <?= $us['username'] ?>
                                    </option>
                                    <?php endforeach; ?>
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-outline-warning waves-effect" name="Modifieragence">Modifier <i class="fa fa-paper-plane-o ml-1"></i></button>
                </div>
            </div>
            <!--/.Content-->
            </form>
        </div>
    </div>
