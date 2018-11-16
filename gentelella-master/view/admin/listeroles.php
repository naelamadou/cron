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
                      <h1><strong><center>Liste des <em>roles</em></center></strong></h1>
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>nom_role</th>
                        </tr>
                      </thead>
                     <tbody>
                        <?php
                          foreach ($listeRole as $role ){
                             echo "<tr>
                             <td>".$role['id']."</td>
                             <td>".$role['nom_role']."</td>
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