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
        <div class="block-header">
                <h2></h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Détail
                            </h2>
                        </div>
                        <div class="body">
                            <form>
                                <div class="row clearfix">
                                   <div class="col-md-4">
                                    <label for="email_address">CLIENT:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?= $_GET['cli'] ?>
                                            </div>
                                        </div>  
                                   </div>
                                   <div class="col-md-4">
                                     <label for="password">NOM:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?= $_GET['nom'] ?>
                                            </div>
                                        </div>   
                                   </div>
                                   <div class="col-md-4">
                                    <label for="password">COMPTE:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?= $_GET['ncp'] ?>
                                            </div>
                                        </div>   
                                   </div>
                                </div>
                                <div class="row clearfix">
                                   <div class="col-md-4">
                                        <label for="password">GESTIONNAIRE</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <?= $_GET['ges'] ?>
                                                </div>
                                            </div>
                                   </div>
                                   <div class="col-md-4">
                                        <label for="password">SOLDE:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <?= $_GET['sde'] ?>
                                                </div>
                                            </div>
                                   </div>
                                   <div class="col-md-4">
                                        <label for="password">MONTANT AUTORISATION:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?= $_GET['maut'] ?>
                                            </div>
                                        </div>
                                   </div>
                                </div>
                                 <div class="row clearfix">
                                   <div class="col-md-4">
                                        <label for="password">DEBUT:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?= $_GET['debut'] ?>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="col-md-4">
                                    <label for="password">DATE FIN:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?= $_GET['fin'] ?>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="col-md-4">
                                     <label for="password">DATE ECHEANCE:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?= $_GET['date'] ?>
                                            </div>
                                        </div>
                                   </div>
                                </div>
                                 <div class="row clearfix">
                                   <div class="col-md-4">
                                   </div>
                                   <div class="col-md-4">
                                   </div>
                                   <div class="col-md-4">
                                   </div>
                                </div>
                                 <div class="row clearfix">
                                   <div class="col-md-4">
                                   </div>
                                   <div class="col-md-4">
                                   </div>
                                   <div class="col-md-4">
                                   </div>
                                </div>
                                 <div class="row clearfix">
                                   <div class="col-md-4">
                                   </div>
                                   <div class="col-md-4">
                                   </div>
                                   <div class="col-md-4">
                                   </div>
                                </div>

                                <br>
                                <button type="button" class="btn btn-primary m-t-15 waves-effect" onclick="window.print();"><i class="fa fa-print"></i> IMPRIMER</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
   
  <?php include_once'script.php'; ?>

</body>
</html>