    
<div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="http://localhost/mesprojets/gentelella-master/controller/userController.php?page=1" class="site_title"><i class="fa fa-bank"></i> <span>SOGESEGL</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../img/Sgbs_logo (1).PNG" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['username'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Aministrateur</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Accueil <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="http://localhost/mesprojets/gentelella-master/controller/userController.php?page=1">Dashboard</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Erreur de Caisse <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="http://localhost/mesprojets/gentelella-master/controller/userController.php?page=2">Liste des erreurs de caisse</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Agence <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="http://localhost/mesprojets/gentelella-master/controller/userController.php?page=3">Liste des agences</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Utilisateurs <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="http://localhost/mesprojets/gentelella-master/controller/userController.php?page=4">Liste utilisateurs</a></li>
                     
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Roles <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="http://localhost/mesprojets/gentelella-master/controller/userController.php?page=5">liste des roles</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Unites Commerciales <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="http://localhost/mesprojets/gentelella-master/controller/userController.php?page=6">liste des unites commerciales</a></li>
                      <!-- <li><a href="fixed_footer.html">Fixed Footer</a></li> -->
                    </ul>
                  </li>
                </ul>
              </div>
             
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="http://localhost/mesprojets/gentelella-master/">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
