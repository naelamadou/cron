
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
               <!--  <h2>DASHBOARD</h2> -->
            </div>
             <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="messages">
                        <div class="header">
                            <h2>
                                LISTE DES ERREURS ET GRILLES
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v fa-2x"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" data-color="red" class="btn bg-purple waves-effect" data-toggle="modal" data-target="#ajouterAgence">Ajouter</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body" style="font-family: "Times New Roman", Times, serif;">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="font-size: 14px; font-family: 'Calibri';">
                                    <thead style="width: 120px">
                                         <tr>
                                          <th>Date Comptable</th>
                                          <th>Agence</th>
                                          <th>Numéro De Compte</th>
                                          <th>Code Opération</th>
                                          <th>Libelle</th>
                                          <th>Caisse</th>
                                          <th>Montant</th>
                                          <th>Grille</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>Date Comptable</th>
                                          <th>Agence</th>
                                          <th>Numéro De Compte</th>
                                          <th>Code Opération</th>
                                          <th>Libelle</th>
                                          <th>Caisse</th>
                                          <th>Montant</th>
                                          <th>Grille</th>
                                          <!-- <th>Actions</th>  --> 
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                          include_once '../model/db.php';
                                          $db=getConnexionBD();
                                          $sql="select * from 
                                          poursuite,listeerreur 
                                          where poursuite.id_listeErreur=listeerreur.id";
                                          $req=$db->query($sql);
                                          while ($res=$req->fetch()) {
                                              $id = $res['id'];
                                              ?>
                                              <tr>
                                                  <td> <?php echo $res['DCO']?> </td>
                                                  <td> <?php echo $res['AGE']?> </td>
                                                  <td> <?php echo $res['NCP']?> </td>
                                                  <td> <?php echo $res['OPE']?> </td>
                                                  <td> <?php echo $res['LIBELLE']?> </td>
                                                  <td> <?php echo $res['CAISSE']?> </td>
                                                  <td> <?php echo number_format(intval($res['MON']), 0, '.', ' ')?> </td>
                                                  <td><a href="./../upload/<?php echo $res['fichier']?>" > <?php echo $res['fichier']?></a> </td>
                                                  
                                                     </tr>
                                                      
                                                    <?php
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
    </section>
  <?php include_once'script.php'; ?>