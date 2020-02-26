<?= get_template('header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>
        
        <small></small>
      </h1>
      <ol class="breadcrumb">
      </ol>
    </section>  -->

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here-MAA-content |
        -------------------------->
        
        <?= $contents ?>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?= get_template('footer'); ?>