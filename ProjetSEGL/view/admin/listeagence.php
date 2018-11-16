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
            <!-- <h2>LISTE</h2> -->
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <?php if(isset($_GET['envoyer'])&&$_GET['envoyer'] == 1) : ?>
                           <!--  echo '<script> alert("Mot de passe et/ou identifiant incorrect");</script>'; -->
                            <div class="alert alert-success alert-dismissible" role="alert">
                              <strong>Succés!</strong> Votre Agence a bien été Ajouté.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        <?php endif ?>
                    <?php if(isset($_GET['modifier'])&&$_GET['modifier'] == 1) : ?>
                           <!--  echo '<script> alert("Mot de passe et/ou identifiant incorrect");</script>'; -->
                            <div class="alert alert-success alert-dismissible" role="alert">
                              <strong>Succés!</strong> Votre Agence a bien été modifié.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        <?php endif ?>
                    <div class="header">
                        
                        <h2 class="card-inside-title">
                            LISTE DES AGENCES
                        </h2>

                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-2x"></i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                   <li><a href="javascript:void(0);" data-color="red" class="btn bg-info waves-effect" data-toggle="modal" data-target="#ajouterAgence">Ajouter Agence</a></li>
                                   <!--  <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li> -->
                                </ul>
                            </li>
                        </ul>
                    </div>
                   
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable"  style="font-size: 14px; font-family: 'Calibri';">
                                <thead>
                                    <tr>
                                        <th>Code Agence</th>
                                        <th>Libelle Agence</th>
                                        <th>Unités Commerciales</th>
                                        <th>Responsable Agence</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Code Agence</th>
                                        <th>Libelle Agence</th>
                                        <th>Unités Commerciales</th>
                                        <th>Responsable Agence</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                      foreach ($listeAgenceByUcByUsers as $a ){
                                        $id=$a['id'];
                                         echo "<tr>
                                         <td>".$a['codeAgence_UC']."</td>
                                         <td>".$a['libelleAgence']."</td>
                                         <td>".$a['Nom_UC']."</td>
                                         <td>".$a['username']."</td>
                                         <td class='row clearfix js-sweetalert'><a class='btn btn-danger' href='' onclick='return confirm(\" Voulez vous supprimer?\");'><i class='fa fa-trash'></i>
                                         </a>
                                          <a class='btn btn-primary' data-toggle=\"modal\" href=\"#modifAgence$id\"><i class='fa fa-pencil'></i></a></td>
                                         </tr>
                                            

                                         ";
                                          include 'modalAgence.php';
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
                <div class="modal fade" id="ajouterAgence" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-notify modal-warning" role="document">
                      
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header text-center">
                                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Ajouter Agence</h4>
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
                                        <!-- code Agence -->
                                        <div class="form-line">
                                            <input type="text" class="form-control date" placeholder="Code de l'agence" name="codeAgence_UC">
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
                                            <input type="text" class="form-control date" placeholder="libelle de l'Agence" name="libelleAgence">
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
                                              <option>--Selectionnez Une Unite Commercial --</option>
                                              <?php foreach ($listeUC as $uc ): ?>   
                                                <option value= <?= $uc['id_uc'] ?> >
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
                                                <option>--Selectionnez Un Responsable Agence</option>
                                                  <?php foreach ($getlisteUserByResponsable as $us ): ?>   
                                                    <option value= <?= $us['id'] ?> >
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
                                <button type="submit" class="btn btn-outline-warning waves-effect" name="addAgence">Ajouter <i class="fa fa-paper-plane-o ml-1"></i></button>
                            </div>
                        </div>
                        <!--/.Content-->
                           
                    </div>

                </div>
                </form>
            </div>
</section>
<?php include_once'script.php'; ?>
