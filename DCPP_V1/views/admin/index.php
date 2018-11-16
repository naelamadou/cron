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
                            <div class="text">PROSPECTS</div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo $Prospect ; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-book fa-2x fa-2x"></i>
                        </div>
                        <div class="content">
                            <div class="text">PROSPECTS TRAITES </div>
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
                            <div class="text">PROSPECTS NON TRAITES</div>
                            <div class="number count-to" data-from="0" 
                                data-to="<?php echo ""; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>              
            </div>
       
                <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-grey">
                            <h2> BANQUE </h2>
                        </div>
                        <div class="body" style="">
                            <div id="Bank" class='text-center'></div>
                        </div>
                    </div>
                 </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-grey">
                            <h2> PME</h2>
                        </div>
                        <div class="body" style="">
                            <div id="pme" class='text-center'></div>
                        </div>
                    </div>
                 </div>
                </div>
 <!-- chart des differentes banques -->

                 <!-- Pie Chart -->
<!-- chart des prospects CDI/CDD -->
               <div class="row clearfix" style="height: 40px">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-grey">
                            <h2></h2><h2> CDI/CDD </h2>
                        </div>
                        <div class="body" style="">
                            <div id="CDICDD" class='text-center'></div>
                        </div>
                    </div>
                 </div>
<!-- chart des prospects CDI/CDD -->

<!-- chart des prospects avec Banque/Banque -->


                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-grey">
                            <h2>SANS Banque/AVEC Banque</h2>
                        </div>
                        <div class="body" style="">
                            <div id="ABSB" class='text-center'></div>
                        </div>
                    </div>
                 </div>
<!-- chart des prospects avec Banque/Banque -->
    
            <!-- #END# CPU Usage -->

        </div>
    </section>
    
   
  <?php include_once'script.php'; ?>

</body>
</html>