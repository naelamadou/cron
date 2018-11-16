<?php
  $user = getUser($_GET['id']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
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
                <h2>AJOUTER UTILISATEUR</h2>
            </div>

            <form method="POST" action="controller/userController.php?idu=<?= $_GET['id'] ?>">
                <!-- Input -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            
                            <div class="body">
                                <h2 class="card-inside-title">NOM</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Nom utilisateur" name="nom" value="<?= $user['nom'] ?>" />
                                            </div>
                                        </div>
                                        <?php
                                            if (isset($_GET['nom'])) {
                                                echo "<div class='alert alert-danger'>
                                                        <strong>Oups!</strong> Veullez entrer un nom.
                                                        </div>";
                                            }
                                         ?>
                
                                    </div>
                                </div>

                                <h2 class="card-inside-title">EMAIL</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" class="form-control" placeholder="Adresse email" name="email" value="<?= $user['email'] ?>" />
                                            </div>
                                        </div>
                                        <?php
                                            if (isset($_GET['email'])) {
                                                echo "<div class='alert alert-danger'>
                                                        <strong>Oups!</strong> Veullez remplir l'email.
                                                        </div>";
                                            }
                                         ?>
                                    </div>
                                </div>

                                
                                
                                <h2 class="card-inside-title">CODE</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line focused">
                                                <input type="number" min="0" class="form-control" placeholder="Entrer un code" name="code" value="<?= $user['code'] ?>" />
                                            </div>
                                        </div>
                                        <?php
                                            if (isset($_GET['code'])) {
                                                echo "<div class='alert alert-danger'>
                                                        <strong>Oups!</strong> Veullez remplir le code.
                                                        </div>";
                                            }
                                         ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Input -->

                <!-- Select -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <h2>Role</h2>
                                        <?php $roles=getListeRoles(); ?>
                                        <select class="form-control show-tick" name="role">
                                            <option value="<?= $user['idR'] ?>"><?=$user['libelle_role']?></option>
                                            <?php foreach($roles as $role): ?>
                                            <option value="<?= $role['idR'] ?>"><?= $role['libelle_role'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <?php
                                            if (isset($_GET['role'])) {
                                                echo "<div class='alert alert-danger'>
                                                        <strong>Oups!</strong> Veuillez choisir un role.
                                                        </div>";
                                            }
                                         ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <h2>RESPONSABLE</h2>
                                        <select class="form-control show-tick" name="respon">
                                            <option value="">Affecter à un responsable</option>
                                            <option value="2">ABASS BEYE</option>
                                            <option value="5">AMINATA NDOYE BASSE</option>
                                            <option value="10">PAPE DEMBA SY</option>
                                            <option value="15">THIERNO IBRAHIMA DIALLO</option>
                                        </select>
                                        <?php
                                            if (isset($_GET['respon'])) {
                                                echo "<div class='alert alert-danger'>
                                                        <strong>Oups!</strong> Il faut l'affectation.
                                                        </div>";
                                            }
                                         ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Select -->

                <!-- Boutons -->
                <div class="row clearfix">
                    <input type="submit" name="updateUser" value="Modifier l'utilisateur" class="btn btn-block btn-lg bg-cyan waves-effect">
                </div>
                <!-- #END# Boutons -->

                <br>
            </form>
        </div>
    </section>
   
  <?php include_once'script.php'; ?>
    <script src="plugins/jquery/jquery.min.js"></script>
   
    </body>
</html>