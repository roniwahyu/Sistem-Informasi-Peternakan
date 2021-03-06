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

<body class="">
    
	  <?php echo $body; ?>
    
        <link href="<?php echo assets_url() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>css/style.css" rel="stylesheet">
    <link href="<?php echo assets_url() ?>css/animate.css" rel="stylesheet">
    <!-- <link href="<?php //echo assets_url() ?>css/plugins/bootstrap-modal/bootstrap-modal.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo assets_url() ?>css/plugins/datatables/dataTables.bootstrap.min.css">
    <link href="<?php echo assets_url() ?>css/custom.css" rel="stylesheet">

     <?php echo $css; ?>


    <!-- Mainly scripts -->
    <script src="<?php echo assets_url() ?>js/jquery.min.js"></script>
    <script src="<?php echo assets_url() ?>js/bootstrap.min.js"></script>
    <script src="<?php echo assets_url() ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
     <!--<script src="<?php //echo assets_url() ?>js/plugins/bootstrap-modal/bootstrap-modal.min.js"></script>-->
    <script src="<?php echo assets_url() ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script type="text/javascript" src="<?php echo assets_url() ?>js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo assets_url() ?>js/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script src="<?php echo assets_url() ?>js/inspinia.js"></script>
 

    <!-- jQuery UI -->
     <!-- <script src="<?php //echo assets_url() ?>js/plugins/jquery-ui/jquery-ui.min.js"></script>-->


   
	 <!-- Extra javascript -->
        <?php echo $js; ?>
        <?php echo $assets; ?>
        
        <!-- / -->
    <script src="<?php echo assets_url() ?>js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script> 
    <script type="text/javascript">
        $(document).ready(function() {  
        $('button.print').click(function() {
            window.print();
            return false;
            });
        });
    </script>
   
<style type="text/css">
            @media print
                {    
                    .no-print, .no-print *
                    {
                        display: none !important;
                    }
                }
            </style>
</body>

</html>
