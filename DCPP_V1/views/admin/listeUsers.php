<!DOCTYPE html>
<html>


<?php include_once'header.php';?>

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
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
          <a class='btn btn-primary inline-block' data-toggle="modal" data-target="#ajouterUtilisateur"><i class='fa fa-plus'>Ajouter Utilisateur</i></a>
            <div class="block-header">
               <center><h2></h2></center> 
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
               
            </div>
            <!-- #END# Widgets -->
             <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste des Utilisateurs
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                       <!--  <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li> -->
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                          <th></th>
                                          <th>NOM</th>
                                          <th>EMAIL</th>
                                          <th>MOT DE PASSE</th>
                                          <th>ROLE</th>
                                          <th>AGENCE</th>
                                          <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th></th>
                                          <th>NOM</th>
                                          <th>EMAIL</th>
                                          <th>MOT DE PASSE</th>
                                          <th>ROLE</th>
                                          <th>AGENCE</th>
                                          <th>ACTION</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php
                                        //var_dump($liste);
                                          foreach ($listeUtilisateurs as $user) {
                                           echo "<tr>
                                           <td></td>
                                          <td>".$user['nom']."</td>
                                          <td>".$user['email']."</td>
                                          <td>".$user['password']."</td>
                                          <td>".$user['libelle_role']."</td>
                                          <td>".$user['libelleAgence']."</td>
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
        </div>
    </section>
   
  <?php include_once'script.php'; ?>

 <div class="modal fade bs-example-modal-lg" id="ajouterUtilisateur" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h2 class="modal-title" id="myModalLabel"> <strong><center>Voir les Details de La liste des prospects</center></strong></h2>
        </div>
    <div class="modal-body">
      <!-- debut formulaire pour voir les Voirdetails -->
            <form method="post" action="../controller/userController.php">
               
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
                                
                            </select>
                          </div>
                      </div>
                  </div>
              </div>

               <!--Footer-->
              <div class="modal-footer justify-content-center">
                  <button type="submit" class="btn btn-outline-warning waves-effect" name="addUsers">Ajouter <i class="fa fa-paper-plane-o ml-1"></i></button>
              </div>
  </form>
                                              <!-- fin formulaire Voirdetails -->
    </div>
  </div>
</div>
  </div>
    </div>            
                          <!-- fin formulaire commentaire -->
                      
                          
                    
    <!-- Jquery Core Js -->
    

  

 
            
        
          <!-- SweetAlert Plugin Js -->
<script src='plugins/sweetalert/sweetalert.min.js'></script>

          


<script type="text/javascript">
 
            $(function () {
    $('.js-sweetalert button').on('click', function () {
        var type = $(this).data('type');
        if (type === 'confirm') {
            showConfirmMessage();
        }
        
    });
});

//These codes takes from http://t4t5.github.io/sweetalert/


$(document).on('click', '.button', function (e) { 
    e.preventDefault(); 
    var id = $(this).data('id'); 
    swal({
        title: "Vraiment?",
        text: "Voulez vous supprimer l'Utilisateur!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Oui, supprimer!",
        closeOnConfirm: false
    }, function () {
        swal("Success!", "L'Utilisateur supprimé!", "success");
    });
});


</script>      
         
  
</body>
</html>