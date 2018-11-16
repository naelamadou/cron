 
 <!-- Jquery Core Js -->
    <script src="./../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="./../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->


    <!-- Slimscroll Plugin Js -->
    <script src="./../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>


    <!-- Jquery CountTo Plugin Js -->
    <script src="./../plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="./../plugins/raphael/raphael.min.js"></script>
    <script src="./../plugins/morrisjs/morris.js"></script>

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
   
    <script type="text/javascript">
     new Chart(document.getElementById("pie-chart"), {
            type: 'pie',
            data: {
        labels: ["nombre d'erreur > 50 000", "nombre d'erreur < 50 000","nb [50 000,300 000]"],
              datasets: [{
                label: "nombre Erreur et d'agence ",
                backgroundColor: ["#cc0c05", "#7fb243","#ff9901"],
                data: [<?php echo $nbErreurSup50mil; ?>,<?php echo $nbErreurInf50mil; ?>,<?php echo $NBErreurBetween50and300; ?>]
              }]
            },
            options: {
              title: {
                display: true,
                text: ''
              },

              legend: {
                display:true,
                position:'right'
              }
            }
        });
    </script>
     <script type="text/javascript">
     new Chart(document.getElementById("bar-chart"), {
            type: 'horizontalBar',
            data: {
        labels: ["> 50 000", "< 50 000","[50 000,300 000]"],
              datasets: [{
                label: "Evolution des erreurs",
                backgroundColor: ["#cc0c05", "#7fb243","#ff9901"],
                data: [<?php echo $nbErreurSup50mil; ?>,<?php echo $nbErreurInf50mil; ?>,<?php echo $NBErreurBetween50and300; ?>]
              }]
            },
            options: {
              title: {
                display: true,
                text: ''
              },

              legend: {
                display:true,
                position:'right'
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
      <script>
  setInterval('load_messages()',500)
  function load_messages() {
    $('#messages').load('listeErreur.php');
    
  }
  </script>
 
</body>

</html>
