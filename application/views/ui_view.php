<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="PTSP2 - Kejaksaan Kota Kediri">
    <title><?php echo $_title; ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i|Dosis:300,500" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo base_url(); ?>assets/css/core.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/app.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet">

    <!-- JQuery -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="http://kejari-kediri.go.id/wp-content/uploads/2015/08/favicon.png">
    <link rel="icon" href="http://kejari-kediri.go.id/wp-content/uploads/2015/08/favicon.png">
    <style>
        .topbar-inverse.topbar-secondary .menu>.menu-item.active{
            background-color: #a38378;
        }
        .topbar-inverse.topbar-secondary .menu>.menu-item:hover{
            background-color: #a38378;
        }
    </style>
</head>

<body class="topbar-unfix">


    <!-- Topbar -->
    <?php echo $_topbar; ?>
    <!-- END Topbar -->



    <!-- Main container -->
    <main class="main-container">
        
        <?php echo $_body; ?>

        <!-- Footer -->
        <?php echo $_footer; ?>
        <!-- END Footer -->


    </main>


    <!-- Scripts -->
    <script src="<?php echo base_url(); ?>assets/js/core.min.js" data-provide="sweetalert"></script>
    <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>

</body>

</html>