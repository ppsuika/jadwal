<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Blank Page | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= get_template_dir(dirname(__FILE__), 'favicon.ico')?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/css/icon.css')?>" rel="stylesheet" type="text/css">
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/font/material_font.woff2')?>" rel="stylesheet" type="text/css">
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/font-awesome/css/font-awesome.css')?>" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/bootstrap/css/bootstrap.css')?>" rel="stylesheet">
    <!-- Dropzone Css -->
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/dropzone/dropzone.css')?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/node-waves/waves.css')?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/animate-css/animate.css')?>" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <!-- Custom Css -->
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/css/style.css')?>" rel="stylesheet">
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/css/app.css')?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/css/themes/all-themes.css')?>" rel="stylesheet" />
    <!-- Sweetalert Css -->
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/sweetalert/sweetalert.css') ?>" rel="stylesheet" />
    <!-- toastr -->
    <link href="<?= get_template_dir(dirname(__FILE__), 'inc/css/jquery.toast.min.css')?>" rel="stylesheet" />

    <!-- FROLE EDITOR -->
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/froala_editor.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/froala_style.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/plugins/code_view.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/plugins/draggable.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/plugins/colors.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/plugins/emoticons.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/plugins/image_manager.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/plugins/image.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/plugins/line_breaker.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/plugins/table.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/plugins/char_counter.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/plugins/video.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/plugins/fullscreen.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/plugins/file.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/plugins/quick_insert.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/plugins/help.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/third_party/spell_checker.css') ?>">

      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/third_party/tui-image-editor.css') ?>">
      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/third_party/tui-color-picker.css') ?>">

      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/third_party/image_tui.css') ?>">

      <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/frola/css/plugins/special_characters.css') ?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">


    <!-- Jquery Core Js -->
    <script src="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/jquery/jquery.min.js')?>"></script>
    <!-- Dropzone Plugin Js -->
    <script src="<?= get_template_dir(dirname(__FILE__), 'inc/plugins/dropzone/dropzone.js') ?>"></script>
    <script src="<?= get_template_dir(dirname(__FILE__), 'inc/js/jquery.uploadPreview.js'); ?>"></script>
</head>

<body class="theme-teal">
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div> -->
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->

    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="">Control Panel</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-comments-o"></i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> commented your post</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>