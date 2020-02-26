<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Panel</title>
<!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/bower_components/Ionicons/css/ionicons.min.css') ?>">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/dist/css/AdminLTE.min.css') ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/dist/css/skins/_all-skins.min.css') ?>">
  <!-- Pace style -->
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/plugins/pace/pace.min.css') ?>">
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/css/custom.css') ?>">
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/chosen/chosen.css') ?>">
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/plugins/iCheck/flat/blue.css') ?>">
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/plugins/iCheck/all.css') ?>">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
html{overflow-x: hidden;}
.logo {
    width: 100%;
    max-width: 100px;
    height: auto;
}

.login-box-body {
      border-top: 5px solid #00a65a;
    }
</style>


</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    
    <div class="image">
    <img class='logo' src="" alt="">
    </div>
    <a href=""><b>Login</b></a>
    <span>Panel</span>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login dengan Email / Username</p>
    <?= $this->session->flashdata('message'); ?>
        <?php if(validation_errors()): ?>

        <!-- ERROR HERE -->
             <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>
            
        <!-- /ERROR HERE -->
     <?php echo form_open(''); ?>
      <div class="form-group has-feedback ">
        <?php echo form_input(array('class' => 'form-control',
                    'name'  => 'email',
                    'id'    => 'username',
                    'type'  => 'text',
                    'placeholder'   => 'Username/Email')); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <i class="required"><?php echo form_error('username');?></i>
      </div>
      <div class="form-group has-feedback">
        <?php echo form_input(array('class' => 'form-control',
                    'name'  => 'password',
                    'id'    => 'password',
                    'type'  => 'password',
                    'placeholder'   => 'Password')); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <i class="required"><?php echo form_error('password');?></i>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> <i class="primary"></i><span class="">Remember Me</span>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    <?= form_close(); ?>

    <!-- /.social-auth-links -->

    <a href="<?= site_url('administrator/forgot-password'); ?>">I forgot my password</a><br>
    <a href="<?= site_url('administrator/register'); ?>" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->



<!-- Bootstrap 3.3.7 -->
<script src="<?= get_template_dir(dirname(__FILE__), 'include/js/jquery.min.js') ?>"></script>
<script src="<?= get_template_dir(dirname(__FILE__), 'include/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- PACE -->
<script src="<?= get_template_dir(dirname(__FILE__), 'include/bower_components/PACE/pace.min.js') ?>"></script>


<!-- AdminLTE App -->
<script src="<?= get_template_dir(dirname(__FILE__), 'include/dist/js/adminlte.min.js') ?>"></script>

<script src="<?= get_template_dir(dirname(__FILE__), 'include/js/custom.js') ?>"></script>
<script src="<?= get_template_dir(dirname(__FILE__), 'include/chosen/chosen.jquery.js') ?>"></script>
<script src="<?= get_template_dir(dirname(__FILE__), 'include/plugins/iCheck/icheck.min.js') ?>"></script>
<script>
  $(function () {
    $('#remember').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });


  });
</script>
</body>
</html>
