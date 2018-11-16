
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
                        <div class="header">
                            <h2>
                                LISTE DES ERREURS DE CAISSE JOURNALIERES
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v fa-2x"></i>
                                    </a>
                                  <!--   <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul> -->
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
                                            <th>Numéro De Compte</th>
                                            <th>Code Opération</th>
                                            <th>Libelle</th>
                                            <th>Caisse</th>
                                            <th>Montant</th>
                                           
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
                                             
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                          <?php
                
                                              include_once '../model/db.php';
                                              $db=getConnexionBD();
                                              $sql="select * from listeErreur";
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
                                              </div>
                                            </div>
                                            </div>
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
            <!-- #END# Exportable Table -->
        </div>
    </section>
  <?php include_once'script.php'; ?>