<nav class="navbar" style="background-color: #de394a;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">SOGESEGL-SGBS</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php  
                    include_once '../model/db.php';
                   $db=getConnexionBD();
                    $sql ="SELECT * FROM commentaire";
                    $req=$db->query($sql);
                    $s = $req->rowCount();
                    ?>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-bell fa-2x"></i>
                            <span class="label-count"><?php echo $s ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <?php
                                          $db=getConnexionBD();
                                          $sql="select com.id_users,com.heure,u.username from
                                                commentaire com,users u
                                                where com.id_users=u.id;";
                                          /*select * from commentaire com,users u,agence ag,listeerreur le where com.id_users=u.id and com.id_agence=ag.id and com.id_erreur=le.id and com.id_users='2'*/
                                          $req=$db->query($sql);
                                          $t= $req->fetchAll();
                                         $i=0;
                                         //$j=$nbCommentaire-5;
                                          foreach ($t as $com ){
                                            $i++;
                                            if ($i>$nbCommentaire-5) {
                                                 echo "
                                                 <li>
                                                    <a href=\"javascript:void(0);\">
                                                        <div class=\"icon-circle bg-cyan\">
                                                            <i class=\"fa fa-user\"></i>
                                                        </div>
                                                        <div class=\"menu-info\">
                                                            <h4>".$com['username']."</h4>
                                                            <p>
                                                            <h6 class=\"message\">".$com['heure']."</h6>
                                                            </p>
                                                        </div>     
                                                    </a>
                                                 </li>
                                                 ";
                                            }   
                                          }
                                          $update;
                                            ?>
                                    </li>
                                  </ul>
                                </li>     
                            
                            <li class="footer">
                                <a href="#">Voir tous les commentaires</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-user fa-2x"></i>
                            <span class="label-count">9</span>
                        </a>
                       
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="./../index.php" class="js-right-sidebar" data-close="true"><i class="fa fa-sign-out pull-right fa-2x"></i>se Déconnecter</a></li>
                </ul>
            </div>
        </div>
    </nav>