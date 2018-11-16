<?php require_once'header.php'; ?>
<?php require_once'sidebar.php'; ?>
<?php require_once'navebar.php'; ?>

          <!-- page content -->
          <div class="right_col" role="main">
            <!-- top tiles -->
            <!-- /top tiles -->  
            <br />
            <!-- Mon datatable -->
            <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      <h1><strong><center>Liste des <em>Unitées</em> Commerciales</center></strong></h1>
                    </p>
                    <?php include 'modalUC.php'; ?>
                    <button type="button" class="btn btn-primary" id="ajouterUC" data-toggle="modal" data-target="#ajouterUC" >Ajouter</button>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          
                          <th>Code Unite Commerciale</th>
                          <th>Nom de l'unite Commerciale</th>
                          <th>action</th>
                          <th>action</th>
                        </tr>
                      </thead>
                     <tbody>
                        <?php
                          foreach ($listeUC as $uc ){
                            $id=$uc['id_uc'];
                             echo "<tr>
                             <td>".$uc['Code_UC']."</td>
                             <td>".$uc['Nom_UC']."</td>
                             <td><a class=\"glyphicon glyphicon glyphicon-trash\" data-toggle=\"modal\" data-target=\".bs-example-modal-sm\"href=\"index.php?page=editfournisseur&id_uc=".$uc['id_uc']."\">Supprimer</a></td>

                             <td><a href=\"#modifUC$id\" data-toggle=\"modal\"  ><i class=\"glyphicon glyphicon-new-window\"></i>Modifier</a><td>
                             <tr>
                               
                             ";
                              include ('modalUC.php');
                          }
                        ?>
                    </tbody>
                        
      </table> 

      
                  <!-- debut formulaire md model -->
                  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Supprimer Unite Commerciale</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Unite Commerciale</h4>
                          <p>Vouler vous Vraiment Supprimer</p>
                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                          <button type="button" class="btn btn-danger">Supprimer</button>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- fin formulaire md model -->
      </div>
            <!-- Fin datatable -->
           






          </div>
          <!-- /page content -->
        <!-- footer content -->
       <?php require_once'footer.php'; ?>