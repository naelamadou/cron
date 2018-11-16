
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
                <h2>DASHBOARD</h2>
            </div>
             <!-- Exportable Table -->
            <div class="row clearfix">
               <!--  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXPORTABLE TABLE
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
                        
                    </div>
                </div> -->
                 <!-- Basic Card - With Loading -->
            <div class="block-header">
                <h2>
                    LISTE DES COMMENTAIRES
                    <!-- <small>Please click the refresh button right top of cards you want to activate loading. Taken from <a href="https://github.com/vadimsva/waitMe" target="_blank">https://github.com/vadimsva/waitMe</a></small> -->
                </h2>
                 <?php  
                    include_once '../model/db.php';
                   $db=getConnexionBD();
                    $sql ="SELECT * FROM commentaire";
                    $req=$db->query($sql);
                    $s = $req->rowCount();
                    ?>
            </div>
            <div class="row clearfix">
                    <?php
                        $db=getConnexionBD();
                        $sql="select * from commentaire,users,agence where commentaire.id_users=users.id and commentaire.id_agence=agence.id";
                        $req=$db->query($sql);
                        $t= $req->fetchAll();
                       $i=0;
                       //$j=$nbCommentaire-5;
                        foreach ($t as $com ){
                           echo "
                           <div class=\"col-lg-4 col-md-4 col-sm-6 col-xs-12\">
                                      <div class=\"card\">
                                          <div class=\"header bg-red\">
                                              <h2>
                                                  ".$_SESSION['username']." <small>".$com['heure']."</small>
                                              </h2>
                                              <ul class=\"header-dropdown m-r--5\">
                                                  <li>
                                                      <a href=\"javascript:void(0);\" data-toggle=\"cardloading\" data-loading-effect=\"timer\">
                                                         
                                                      </a>
                                                  </li>
                                                  <li class=\"dropdown\">
                                                      <a href=\"javascript:void(0);\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                                          <i class=\"fa fa-ellipsis-v fa-2x\"></i>
                                                      </a>
                                                      <ul class=\"dropdown-menu pull-right\">
                                                          <li><a href=\"javascript:void(0);\">Action</a></li>
                                                          <li><a href=\"javascript:void(0);\">Another action</a></li>
                                                          <li><a href=\"javascript:void(0);\">Something else here</a></li>
                                                      </ul>
                                                  </li>
                                              </ul>
                                          </div>
                                          <div class=\"body\">
                                           <div><strong>".$com['libelleAgence']."</strong></div>
                                             ".$com['desc_com']."
                                          </div>
                                      </div>
                                  </div>
                           ";
                             
                        }
                        $update;
                      ?>
              
            </div>
            <!-- #END# Basic Card - With Loading -->
            </div>
           
        </div>
    </section>
  <?php include_once'script.php'; ?>