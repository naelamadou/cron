<section>
    <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.jpg" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nom']; ?></div>
                    <div class="email"><h5><?php echo $_SESSION['email']; ?></h5></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header"><center>MENU</center></li>
                    <li class="active">
                        <a href="?page=admin">
                            <i class="fa fa-home fa-2x" style="color:#000000;"></i>
                            <span style="color:#000000;">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="fa fa-pie-chart fa-2x" style="color:#000000;"></i>
                            <span style="color:#000000;">Prospects</span>
                        </a>
                         <ul class="ml-menu">
                            <li>
                                <a href="?page=listeProspect">Liste des Prospects</a>
                            </li>
                             <li>
                                <a href="?page=listeProstrait">Liste des Prospects traités</a>
                            </li>
                            <li>
                                <a href="?page=listeNonProstrait">Liste des Prospects non traités</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=listeClient">
                            <i class="fa fa-bar-chart fa-2x" style="color:#000000;"></i>
                            <span style="color:#000000;">Clients</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="?page=listeClient">Liste des Clients</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=listuser" class="menu-toggle">
                            <i class="fa fa-users fa-2x" style="color:#000000;"></i>
                            <span style="color:#000000;">Utilisateurs</span>
                        </a>
                      
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal" style="background-color:grey;">
                <div class="copyright">
                    &copy SGBS 2018 <a href="javascript:void(0);"">DCPP-CONQRETE</a>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
</section>