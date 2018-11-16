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
                      <h1><strong><center>Liste des <em>Utilisateurs</em> de la banque</center></strong></h1>
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>username</th>
                          <th>email</th>
                          <th>password</th>
                          <th>id_role</th>   
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ($listeUser as $user ){
                             echo "<tr>
                             <td>".$user['username']."</td>
                             <td>".$user['email']."</td>
                             <td>".$user['password']."</td>
                             <td>".$user['nom_role']."</td>
                             </tr>";
                          }
                        ?>
                    </tbody>
                        
      </table>
      </div>
            <!-- Fin datatable -->
           






          </div>
          <!-- /page content -->
        <!-- footer content -->
   <?php require_once'footer.php'; ?>