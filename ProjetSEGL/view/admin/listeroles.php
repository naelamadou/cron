
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
                                LISTE DES ROLES
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v fa-2x"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" data-color="red" class="btn bg-purple waves-effect" data-toggle="modal" data-target="#ajouterAgence">Ajouter</a></li>
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
                                          <th>id</th>
                                         <th>nom_role</th>
                                         <th>Action</th> 
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                         <th>id</th>
                                        <th>nom_role</th>
                                        <th>Action</th>  
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                         <?php
                                          foreach ($listeRole as $role ){
                                             echo "<tr>
                                             <td>".$role['id']."</td>
                                             <td>".$role['nom_role']."</td>
                                             <td class='row clearfix js-sweetalert'><a class='btn btn-danger' href='' onclick='return confirm(\" Voulez vous supprimer?\");'><i class='fa fa-trash'></i></a>
                                            <a class='btn btn-primary' href=''><i class='fa fa-pencil'></i></a></td>
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
                      <!--  <div class="body">
                            <div class="button-demo js-modal-buttons">
                                <button type="button" data-color="red" class="btn bg-red waves-effect" data-toggle="modal" data-target="#ajouterAgence">Ajouter</button>
                              </div>
                        </div>
                    Large Size -->      
                   
          <!--   <button type="button" class="btn bg-red waves-effect" data-color="red" data-toggle="modal" data-target="#ajouterAgence" >Ajouter</button> -->
            <!-- Fin datatable -->
                              <!--Debut Formulaire Large modal ajouter UC -->
                  <div class="modal fade bs-example-modal-lg" id="ajouterAgence" tabindex="-1" role="dialog" aria-hidden="true" >
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel"><strong><center>Ajout Utilisateur</center></strong></h4>
                        </div>
                        <div class="modal-body">
                          <!-- debut de mon formulaire ajout -->
                             
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">envoyer</button>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!--FIN Formulaire Large modal ajouter UC -->
        </div>
    </section>
  <?php include_once'script.php'; ?>