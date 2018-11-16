<?php
session_start();
$_SESSION =array();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Accueil | SOGESEGL</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Font-awesome Css -->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
     <link href="css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="css/bootstrap.css" rel="stylesheet" >
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
</head>

<body class="login-page">
    
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>SOGESEGL</b></a>
            <small>SGBS</small>
        </div>
        <div class="card">
                    <div class="body">
                        <form id="sign_in" method="POST" action="controller/userController.php">
                            
                            <div class="msg">Authentification</div>
                             
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user fa-3x"></i>
                                </span>
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock fa-3x"s"></i>
                                </span>
                                <div class="form-line">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required autofocus>
                                </div>
                            </div>
                            <div class="row">                  
                                <div class="col-xs-6">
                                    <input type="submit" class="btn btn-block bg-pink waves-effect"  name="connect" value="se connecter" />
                                </div>
                            </div>
                           
                        </form>
                    </div>
                </div> 

               
    </div>
       
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("images/logo.jpg", {speed: 500});
    </script>
</body>

</html>
