<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login Page | APPPSUIKA - SEKOLAH PASCASARJANA</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= get_template_dir(dirname(__FILE__), 'inc/favicon.ico')?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/bootstrap/css/bootstrap.css')?>" rel="stylesheet">
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/font-awesome/css/font-awesome.css')?>" rel="stylesheet" type="text/css">
    
    <!-- Waves Effect Css -->
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/node-waves/waves.css')?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/animate-css/animate.css')?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/css/style.css')?>" rel="stylesheet">
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/css/app.css')?>" rel="stylesheet">
</head>

<body class=" ">
    <img src="<?= get_template_dir(dirname(__FILE__), 'inc/images/image-gallery/12.jpg')?>" style="width:100%; position:fixed; z-index:-1; " class="ng-scope">
    <div class="login-page">
    
    <div class="login-box">
        <div class="logo">
            <img src="<?= base_url('si-content/uploads/img/logo.png'); ?>"  class="img img-responsive img-login" >
            <a href="javascript:void(0);">Login<b> Page</b></a>
            <small>APPPPSUIKA - SEKOLAH PASCASAEJANA</small>
        </div>
        <div class="card mg-5">
            <div class="body">
                <form id="sign_in" method="POST" action="">
                    <div class="msg">Login menggunakan Email</div>
                    <?= $this->session->flashdata('message'); ?>
                    <?php if(validation_errors()): ?>

                    <!-- ERROR HERE -->
                         <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <?= validation_errors(); ?>
                        </div>
                        <?php endif; ?>
                        
                    <!-- /ERROR HERE -->

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Email" required autofocus value="<?= set_value('email') ?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-lock"></i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Jquery Core Js -->
    <script src="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/jquery/jquery.min.js')?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/bootstrap/js/bootstrap.js')?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/node-waves/waves.js')?>"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/jquery-validation/jquery.validate.js')?>"></script>

    <!-- Custom Js -->
    <script src="<?= get_template_dir(dirname(__FILE__), 'inc/js/admin.js')?>"></script>
    <script src="<?= get_template_dir(dirname(__FILE__), 'inc/js/pages/examples/sign-in.js')?>"></script>
</body>

</html>