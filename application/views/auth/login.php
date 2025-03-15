<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('assets/images/logo.png'); ?>" type="image/png">
    <title>Barqode</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/square/blue.css">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.png">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            font-family: 'Arial', sans-serif;
        }
        .login-box {
            width: 360px;
            margin: 7% auto;
            background: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }
        .login-box h3 {
            color: #fff;
            font-weight: bold;
        }
        .btn-primary {
            background: #28a745;
            border: none;
        }
        .btn-primary:hover {
            background: #218838;
        }
        .login-box a {
            color: #fff;
            text-decoration: underline;
        }
        .login-box a:hover {
            color: #d4edda;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <div class="text-center">
            <img src="<?php echo base_url('assets/'); ?>images/logo.png" width="250" height="200" alt="Logo Pesantren Murottal">
        </div>
        <h3 class="text-center">Barqode <br> Pesantren Murottal Depok</h3>
        <a href="<?= base_url('scan'); ?>" target="_blank"><b>Klik untuk scan absensi!</b></a>
        <div id="infoMessage" class="text-center"><?php echo $message; ?></div>
        <?= form_open("auth/cek_login", array('id' => 'login')); ?>
        <div class="form-group has-feedback">
            <?= form_input($identity, '', "class='form-control' placeholder='Email' required"); ?>
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?= form_input($password, '', "class='form-control' placeholder='Password' required"); ?>
            <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
        <?= form_close(); ?>
    </div>

    <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <!-- SlimScroll -->
    <script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
    <script src="<?= base_url() ?>assets/app/js/login.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>
<script type="text/javascript">
    let base_url = '<?= base_url(); ?>';
</script>

</html>
