
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
           <!-- Hover Zoom Effect -->
            <div class="block-header">
                <!-- <h2>HOVER ZOOM EFFECT</h2> -->
               
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-pink">
                            <i class="fa fa-pie-chart fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">Erreurs Non Envoyées</div>
                            <div class="number">?</div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-blue">
                            <i class="fa fa-pie-chart fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">Erreurs déja Envoyées</div>
                            <div class="number"><?php echo $getNblisteNonTraite; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-cyan">
                            <i class="fa fa-line-chart fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">Grilles recus </div>
                            <div class="number">07:00 AM</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-cyan">
                            <i class="fa fa-line-chart fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">Grille Envoye</div>
                            <div class="number">Turkey</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Zoom Effect -->
            <div class="block-header">
                <!-- <h2>DASHBOARD</h2> -->
            </div>
             <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="messages">
                         <?php if(isset($_GET['envoyer'])&&$_GET['envoyer'] == 1) : ?>
                           <!--  echo '<script> alert("Mot de passe et/ou identifiant incorrect");</script>'; -->
                            <div class="alert alert-success alert-dismissible" role="alert">
                              <strong>Success!</strong> Votre commentaire a bien été envoyé.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        <?php endif ?>
                        <div class="header">
                            <h2>
                                Liste des Erreurs de Caisse < 50 000 CFA
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v fa-2x"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="?page=8" class="btn bg-red waves-effect" > 50 000</a></li>
                                        <li><a href="?page=13" class="btn bg-purple waves-effect"> < 50 000</a></li>
                                        <li><a href="javascript:void(0);" class="btn bg-primary waves-effect">TOUT LES ERREURS</a></li>
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
                                          <th>Numéro de Compte</th>
                                          <th>Code Opération</th>
                                          
                                          <th>Caisse</th>
                                          <th>Montant</th>
                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>Date Comptable</th>
                                          <th>Agence</th>
                                          <th>Numéro de Compte</th>
                                          <th>Code Opération</th>
                                          
                                          <th>Caisse</th>
                                          <th>Montant</th>
                                          
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                                include_once '../model/db.php';
                                                $db=getConnexionBD();
                                                $sql="select * from listeerreur where MON<50000  and status = 0";
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
                                                       
                                                         <?php include 'modal.php'; ?>
                                                     </tr>
                                                      
                                                    <?php
                                                }
                                                $update;
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