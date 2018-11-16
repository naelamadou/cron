   
<!--=====================================================================================
    PLUGINS MORIS CHART JS 
=======================================================================================-->

 <link rel="stylesheet" href="../../plugins/morrisjs/morris.css">
<script src="../plugins/jquery/jquery.min.js"></script>


 <script src="../js/morrisjs/morris.js"></script> -->
<script src="../js/raphael/raphael.js"></script> -->

 <script type="text/javascript">
    new Morris.Donut({
        element: 'Bank',
        data: [{
                label: "BA",
                value:  <?php echo $nbrBanqueAth ;?>
            },
            {
                label: "BCAO",
               value:<?php echo $nbrBanqueBCAO; ?>

            },
            {
                label: "BHS",
                value:  <?php echo $nbrBanqueBHS; ?>                

            },
            {
                label: "BOA",
                value:  <?php echo $nbrBanqueBOA; ?>               
            },

            {
                label: "CBAO",
                value:  <?php echo $nbrBanqueCBAO; ?>           
            },
            {
                label: "ECOBANK",
                value:   <?php echo $nbrBanqueECOBANK; ?>             
            },
            {
                label: "Bicis",
                value:   <?php echo $nbrBanqueBicis; ?>             
            },
            {
                label: "BA",
                value:  <?php echo $nbrBanqueUBA ;?>
            },
            {
                label: "UBA",
                value:  <?php echo $nbrBanqueAth ;?>
            },
            {
                label: "BSIC",
                value:  <?php echo $nbrBanqueBSIC ;?>
            },
            {
                label: "BIS",
                value:  <?php echo $nbrBanqueBIS ;?>
            },
            {
                label: "BRM",
                value:  <?php echo $nbrBanqueBRM;?>
            },
            {
                label: "BDK",
                value:  <?php echo $nbrBanqueBDK ;?>
            },
            {
                label: "BAD",
                value:  <?php echo $nbrBanqueBAD ;?>
            },
            {
                label: "BGFI",
                value:  <?php echo $nbrBanqueBGFIBank ;?>
            },
            {
                label: "BOAD",
                value:  <?php echo $nbrBanqueBOAD ;?>
            }
            
        ],
        colors: ["#B1221C","#8FCF3C","#229954","#D4AC0D","#F6E497","#5DADE2","#4D006C","#FF73BF","#69003F","#FF140C","#901811","#85C630","#53872A","#080830","#6F603D","#FF321D"]
        
    });

</script> 


<script type="text/javascript">
    new Morris.Donut({
        element: 'pme',
        data: [{
                label: "CMS",
                value:   <?php echo $nbrBanqueCMS; ?>              
            },
            {
                label: "PAMECAS",
                value:   <?php echo $nbrBanquePAMECAS; ?>            
            },
             {
                label: "CNCAS",
                value:   <?php echo $nbrBanqueCNCAS; ?>            
            },
            {
                label: "CDS",
                value:  <?php echo $nbrBanqueCDS ;?>
            },
            {
                label: "CISA",
                value:  <?php echo $nbrBanqueCISA ;?>
            },
            {
                label: "AliosFinance",
                value:  <?php echo $nbrBanqueAliosFinance ;?>
            },
            {
                label: "LaPOSTE",
                value:  <?php echo $nbrBanqueLaPOSTE ;?>
            },
            {
                label: "Microcred",
                value:  <?php echo $nbrBanqueMicrocred ;?>
            },
            {
                label: "CreditAgricol",
                value:  <?php echo $nbrBanqueCreditAgricol ;?>
            },
            {
                label: "MECTRANS",
                value:  <?php echo $nbrBanqueMECTRANS;?>
            },
            
            {
                label: "Locafrique",
                value:  <?php echo $nbrBanqueLocafrique ;?>
            },

        ],
        colors: ["#A67E2E","#229954","#F6E497","#DB0B32","#570906","#046380","#895959","#1D702D","#080004","#D400FF","#535416"]
        
    });

</script>

 <!-- CDICDD -->

<script type="text/javascript">
    new Morris.Donut({
        element: 'CDICDD',
        data: [{
                label: "CDI",
                value: <?php echo $nbrprosCDD; ?>
            },
            {
                label: "CDD",
               value:<?php echo $nbrprosCDI; ?>

            }            
        ],
        colors: ["#3498DB","#8FCF3C"]
        
    });

</script>

<!-- CDICDD -->


<!-- chart Banque/Banque -->

<script type="text/javascript">
    new Morris.Donut({
        element: 'ABSB',
        data: [{
                label: "AB",
                value: <?php echo $nbrprosCDD; ?>
            },
            {
                label: "SB",
               value:<?php echo $nbrprosCDI; ?>

            }            
        ],
        colors: ["#FFB6B8","#FF5B2B"]
        
    });

</script>

<!-- chart Banque/Banque -->


<!--===============================================================================================
FIN MORRIS CHART JS 
==================================================================================================-->




   <!-- Jquery Core Js -->
    <script src="./../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="./../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->


    <!-- Slimscroll Plugin Js -->
    <script src="./../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>


    <!-- Jquery CountTo Plugin Js -->
    <script src="./../plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- ChartJs -->
    <script src="./../plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="./../plugins/flot-charts/jquery.flot.js"></script>
    <script src="./../plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="./../plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="./../plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="./../plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="./../plugins/jquery-sparkline/jquery.sparkline.js"></script>
   
     <script>
  new Chart(document.getElementById("BANQUE"), {
    type: 'doughnut',
    data: {
      labels: 
      ["Banque Athlantique", "BCAO", "BHS", "BOA" "Bicis","BSIC","UBA","DiamondBank","BAD","BRM","BDK","BanqueCitibankSénégal","BIS","BGFI","BOAD","FNB","CBAO","ECOBANK"]
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: 
          ["#3498DB","#17202A","#52BE80","#229954","#D4AC0D","#1B4F72","#AED6F1","#5DADE2","#616A6B","#4D006C","#69003F","#262029","#901811","#080830","#052B30","#235218","#940602","#47032C",],
          data: [ 
                  <?php echo $nbrBanqueAth ;?>,
                  <?php echo $nbrBanqueBCAO; ?>,
                  <?php echo $nbrBanqueBHS; ?>,
                  <?php echo $nbrBanqueBOA; ?>, 
                  <?php echo $nbrBanqueBicis; ?>, 
                  <?php echo $nbrBanqueBSIC; ?>, 
                  <?php echo $nbrBanqueUBA; ?>, 
                  <?php echo $nbrBanqueBSIC; ?>
                  <?php echo $nbrBanqueDiamondBank; ?>
                  <?php echo $nbrBanqueBAD; ?>
                  <?php echo $nbrBanqueBRM; ?>
                  <?php echo $nbrBanqueBDK; ?>
                  <?php echo $nbrBanqueCitibankSénégal; ?>
                  <?php echo $nbrBanqueBIS; ?>
                  <?php echo $nbrBanqueBGFIBank; ?>
                  <?php echo $nbrBanqueBOAD; ?>
                  <?php echo $nbrBanqueFNB; ?>
                  <?php echo $nbrBanqueCBAO; ?>
                  <?php echo $nbrBanqueECOBANK; ?>
                  ]  
        } 
      ]
    },  
       options: {
                  title: {
                       display: true,
                       text: '',
                       position: 'right'
                  },
                  legend :{
                    display: true,
                    position: 'right',
                    margin:{
                      top: 15
                    }
                  }
              }
  });
</script>

 <script>
      new Chart(document.getElementById("CDDCDI"), {
          type: 'doughnut',
          data: {
            labels: ["CDD", "CDI"],
            datasets: [
              {
                label: "Population (millions)",
                backgroundColor: ["#AEB6BF  ", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                data: [<?php echo $nbrprosCDD; ?>,<?php echo $nbrprosCDI; ?>]
              }
            ]

          },
          options: {
                  title: {
                       display: true,
                       text: '',
                       position: 'right'
                  },
                  legend :{
                    display: true,
                    position: 'right',
                    margin:{
                      top: 15
                    }
                  }
              }
      });
    </script>

    <script>
      new Chart(document.getElementById("sa"), {
          type: 'doughnut',
          data: {
            labels: ["Avec Banque", "Sans Banque"],
            datasets: [
              {
                label: "Population (millions)",
                backgroundColor: ["#17202A  ", "#9A7D0A"],
                data: [<?php echo $nbrAvecBanque; ?>,<?php echo $nbrAucuneBanque; ?>]
              }
            ]

          },
          options: {
                  title: {
                       display: true,
                       text: '',
                       position: 'right'
                  },
                  legend :{
                    display: true,
                    position: 'right',
                    margin:{
                      top: 15
                    }
                  }
              }
      });
    </script>

    <!-- Waves Effect Plugin Js -->
    <script src="./../plugins/node-waves/waves.js"></script>
     <!-- Jquery DataTable Plugin Js -->
    <script src="./../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="./../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="./../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="./../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="./../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="./../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="./../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="./../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="./../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <!-- Custom Js -->
    <script src="./../js/admin.js"></script>
    <script src="./../js/pages/tables/jquery-datatable.js"></script>
    <script src="./../js/pages/index.js"></script>
    <script src="./../js/pages/ui/modals.js"></script>
     <!-- !!!!!attention entre les 2 dernieres inclusion de Custum JS -->
     <!-- Demo Js -->
    <script src="./../js/demo.js"></script> 

</body>

</html>
