<?php include_once'header.php';?>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- Top Bar -->
<?php include_once'navbar.php';?>
<!-- #Top Bar -->

<!-- sidebar -->
<?php include_once'sidebar.php';?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <!--  <h2>Liste</h2> -->
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            LISTE DES UNITES COMMERCIALES
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-2x"></i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);" data-color="red" class="btn bg-purple waves-effect" data-toggle="modal" data-target="#ajouterUC">Ajouter</a></li>
                                    <!-- <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li> -->
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="font-size: 14px; font-family: 'Calibri';">
                                <thead>
                                    <tr>
                                        <th>Code Unite Commerciale</th>
                                        <th>Nom de l'unite Commerciale</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Code Unite Commerciale</th>
                                        <th>Nom de l'unite Commerciale</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                              foreach ($listeUC as $uc ){
                                                $id=$uc['id_uc'];
                                                 echo "<tr>
                                                 <td>".$uc['Code_UC']."</td>
                                                 <td>".$uc['Nom_UC']."</td>
                                                 <td class='row clearfix js-sweetalert'><a class='btn btn-danger' href='' onclick='return confirm(\" Voulez vous supprimer?\");'><i class='fa fa-trash'></i>
                                                 </a>
                                                  <a class='btn btn-primary' data-toggle=\"modal\" href=\"#modifUC$id\"><i class='fa fa-pencil'></i></a></td>
                                                 </tr>
                                                   
                                                 ";
                                                  include ('modalUC.php');
                                              }
                                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <form method="post" action="../controller/userController.php">
            <div class="modal fade" id="ajouterUC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-notify modal-warning" role="document">

                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header text-center">
                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Ajouter Une unité commerciale</h4>
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
                                        <input type="text" class="form-control date" placeholder="Code unite" name="Code_UC">
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
                                        <input type="text" class="form-control date" placeholder="Nom unite" name="Nom_UC">
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!--Footer-->
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-outline-warning waves-effect" name="addUC">Ajouter <i class="fa fa-paper-plane-o ml-1"></i></button>
                        </div>
                    </div>
                    <!--/.Content-->

                </div>

            </div>
        </form>
    </div>
</section>
<?php include_once'script.php'; ?>