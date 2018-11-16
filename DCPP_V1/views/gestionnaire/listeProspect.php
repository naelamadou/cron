<!DOCTYPE html>
<html>


<?php include_once'header.php';?>
<body class="theme-red">
    
        
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    
    <!-- Top Bar -->
    <?php include_once'navbar.php';?>
    <!-- #Top Bar -->

    <!-- sidebar -->
    <?php include_once'sidebar.php';?>
    <!-- #sidebar -->

    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
               <center><h2>TABLEAU DE BORD DES AUTORISATIONS</h2></center> 
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-book fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">NOMBRE DE COMPTES</div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo $nbCpte; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-book fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">LIGNES AUTORISATIONS</div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo $nbLAut; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-book fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">LIGNES EN DEPASSEMENT</div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo $nbAutDepas; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-book fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">AUTORISATIONS NON UTILISEES</div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo $nbAutNonUt; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-book fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">AUTORISATIONS ECH -1 MOIS</div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo $nbechoir; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-book fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">CDSMC DEPUIS + 1 SEMAINE</div>
                            <div class="number count-to" data-from="0"
                                 data-to="<?php echo $nbCDSMC; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
             <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXPORTABLE TABLE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body" style="font-family: "Times New Roman", Times, serif;">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                          <th>CLI</th>
                                          <th>NOM</th>
                                          <th>COMPTE</th>
                                          <th>GESTIONNAIRE</th>
                                          <th>SOLDE</th>
                                          <th>MAUT</th>
                                          <th>DEBUT</th>
                                          <th>FIN</th>
                                          <th>Date ECHEANCE</th>
                                          <th>Vusialiser</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>CLI</th>
                                          <th>NOM</th>
                                          <th>COMPTE</th>
                                          <th>GESTIONNAIRE</th>
                                          <th>SOLDE</th>
                                          <th>MAUT</th>
                                          <th>DEBUT</th>
                                          <th>FIN</th>
                                          <th>Date ECHEANCE</th>
                                          <th>Vusialiser</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php
                        //var_dump($liste);
                          foreach ($listeAutorisations as $aut) {
                           echo "<tr>
                                  <td>".$aut['CLI']."</td>
                                  <td>".$aut['NOM']."</td>
                                  <td>".$aut['NCP']."</td>
                                  <td>".$aut['GESTIONNAIRE']."</td>
                                  <td>".$aut['SDE']."</td>
                                  <td>".$aut['MAUT']."</td>
                                  <td>".$aut['DEBUT']."</td>
                                  <td>".$aut['FIN']."</td>
                                  <td>".$aut['DATE_ECHEANCE']."</td>
                                  <td><a class='btn btn-success' href='?page=detailAuto&cli=".$aut['CLI']."&nom=".$aut['NOM']."&ncp=".$aut['NCP']."&ges=".$aut['GESTIONNAIRE']."&sde=".$aut['SDE']."&maut=".$aut['MAUT']."&debut=".$aut['DEBUT']."&fin=".$aut['FIN']."&date=".$aut['DATE_ECHEANCE']."'><i class='fa fa-eye'></i> voir</a></td>
                                 

                              </tr>";
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

        </div>
    </section>
   
  <?php include_once'script.php'; ?>

</body>
</html>