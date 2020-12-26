<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title id='title'>SPSUIKA | Universitas Ibn Khaldun Bogor</title>
  <!-- Tell t   he browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/bower_components/select2/dist/css/select2.min.css') ?>">
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/bower_components/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/fancy-box/source/jquery.fancybox.css?v=2.1.5') ?>" media="screen" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/bower_components/Ionicons/css/ionicons.min.css') ?>">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/dist/css/skins/_all-skins.min.css'); ?>">
  <!-- Pace style -->
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/plugins/pace/pace.min.css'); ?>">
  <!-- DataTables -->


  <link href="<?= get_template_dir(dirname(__FILE__), 'include/datatables/jquery.dataTables.min.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?= get_template_dir(dirname(__FILE__), 'include/datatables/buttons.bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?= get_template_dir(dirname(__FILE__), 'include/datatables/fixedHeader.bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?= get_template_dir(dirname(__FILE__), 'include/datatables/responsive.bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?= get_template_dir(dirname(__FILE__), 'include/datatables/scroller.bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" /> 




  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/toastr/build/toastr.css') ?>">
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/css/custom.css') ?>">
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/plugins/datepicker/datepicker3.css') ?>"/>
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/chosen/chosen.css') ?>">
  
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/datetimepicker/jquery.datetimepicker.css') ?>">


    <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/timepicker/bootstrap-datetimepicker.min.css') ?>">

  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/plugins/iCheck/flat/blue.css') ?>">
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/plugins/iCheck/all.css') ?>">
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/sweet-alert/sweetalert.css') ?>">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/plugins/timepicker/bootstrap-timepicker.min.css') ?>">


       <!-- FROLE EDITOR -->
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/froala_editor.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/froala_style.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/plugins/code_view.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/plugins/draggable.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/plugins/colors.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/plugins/emoticons.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/plugins/image_manager.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/plugins/image.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/plugins/line_breaker.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/plugins/table.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/plugins/char_counter.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/plugins/video.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/plugins/fullscreen.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/plugins/file.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/plugins/quick_insert.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/plugins/help.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/third_party/spell_checker.css') ?>">

      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/third_party/tui-image-editor.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/third_party/tui-color-picker.css') ?>">

      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/third_party/image_tui.css') ?>">

      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'include/frola/css/plugins/special_characters.css') ?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

      
  <style>
    .widget-user-2 .widget-user-header {
    overflow: hidden !important;
    }
    div#DataTables_Table_0_paginate {
    float: right !important;
}
  </style>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

 <!-- jQuery 3 -->
<script src="<?= get_template_dir(dirname(__FILE__), 'include/bower_components/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?= get_template_dir(dirname(__FILE__), 'include/js/jquery2.js') ?>"></script>


  <!-- Fine Uploader Gallery CSS file
====================================================================== -->
<link href="<?= get_template_dir(dirname(__FILE__), 'include/fine-upload/fine-uploader-gallery.min.css') ?>" rel="stylesheet">
<!-- Fine Uploader jQuery JS file
====================================================================== -->
<script src="<?= get_template_dir(dirname(__FILE__), 'include/fine-upload/jquery.fine-uploader.js')?>"></script>


<script>
  var BASE_URL = '<?= base_url(); ?>';
  var BASE_ASSET = "<?= get_template_dir(dirname(__FILE__), 'include/')?>";
  var segment = '<?= $this->uri->segment(2) ?>';
  console.log(segment);
function reload_ajax() {
  table.ajax.reload(null, false);
}


</script>

</head>

<body class="hold-transition sidebar-mini fixed skin-green-light">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Control</b>Panel</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications Menu -->
         
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
            <?php if (is_file(UPLOADPATH . '/user/' . get_user_info('avatar'))): ?>
                <?php $img_url = UPLOAD_DIR . '/user/' . get_user_info('avatar'); ?>
                <?php else: ?>
                <?php $img_url = UPLOAD_DIR . '/user/default.png'; ?>
                <?php endif; ?>
              <img src="<?= $img_url ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?= get_user_info('fullname'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?= $img_url ?>" class="img-circle" alt="User Image">

                <p>
                <?= get_user_info('fullname'); ?>
                <small><?= get_user_info('email'); ?></small>
                <small>Last Login : <?php //TanggalIndonesia(get_user_info('last_login')); ?></small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= BASE_URL ?>admin/users/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= BASE_URL ?>admin/access/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= $img_url ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= get_user_info('fullname'); ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>
        <?= $this->multi_menu->render(); ?>

        <!-- Optionally, you can add icons to the links -->
        <!-- <li class=""><a href="<?= BASE_URL.'admin/dashboard' ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<?= BASE_URL.'admin/instansi' ?>"><i class="fa fa-university"></i> <span>Instansi</span></a></li>
        <li><a href="<?= BASE_URL.'admin/instansi' ?>"><i class="fa fa-comment"></i> <span>Kirim Pesan</span></a></li>

        <li class="treeview">
          <a href="#"><i class="fa fa-database"></i> <span>Data Master</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= BASE_URL.'admin/pegawai' ?>">Pegawai</a></li>
            <li><a href="<?= BASE_URL.'admin/kendaraan' ?>">Kendaraan</a></li>
            <li><a href="<?= BASE_URL.'admin/biaya' ?>">Biaya Perjalanan</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-flag"></i> <span>Data Penunjang</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= BASE_URL.'admin/jabatan' ?>">Jabatan</a></li>
            <li><a href="<?= BASE_URL.'admin/pangkat' ?>">Pangkat</a></li>
            <li><a href="<?= BASE_URL.'admin/golongan' ?>">Golongan</a></li>
            <li><a href="<?= BASE_URL.'admin/unit_kerja' ?>">Unit Kerja</a></li>
            <li><a href="<?= BASE_URL.'admin/kota' ?>">Kota</a></li>
          </ul>
        </li>

        <li class="treeview " >
          <a href="#"><i class="fa fa-users"></i> <span>Data Pengguna</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="">Pengguna</a></li>
            <li><a href="#">Hak Akses</a></li>
          </ul>
        </li> -->

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>


