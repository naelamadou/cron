<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SOGESEGL</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>
  <style>
.btn{
    font-family: Arial;
    text-transform: uppercase;
    font-size: 20px;
    height: 6Opx;
    border-radius: 80px;
    line-height: 40px;
    text-align: center;
    border: 3px solid #009688;
    display: block;
    text-decoration: none;
    color: #009688;
    position: relative;
    overflow: hidden;
    background: transparent;
    transition: .3s;
}
.btn:before{
    content: '';
    width: 100%;
    height: 100%;
    position: absolute;
    background: #009688;
    opacity: .5;
    top: -100%;
    left: 0;
    z-index: -1;
    transition: .3s;
}
.btn:after{
    content: '';
    width: 100%;
    height: 100%;
    position: absolute;
    background: #009688;
    top: -100%;
    left: 0;
    z-index: -1;
    transition: .3s;
    transition-delay: .3s;
}
.btn:hover{
    color: #fff;
}
.btn:hover:before{
    top: 0;
}
.btn:hover:after{
   top: 0;
}
  </style>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center">
              <h1 class="error-number">500</h1>
              <h2> Error Authentication</h2>
              <p> <h3>Veillez saisir un bon username et password correctent <br> sinon veillez contactez l'administrateur de l'application pour vos abilitation a l'application SOGESEGL <br>  </h3> <a href="#">Referez vouus a?</a>
              </p>
              <div class="mid_center">
               
                <form>
                  <div class="col-xs-12 form-group pull-right top_btn">
                    <div class="input-group">
                      
                      <span class="input-group-btn" >
                              <div class="btn" type="button" > <a href="../index.php">Retour!</a> </div>
                          </span>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>