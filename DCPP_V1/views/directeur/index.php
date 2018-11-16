<!DOCTYPE html>
<html>
<?php include_once'header.php';?>
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

            <div class="block-header">
               <center><h2>TABLEAU DE BORD DES PROSPECTS</h2></center> 
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-user fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">PROSPECTS</div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo ""; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-book fa-2x fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text"> PROSPECTS TRAITES</div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo  ""; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-book fa-2x fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">PROSPECTS NON TRAITES</div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo ""; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-book fa-2x fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">nombre total prostects Banque/sans Banque</div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo ""; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>             
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <div class="row clearfix">
                <!-- Pie Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>nombre total prostects CDI/CDD</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                       <i class="fa fa-eye fa-2x"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="?page=dPAE">Voir Details</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <canvas id="paea" height="50" width="140" style="margin:0"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Pie Chart -->
                <!-- Pie Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>nombre total prostects Proffessionnesl/Particuliers/h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                         <i class="fa fa-eye fa-2x"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="?page=dRUA">Voir Details</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <canvas id="rua" height="50" width="140" style="margin:0"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Pie Chart -->
                <!-- #END# Pie Chart -->
            </div>
            <!-- #END# CPU Usage -->

        </div>
    </section>
   
  <?php include_once'script.php'; ?>

</body>
</html>