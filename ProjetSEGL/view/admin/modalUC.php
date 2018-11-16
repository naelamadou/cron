<!-- banee -->
 <form method="post" action="../controller/userController.php">
            <div class="modal fade" id="modifUC<?=$id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-notify modal-warning" role="document">

                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header text-center">
                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Modifier Une unité commerciale</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="red-text">&times;</span>
                            </button>
                        </div>

                        <!--Body-->
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class=" fa fa-bank"></i>
                                    </span>
                                    <!-- code Agence -->
                                    <div class="form-line">
                                        <input type="text" class="form-control date" value="<?=$uc['Code_UC']?>" name="Code_UC">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class=" fa fa-bank"></i>
                                    </span>
                                    <!-- libelle Agence -->
                                    <div class="form-line">
                                        <input type="text" class="form-control date" value="<?=$uc['Nom_UC']?>" name="Nom_UC">
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!--Footer-->
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-outline-warning waves-effect" name="modifUC">Modifier <i class="fa fa-paper-plane-o ml-1"></i></button>
                        </div>
                    </div>
                    <!--/.Content-->

                </div>

            </div>
        </form>