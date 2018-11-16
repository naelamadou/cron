<?php include_once 'header.php'; ?>
 <?php include_once 'sidebar.php'; ?>  
 <?php include_once 'navebar.php'; ?>  
          <!-- page content -->
          <div class="right_col" role="main">
            <!-- top tiles -->
            <!-- /top tiles -->  
            <br />
            <!-- Mon datatable -->
            <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      <h1><strong><center>Liste des <em>erreurs > 50 000</em> de caisse</center></strong></h1>
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Date comptable</th>
                          <th>Agence</th>
                          <th>Numéro de compte</th>
                          <th>Code opération</th>
                          <th>Libelle</th>
                          <th>Caisse</th>
                          <th>Mon</th>
                  <th >Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                
                    include_once '../model/db.php';
                    $db=getConnexionBD();
                    $sql="select * from listeErreur where MON>50";
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
                            <td> <?php echo $res['MON']?> </td>
                            <td colspan=\"2\">
                              <?php echo"
                                <div class=\"btn-group\">
                                  <a href=\"#envoyerErreur$id\" class=\" btn btn-round btn-info btn-md\" data-toggle=\"modal\" title=\"Envoyer\">
                                    <i class=\"glyphicon glyphicon-share-alt\"></i>
                                  </a>";
                              ?>
                             <?php echo"
                               <a href=\"#voirdetail$id\" class=\" btn btn-round btn-primary btn-md\" data-toggle=\"modal\"  title=\"Voir détails\"><i class=\"glyphicon glyphicon-eye-open\"></i> 
                               </a>";
                              ?>
                                </div>
                            </td>
                             <?php 
                             
                              include 'modal.php';

                              ?>
                         </tr>
                          
                        <?php
                    }
                ?>
              </tbody>
                        
      </table>
      
                  <!--Debut Formulaire Large modal -->
            
                  <!--Debut Formulaire Large modal -->


                    <!--Debut Formulaire Large voirdetail -->
                 
                  <!--Debut Formulaire Large modal -->
      </div>
            <!-- Fin datatable -->

          </div>
          <!-- /page content -->

  <?php include_once 'footer.php'; ?>  