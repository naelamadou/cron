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
                                          $sql="select * from commentaire,users where commentaire.id_users=users.id and commentaire.id_users='4'";
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
                        <!-- <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Footer display issue
                                                <small>32%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Make new buttons
                                                <small>45%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Create new dashboard
                                                <small>54%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Solve transition issue
                                                <small>65%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Answer GitHub questions
                                                <small>92%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul> -->
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="./../index.php" class="js-right-sidebar" data-close="true"><i class="fa fa-sign-out pull-right fa-2x"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>