<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="PTSP2 - Kejaksaan Kota Kediri">
    <title><?php echo $_title;?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i|Dosis:300,500" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo base_url(); ?>assets/css/core.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/app.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet">
    
    <!-- JQuery -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    
    <!-- Moment -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="http://kejari-kediri.go.id/wp-content/uploads/2015/08/favicon.png">
    <link rel="icon" href="http://kejari-kediri.go.id/wp-content/uploads/2015/08/favicon.png">
</head>

<body class="pace-done">
<div class="min-h-fullscreen bg-img center-vh p-20" style="background-image: url(<?= base_url() ?>assets/img/bg-login.jpg);" data-overlay="7">
    <div class="card card-round card-shadowed px-50 py-30 w-400px mb-0" style="max-width: 100%">
        <img src="<?= base_url() ?>assets/img/logo.png" alt="logo">

        <h5 class="text-uppercase text-center mt-3">Login</h5>
        <h6 class="text-center mb-3">Sistem Informasi E-Izin</h6>

        <form class="form-type-material" method="POST" action="<?= base_url('auth/login') ?>">
            <!-- username -->
            <div class="form-group">
                <input type="text" class="form-control" id="username" name="username">
                <label for="username">Username</label>
            </div>
            <?= form_error('username', '<small class="text-danger">', '</small>') ?>

            <!-- password -->
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password">
                <label for="password">Password</label>
            </div>
            <?= form_error('password', '<small class="text-danger">', '</small>') ?>

            <?= $this->session->flashdata('login_message') ?>

            <div class="form-group">
                <button class="btn btn-bold btn-block btn-brown" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>
    <!-- Scripts -->
    <script src="<?php echo base_url(); ?>assets/js/core.min.js" data-provide="sweetalert"></script>
    <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>

</body>

</html>