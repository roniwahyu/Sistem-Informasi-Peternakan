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
          
        });
    </script>
    
</body>

</html>
