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
            <!--  <h2>LISTE</h2> -->
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            LISTE DES UTILISATEURS
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-2x"></i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);" data-color="red" class="btn bg-purple waves-effect" data-toggle="modal" data-target="#ajouterUtilisateur">Ajouter</a></li>
                                   <!--  <li><a href="javascript:void(0);">Another action</a></li>
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
                                        <th>username</th>
                                        <th>email</th>
                                        <th>password</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>username</th>
                                        <th>email</th>
                                        <th>password</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                          foreach ($listeUser as $user){
                                            $id=$user['id'];
                                             echo "<tr>
                                             <td>".$user['username']."</td>
                                             <td>".$user['email']."</td>
                                             <td>".$user['password']."</td>
                                             <td>".$user['nom_role']."</td>
                                             <td class='row clearfix js-sweetalert'><a class='btn btn-danger' href='' onclick='return confirm(\" Voulez vous supprimer?\");'><i class='fa fa-trash'></i></a>
                                            
                                             <a class='btn btn-primary' data-toggle=\"modal\" href=\"#modifUsers$id\"><i class='fa fa-pencil'></i></a></td>
                                             </tr>";
                                             include 'modalUsers.php';
                                          }

                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
        <!-- DEBUT fenetre modal pour Ajouter un utlisateur -->
        <div class="row">
            <form method="post" action="../controller/userController.php">
                <div class="modal fade" id="ajouterUtilisateur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-notify modal-warning" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header text-center">
                                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Ajouter Un Utilisateur</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <div class="form-line">
                                            <!-- Nom d'utilisateur -->
                                            <input type="text" class="form-control date" placeholder="Nom utilisateur" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <div class="form-line">
                                            <!-- email -->
                                            <input type="text" class="form-control date" placeholder="Votre email">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-unlock"></i>
                                        </span>
                                        <div class="form-line">
                                            <!-- password -->
                                            <input type="text" class="form-control date" placeholder="Votre Mot de pass">
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
                                            <select class="form-control show-tick" name="id_ro">
                                                <option>--Selectionnez Un Role</option>
                                                  <?php foreach ($listeRole as $ro ): ?>   
                                                    <option value= <?= $ro['id'] ?> >
                                                      <?= $ro['nom_role'] ?>
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
                                <button type="submit" class="btn btn-outline-warning waves-effect" name="addUsers">Ajouter <i class="fa fa-paper-plane-o ml-1"></i></button>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
        
             </form>
        <!-- FIN fenetre modal pour Ajouter un utlisateur -->
    </div>
</section>
<?php include_once'script.php'; ?>
