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
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-user fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">NOMBRE TOTAL DES PROSPECTS</div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo "$Prospect"; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-book fa-2x fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">NOMBRE TOTAL DE PROSPECTS TRAITES </div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo  ""; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-book fa-2x fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">NOMBRE TOTAL DE PROSPECTS NON TRAITES</div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo ""; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>              
            </div>
           

        </div>
    </section>
  <?php include_once'script.php'; ?>

</body>
</html>