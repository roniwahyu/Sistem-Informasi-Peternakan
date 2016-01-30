<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $description; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Extra metadata -->
        <?php echo $metadata; ?>
        <!-- / -->

        
    </head>

<body>
	  <?php echo $body; ?>
    
     <link href="<?php echo assets_url() ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo assets_url() ?>/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo assets_url() ?>/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo assets_url() ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>/css/style.css" rel="stylesheet">

     <?php echo $css; ?>


    <!-- Mainly scripts -->
    <script src="<?php echo assets_url() ?>/js/jquery-2.1.1.js"></script>
    <script src="<?php echo assets_url() ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo assets_url() ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo assets_url() ?>/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot 
    <script src="<?php // echo assets_url() ?>/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php // echo assets_url() ?>/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php // echo assets_url() ?>/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php // echo assets_url() ?>/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php // echo assets_url() ?>/js/plugins/flot/jquery.flot.pie.js"></script>
    -->

    !-- Morris -->
    <script src="<?php echo assets_url() ?>/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo assets_url() ?>/js/plugins/morris/morris.js"></script>

    <!-- Peity -->
    <script src="<?php echo assets_url() ?>/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo assets_url() ?>/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo assets_url() ?>/js/inspinia.js"></script>
    <script src="<?php echo assets_url() ?>/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo assets_url() ?>/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="<?php echo assets_url() ?>/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="<?php echo assets_url() ?>/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo assets_url() ?>/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?php echo assets_url() ?>/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="<?php echo assets_url() ?>/js/plugins/toastr/toastr.min.js"></script>

	 <!-- Extra javascript -->
        <?php echo $js; ?>
        <!-- / -->    

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Responsive Admin Theme', 'Welcome to INSPINIA');

            }, 1300);

             /* Morris.Bar({
                element: 'morris-bar-chart',
                data: [{ y: 'Belanja Pegawai', a: 8768793476, b: 7633423434 },
                    { y: 'Belanja Barang Jasa', a:352342342, b: 23162334553 },
                    { y: 'Belanja Modal', a: 698723483, b: 987982363 }],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Anggaran', 'Realisasi'],
                hideHover: 'auto',
                resize: true,
                barColors: ['#1ab394', '#cacaca'],
            });*/

       

        
          
        });
    </script>
    
</body>

</html>
