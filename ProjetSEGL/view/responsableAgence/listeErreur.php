
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
            </div>
             <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="messages">
                       <?php if(isset($_GET['envoyer'])&&$_GET['envoyer'] == 1) : ?>
                           <!--  echo '<script> alert("Mot de passe et/ou identifiant incorrect");</script>'; -->
                            <div class="alert alert-success alert-dismissible" role="alert">
                              <strong>Success!</strong> Votre Grille a bien été envoyé.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        <?php endif ?>
                        <div class="header">
                            <h2>
                                LISTE DES ERREURS PROVENANT DU R.O
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
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="font-size: 14px; font-family: 'Calibri';">
                                    <thead>
                                         <tr>
                                          <th>Date Comptable</th>
                                          <th>Agence</th>
                                          <th>Numéro de ompte</th>
                                          <th>Code Opération</th>
                                          <th>Caisse</th>
                                          <th>MONTANT</th>
                                          <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>Date Comptable</th>
                                          <th>Agence</th>
                                          <th>Numéro de ompte</th>
                                          <th>Code Opération</th>
                                          <th>Caisse</th>
                                          <th>MONTANT</th>
                                          <th>Actions</th>  
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                                include_once '../model/db.php';
                                                $db=getConnexionBD();
                                                $sql="select * from 
                                                commentaire com,users u,agence ag,listeerreur le 
                                                where com.id_users=u.id 
                                                and com.id_agence=ag.id 
                                                and com.id_erreur=le.id
                                                and le.status='1' and 
                                                ag.id_resp='" . $_SESSION['id'] . "'
                                                and le.MON>50000
                                                ";
                                                //var_dump($_SESSION['id']);
                                                $req=$db->query($sql);
                                                while ($res=$req->fetch()) {
                                                    $id = $res['id'];
                                                    ?>
                                                    <tr>
                                                        <td> <?php echo $res['DCO']?> </td>
                                                        <td> <?php echo $res['AGE']?> </td>
                                                        <td> <?php echo $res['NCP']?> </td>
                                                        <td> <?php echo $res['OPE']?> </td>
                                                        <td> <?php echo $res['CAISSE']?> </td>
                                                        <td> <?php echo number_format(intval($res['MON']), 0, '.', ' ')?> </td>
                                                       <td colspan=\"2\">
                                                            <?php echo"
                                                              <div class=\"btn-group\">
                                                                <a href=\"#envoyerErreur$id\" class=\" btn btn-round btn-info btn-md\" data-toggle=\"modal\" title=\"Remplir la grille\">
                                                                  <i class=\"glyphicon glyphicon-share-alt\"></i>
                                                                </a>";
                                                            ?>
                                                           <?php echo"
                                                            <a href=\"#voirdetail$id\" class=\" btn btn-round btn-primary btn-md\" data-toggle=\"modal\"  title=\"Voir détails\">
                                                             <i class=\"glyphicon glyphicon-eye-open\"></i> 
                                                             </a>";
                                                            ?>
                                                              </div>
                                                        </td>
                                                         <?php include 'modal.php'; ?>
                                                     </tr>
                                                      
                                                    <?php
                                                }
                                                $UpdateErreurByStatusGrille;
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
  <!-- <td class='row clearfix js-sweetalert'><a class='btn btn-danger' href='' onclick='return confirm(\" Voulez vous supprimer?\");'><i class='fa fa-trash'></i></a>
                                            <a class='btn btn-primary' href=''><i class='fa fa-pencil'></i></a></td> -->