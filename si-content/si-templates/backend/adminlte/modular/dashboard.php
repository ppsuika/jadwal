<section class="content-header">

      <h1>

        Dashboard

        <small>Control panel</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Dashboard</li>

      </ol>

</section>
<?php if ($this->session->flashdata('status') == true): ?>
  <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Perhatian !</h4>
        <?= $this->session->flashdata('message'); ?>
      </div>
<?php endif ?>
<section class="content">

      <div class="row">
        
         <!-- Left col -->

        <section class="col-lg-12 connectedSortable">

          <!-- Custom tabs (Charts with tabs)-->

          <div class="nav-tabs-custom">

            <!-- Tabs within a box -->

            <ul class="nav nav-tabs pull-right">

              <li class="active"><a href="#chart" data-toggle="tab">Jadwal  </a></li>

              <li><a href="#sales" data-toggle="tab">Agenda</a></li>

              <li class="pull-left header"><i class="fa fa-inbox"></i>  <?php 
                     if (get_group('group_code') == 'ADM') {
                       echo "All Program Studi";
                     } else {
                      echo "Program Studi ".get_group('group');
                     }
                      

                     ?></li>

            </ul>

            <div class="tab-content no-padding">

              <!-- Morris chart - Sales -->

              <div class="chart tab-pane active" id="chart" style="position: relative; height: 300px;">
                <div class="table-responsive ">
                  
                <table class="table table-striped table-houver container" id="">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Matakuliah</th>
                      <th>Smt</th>
                      <th>Dosen</th>
                      <th>Ruangan</th>
                      <th>Jml Mhs</th>
                      <th>Jam</th>
                      <th>Edit Kehadiran</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php

                     $no = 1; foreach ($jadwal_prodi as $row): ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row->nama_matkul; ?></td>
                        <td><?= $row->semester; ?></td>
                        <td><?= $row->nama_dosen; ?></td>
                        <td><?= $row->nama_ruangan; ?></td>
                        <td><?= $row->jml_mahasiswa; ?></td>
                        <td><?= $row->jam_mulai.' - '.$row->jam_berakhir; ?></td>
                        <td>
                          <button class="btn btn-flat btn-primary btn_kehadiran" id="" data-id = "<?= $row->id ?>">Edit Kehadiran</button>
                          <span class="required closed">*Closed</span>
                        </td>  
                      
                       
                      </tr>
                    <?php $no++;endforeach ?>
                  </tbody>
                </table>
              </div>
              </div>

              <div class="chart tab-pane" id="sales" style="position: relative; height: 300px;">
                <div class="table-responsive ">
                <table class="table table-striped table-houver container" id="">
                  <thead>
                    <tr class="">
                       <th>
                        #
                       </th>
                       <th width="">Judul Kegiatan</th>
                       <th width="130px">Tanggal</th>
                       <th>Kegiatan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($agenda_prodi as $row): ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row->judul_kegiatan; ?></td>
                        <td><?= tgl_indo($row->tanggal).' / '.$row->jam_mulai.' - '.$row->jam_berakhir; ?></td>
                        <td><?= $row->kegiatan; ?></td>

                      </tr>
                    <?php $no++;endforeach ?>
                  </tbody>
                </table>
              </div>

            </div>

          </div>

          <!-- /.nav-tabs-custom -->



      
          <!-- /.box (chat box) -->
        </section>

        <!-- /.Left col -->


        <!-- Left col -->

        

        <!-- /.Left col -->

        <!-- right col (We are only adding the ID to make the widgets sortable)-->


        <!-- right col -->

        <section class="col-lg-8 connectedSortable">

          <!-- Custom tabs (Charts with tabs)-->

          <div class="nav-tabs-custom">

            <!-- Tabs within a box -->

            <ul class="nav nav-tabs pull-right">

              <li class="active"><a href="#revenue-chart" data-toggle="tab">Jadwal Hari Ini</a></li>

              <li><a href="#sales-chart" data-toggle="tab">Agenda</a></li>

              <li class="pull-left header"><i class="fa fa-inbox"></i> <?= hari_ini(date("w")).', '.tgl_indo(date('Y-m-d')); ?></li>

            </ul>

            <div class="tab-content no-padding">

              <!-- Morris chart - Sales -->

              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                <div class="table-responsive ">
                <table class="table table-striped table-houver container" id="">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Program Studi</th>
                      <th>Smt</th>
                      <th>Matakuliah</th>
                      <th>Dosen</th>
                      <th>Ruangan</th>
                      <th>Jml Mhs</th>
                      <th>Jam</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($jadwal as $row): ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row->nama_prodi; ?></td>
                        <td><?= $row->semester; ?></td>
                        <td><?= $row->nama_matkul; ?></td>
                        <td><?= $row->nama_dosen; ?></td>
                        <td><?= $row->nama_ruangan; ?></td>
                        <td><?= $row->jml_mahasiswa; ?></td>
                        <td><?= $row->jam_mulai.' - '.$row->jam_berakhir; ?></td>
                      </tr>
                    <?php $no++;endforeach ?>
                  </tbody>
                </table>
              </div>
              </div>

              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                <div class="table-responsive ">
                <table class="table table-striped table-houver container" id="">
                  <thead>
                    <tr class="">
                       <th>
                        #
                       </th>
                       <th width="100px">Program Studi</th>
                       <th width="">Judul Kegiatan</th>
                       <th width="130px">Tanggal</th>
                       <th>Kegiatan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($agenda as $row): ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row->nama_prodi; ?></td>
                        <td><?= $row->judul_kegiatan; ?></td>
                        <td><?= tgl_indo($row->tanggal).' / '.$row->jam_mulai.' - '.$row->jam_berakhir; ?></td>
                        <td><?= $row->kegiatan; ?></td>

                      </tr>
                    <?php $no++;endforeach ?>
                  </tbody>
                </table>
              </div>

            </div>

          </div>

          <!-- /.nav-tabs-custom -->



      
          <!-- /.box (chat box) -->
        </section>

      </div>
</section>

<script>
  jQuery(document).ready(function($) {
    $('#table').DataTable({

      "paging": false,

      "lengthChange": false,

      "searching": false,

      "ordering": true,

      "info": false,

      "autoWidth": false

    });
  });

   
  // $(document).ready(function() {
  //   //set initial state.
  //     $('.minimal-red').val(this.checked);
  //     console.log($("input[type='checkbox']").val());
  //     $('.minimal-red').change(function() {
  //         if(this.checked) {
  //            var form_checked = $('#form_checked');
  //             var data_post = form_checked.serializeArray();
  //            $.ajax({
  //              url: '<?= base_url('admin/dashboard/update_kehadiran') ?>',
  //              type: 'POST',
  //              dataType: 'JSON',
  //              data: data_post,
  //            })
  //            .done(function(res) {
  //              console.log(res.message);
  //            })
             
             
  //         }
  //         $('.minimal-red').val(this.checked);        
  //     });

    $('.btn_kehadiran').click(function() {
      var id = $(this).attr('data-id');
      $("#sesi_kuliah").empty();
      $('#modal_form').modal('show');
      $.ajax({
        url: '<?= base_url('admin/dashboard/sesis_kehadiran'); ?>',
        type: 'POST',
        dataType: 'JSON',
        data: {id: id},
      })
      .done(function(res) {
        var i = 1;
        for (i = 1; i <= res.sesi_kuliah; i++) {
          $('#sesi_kuliah').append('<label class="checkbox-inline"><input type="checkbox" value="1" name="sesi[]" class="switch-button" >Sesi '+i+'</label>')
        }
        
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      
      $('[name=form_kehadiran_id]').val(id);
    });  

    $(document).on('change', 'input.switch-button', function() {
        var id = $('[name=form_kehadiran_id]').val();
        var form_blog = $('#form');
        var data_post = form_blog.serializeArray();
        data_post.push({
              name: 'id',
              value: id
          });

        

        // var val = [];
        // $(':checkbox:checked').each(function(i){
        //   val[i] = $(this).val();
        //     val.push({
        //       name: 'id',
        //       value: id
        //   });
        // });

        $.ajax({
                url: BASE_URL + '/admin/dashboard/update_kehadiran',
                type: 'POST',
                dataType: 'JSON',
                data: data_post,
            })
            .done(function(res) {
                toastr['success'](res.message);
                $('.btn_kehadiran').hide();   
                $('.closed').show();
            })
            .fail(function() {
                toastr['error']('Error update status');
            });
    });

    
 
</script>

<div class="modal fade" id="modal_form" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#03904e; color:#fff; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Edit Kehadiran</h3>
            </div>
            <div class="modal-body form form-horizontal">
                <?= form_open('', [
                    'name'    => 'form', 
                    'class'   => 'form-horizontal', 
                    'id'      => 'form', 
                    'enctype' => 'multipart/form-data', 
                    'method'  => 'POST'
                  ]); 

                  ?>
                  <input type="hidden" name="form_kehadiran_id">
                  <div class="form-group ">
                        <label for="label" class="col-sm-2 control-label">Sesi Kuliah </label>
                        <div class="col-sm-8" id="sesi_kuliah">
                      
                        
                        </div>
                    </div>
                <?= form_close(); ?>
                  
                  
            </div>
           <!--  <div class="modal-footer">

                <div class="message">

                </div>
                <span class="loading loading-hide"><img src="<?= base_url('assets'); ?>/img/loading-spin-primary.svg"> <i>Loading, Saving data</i></span>
                <button type="submit" class="btn btn-flat btn-primary btn_save btn_action" id="simpan" data-stype='stay' title="save (Ctrl+s)"><i class="fa fa-save" ></i> Save</button>
                <button type="submit" class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="simpan" data-stype='back' title="save and back to the list (Ctrl+d)"><i class="ion ion-ios-list-outline" ></i> Save and Go to The List</button>
                <button type="button" data-dismiss="modal" class="btn btn-flat btn-default btn_action" id="btn_cancel" title="cancel (Ctrl+x)"><i class="fa fa-undo" ></i> Cancel</button>
            </div> -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->