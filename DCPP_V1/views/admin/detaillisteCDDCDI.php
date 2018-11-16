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
               <center><h2>TABLEAU DE BORD DES PROSPECTS</h2></center> 
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-user fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">NOMBRE TOTAL DES PROSPECTS</div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo "$Prospect"; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-book fa-2x fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">NOMBRE TOTAL DE PROSPECTS TRAITES </div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo  ""; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-book fa-2x fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">NOMBRE TOTAL DE PROSPECTS NON TRAITES</div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo ""; ?>" data-speed="15" data-fresh-interval="20"></div>
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
                            <h2> LISTE DES PROSPECTS</h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                             <th></th>
                                             <th>Date</th>
                                              <th>NomComplet</th>
                                              <th>Employeur</th>
                                              <th>Disponibilite</th>
                                              <th>Type de Contrat</th>
                                              <th>Banque</th>
                                              <th>Action</th>
                                              <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th></th>
                                            <th>Date</th>
                                            <th>NomComplet</th>
                                            <th>Employeur</th>
                                            <th>Disponibilite</th>
                                            <th>Type de Contrat</th>
                                            <th>Banque</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                         <?php 
                                            foreach ($listcdd as $reponse) {
                                              $id=$reponse['id'];
                                            echo "
                                              <tr>
                                                <td></td>
                                                <td>".$reponse['Date']." </td>
                                                <td>".$reponse['NomComplet']."</td>
                                                <td>".$reponse['Employeur']."</td>
                                                <td>".$reponse['Disponibilite']."</td>
                                                 <td>".$reponse['Typedecontrat']."</td>
                                                <td style='background:blue;'>".$reponse['Banque']."</td>
                                                <td><a href=\"?page=listegestionnaire\">Affecter</a></td>
                                                <td><a href=\"#MiseàJour$id\" data-toggle=\"modal\"  ><i class=\"glyphicon glyphicon-new-window\"></i>MiseàJour</a></td>
                                              </tr>";
                                            }

                                        foreach ($listcdi as $reponse) {
                                              $id=$reponse['id'];
                                            echo "
                                              <tr>
                                                <td></td>
                                                <td>".$reponse['Date']." </td>
                                                <td>".$reponse['NomComplet']."</td>
                                                <td>".$reponse['Employeur']."</td>
                                                <td>".$reponse['Disponibilite']."</td>
                                                <td>".$reponse['Typedecontrat']."</td>
                                                <td style='background:grey;'>".$reponse['Banque']."</td>
                                                <td><a href=\"?page=listegestionnaire\">Affecter</a></td>
                                                <td><a href=\"#MiseàJour$id\" data-toggle=\"modal\"  ><i class=\"glyphicon glyphicon-new-window\"></i>MiseàJour</a></td>
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