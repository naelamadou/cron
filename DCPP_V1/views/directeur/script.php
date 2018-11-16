  <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

  <script>
    
   new Chart(document.getElementById("paea"),
          {
              type: 'pie',
              data: {
                  labels: ["<=1 Mois", ">=1 et <=3 Mois", ">=3 et <=6 Mois", "> 6 Mois"],
                  datasets: [{
                        label: "Population (millions)",
                        backgroundColor: ["gray", "#52682d","orange","#a70000"],
                        data: [
                                <?php echo $NbAutInf1; ?>,
                                <?php echo $NbAutentre1et3; ?>,
                                <?php echo $NbAutEntre3et6; ?>,
                                <?php echo $NbAutSp6; ?>]
                  }]   
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
      new Chart(document.getElementById("rua"),
          {
              type: 'pie',
              data: {
                  labels: ["Utilisation Normale", "Entre_100%_105%", "Superieur 105"],
                  datasets: [{
                        label: "Population (millions)",
                        backgroundColor: ["#52682d", "orange","#a70000",],
                        data: [
                           <?php echo $NbAutUN; ?>,
                           <?php echo $NbAutUtil100_105; ?>,
                           <?php echo $NbAutUtiSup105; ?>
                        ]
                  }]   
              },   
              options: {
                  title: {
                       display: true,
                       text: '',
                       position: 'right'
                  },
                  legend :{
                    display: true,
                    position: 'right'
                  }
              }
          });
</script>
<script>
       new Chart(document.getElementById("nbjdd"),
          {
              type: 'pie',
              data: {
                  labels: ["< 7", "7 et 15", "15 et 30","30 et 45","45 et 60","Sup 90"],
                  datasets: [{
                        label: "Population (millions)",
                        backgroundColor: ["#52682d", "orange","#C00C00","#e5cb9a","gray","  #a70000",],
                        data: [
                           <?php echo $nbjInf7; ?>,
                           <?php echo $nbjEntre7et15; ?>,
                           <?php echo $nbjEntre15et30; ?>,
                           <?php echo $nbjEntre30et45; ?>,
                           <?php echo $nbjEntre45et60; ?>,
                           <?php echo $nbjSup90; ?>
                        ]
                  }]   
              },   
              options: {
                  title: {
                       display: true,
                       text: '',
                       position: 'right'
                  },
                  legend :{
                    display: true,
                    position: 'right'
                  }
              }
          });      
</script>
<script>
       new Chart(document.getElementById("nbjSMCD"),
          {
              type: 'pie',
              data: {
                  labels: ["< 7", "7 et 15", "15 et 30","30 et 45","45 et 60","Sup 90"],
                  datasets: [{
                        label: "Population (millions)",
                        backgroundColor: ["#52682d", "orange","#C00C00","blue","#e5cb9a","  #a70000",],
                        data: [
                           <?php echo $nbjSMCDInf7; ?>,
                           <?php echo $nbjSMCDEntre7et15; ?>,
                           <?php echo $nbjSMCDEntre15et30; ?>,
                           <?php echo $nbjSMCDEntre30et45; ?>,
                           <?php echo $nbjSMCDEntre45et60; ?>,
                           <?php echo $nbjSMCDSup90; ?>
                        ]
                  }]   
              },   
              options: {
                  title: {
                       display: true,
                       text: '',
                       position: 'right'
                  },
                  legend :{
                    display: true,
                    position: 'right'
                  }
              }
          });     
</script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

     <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

     <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>
    <script src="js/pages/ui/jquery-datatable.js"></script>
     <script src="js/pages/index.js"></script>
     
      <!-- Chart Plugins Js -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>
    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
