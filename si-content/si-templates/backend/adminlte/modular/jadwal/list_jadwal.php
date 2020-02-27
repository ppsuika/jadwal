
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Manajemen Jadwal
    
      <small></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Manajemen jadwal</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
      
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                     <div class="row pull-right">
                        
                        <button class="btn btn-flat btn-success btn_add_new" id="btn_rekap" ><i class="fa fa-cloud-download" ></i> Rekap Mengajar</button>

                        <a href="<?= base_url('admin/jadwal/add') ?>" class="btn btn-flat btn-success btn_add_new" id="add_dosen" ><i class="fa fa-plus-square-o" ></i> Tambah Jadwal</a >
                        

                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET.'include/img/list.png'; ?>" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">List Jadwal</h3>
                     <h5 class="widget-user-desc"> <?php 
                     if (get_group('group_code') == 'ADM') {
                       echo "All Program Studi";
                     } else {
                      echo "Program Studi ".get_group('group');
                     }
                      

                     ?></h5>
                  </div>

                  
                  
                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead class="head-table">
                        <tr class="">
                           <th>
                            #
                           </th>
                           <th width="100px">Program Studi</th>
                           <th width="120px">Matakuliah</th>
                           <th width="130px">Dosen</th>
                           <th width="100px">Ruangan</th>
                           <th>Sesi Kuliah</th>
                           <th>Tanggal</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                  </table>
                  </div>
               </div>
               <hr>
              
            </div>
            <!--/box body -->
         </div>
         <!--/box -->

      </div>
   </div>
</section>
<!-- /.content -->
<!-- Bootstrap modal -->
<?= get_template('fine_upload'); ?>

<div class="modal fade" id="modal_form" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#03904e; color:#fff; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Edit Data</h3>
            </div>
            <div class="modal-body  form-horizontal">
                <?= form_open('', [
                    'name'    => 'form_user', 
                    'class'   => 'form-horizontal', 
                    'id'      => 'form', 
                    'enctype' => 'multipart/form-data', 
                    'method'  => 'POST'
                  ]); 

                  ?>
                  <input type="hidden" name="id">
                  <div class="form-group ">

                        <label for="username" class="col-sm-2 control-label">Program Studi<i class="required"></i></label>



                        <div class="col-sm-8">

                          <?php echo cmb_dinamis('nama_prodi','ci_prodi','nama_prodi','id',$nama_prodi, 'select2'); ?>

                          

                          <small class="info help-block"></small>

                        </div>

                    </div>



                    <div class="form-group ">

                        <label for="text" class="col-sm-2 control-label">Semester <i class="required"></i></label>



                        <div class="col-sm-8">

                          <input type="text" class="form-control" name="semester" id="semester" placeholder="semester" value="<?= $semester; ?>">

                          <small class="info help-block"></small>

                        </div>

                    </div>



                    <div class="form-group ">

                        <label for="fullname" class="col-sm-2 control-label">Matakuliah <i class="required"></i></label>



                        <div class="col-sm-8">

                          <?php echo cmb_dinamis('nama_matkul','ci_matkul','nama_matkul','id',$nama_matkul, 'select2'); ?>

                         

                        </div>

                    </div>

                    <div class="form-group ">

                        <label for="fullname" class="col-sm-2 control-label">Dosen <i class="required"></i></label>



                        <div class="col-sm-8">

                          <?php echo cmb_dinamis('nama_dosen','ci_dosen','nama_dosen','id',$nama_dosen, 'select2'); ?>

                         

                        </div>

                    </div>



                    <div class="form-group ">

                        <label for="fullname" class="col-sm-2 control-label">Dosen Pengganti<i class="required"></i></label>



                        <div class="col-sm-8">

                          <?php echo cmb_dinamis('dosen_pengganti','ci_dosen','nama_dosen','id', $dosen_pengganti, 'select2'); ?>

                         

                        </div>

                    </div>



                    <div class="form-group ">

                        <label for="fullname" class="col-sm-2 control-label">Ruangan <i class="required"></i></label>



                        <div class="col-sm-8">

                          <?php echo cmb_dinamis('nama_ruangan','ci_ruangan','nama_ruangan','id',$nama_ruangan, 'select2'); ?>

                         

                        </div>

                    </div>



                     <div class="form-group ">

                        <label for="text" class="col-sm-2 control-label">Jumlah Mahasiswa <i class="required"></i></label>



                        <div class="col-sm-8">

                          <input type="number" class="form-control" name="jml_mahasiswa" id="jml_mahasiswa" placeholder="Jumlah Mahasiswa" value="<?= $jml_mahasiswa; ?>">

                          <small class="info help-block"></small>

                        </div>

                    </div>



                    <div class="form-group ">

                        <label for="fullname" class="col-sm-2 control-label">Jam <i class="required"></i></label>



                        <div class="col-sm-8">

                          <div class="row">

                              <div class="col-xs-6">

                                  <div class='input-group date timepicker' >

                                    <input type="text" class="form-control " id="timepicker" placeholder="Jam Mulai" name="jam_mulai" value="<?php echo $jam_mulai; ?>" />

                                      <span class="input-group-addon">

                                          <i class="fa fa-clock-o"></i>   

                                      </span>

                                  </div>

                              </div>

                               <div class="col-xs-6">

                                  <div class='input-group date timepicker' >

                                    <input type="text" class="form-control" id="timepicker2" placeholder="Jam Akhir" name="jam_berakhir" value="<?php echo $jam_berakhir; ?>" />

                                      <span class="input-group-addon">

                                          <i class="fa fa-clock-o"></i>   

                                      </span>

                                  </div>

                              </div>

                            </div>

                         

                        </div>

                    </div>



                    <div class="form-group ">
                        <label for="text" class="col-sm-2 control-label">Tanggal <i class="required"></i></label>
                        <div class="col-sm-8">
                          <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="tanggal" value="<?= $tanggal ?>" class="form-control pull-right datepicker" id="">
                            </div>
                          <small class="info help-block required">
                            Hari ini Tanggal : <i class="required"><?= date('d-M-Y') ?></i>
                          </small>

                        </div>

                    </div>

                    <div class="form-group ">

                        <label for="text" class="col-sm-2 control-label">Sesi Kuliah <i class="required"></i></label>



                        <div class="col-sm-8">

                          <input type="number" class="form-control" name="sesi_kuliah" id="sesi_kuliah" placeholder="Sesi Kuliah" value="<?= $sesi_kuliah; ?>">

                          <small class="info help-block">
                            1 atau 2 ... ?
                          </small>

                        </div>

                    </div>
                    
                    


                  <?= form_close(); ?>
                  
                  
            </div>
            <div class="modal-footer">

                <div class="message">

                </div>
                <span class="loading loading-hide"><img src="<?= base_url('assets'); ?>/img/loading-spin-primary.svg"> <i>Loading, Updating data</i></span>
                <button type="submit" class="btn btn-flat btn-info btn_save btn_action" id="simpan" data-stype='stay' title="save (Ctrl+s)"><i class="fa fa-save" ></i> Update Data</button>
                <button type="button" data-dismiss="modal" class="btn btn-flat btn-default btn_action" id="btn_cancel" title="cancel (Ctrl+x)"><i class="fa fa-undo" ></i> Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
$(document).ready(function(){

 $('.timepicker').datetimepicker({

           format: 'HH:mm'

          });

            //Date picker

    $('.datepicker').datepicker({

      autoclose: true,

      format: 'yyyy/mm/dd'

    });
  table = $('.dataTable').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/jadwal/ajax')?>",
            "type": "POST",

        },


        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1, 0 ], //last column
                "orderable": false, //set not orderable
            }
        ],

    });

    

    

    $('.btn_save').click(function(e){
      e.preventDefault(); 

          var url = '<?= base_url('admin/jadwal/update_save'); ?>';
          var save_type = 'back';
        var form = $('#form')[0];
           $.ajax({
               url: url,
               type:"post",
               dataType: 'json',
               data:new FormData(form),
               processData:false,
               contentType:false,
               cache:false,
               async:false,
           })

            .done(function(res){
              if (res.success) {
                      console.log(res.message);
                  if (save_type == 'back') {
                      table.ajax.reload(null,false);
                      toastr['success'](res.message);
                      $('#modal_form').modal('hide');
                      
                      //toastr['success'](res.message);   
                      return;
                  } else if (save_type == 'stay') {
                      $('.message').printMessage({
                          message: res.message
                      });
                      $('form input[type != hidden], form textarea, form select').val('');
                      $('#btnSave').text('saving');
                      $('#btnSave').attr('disabled',false);
                      $('.message').fadeIn();
                      table.ajax.reload(null,false);
                      $('.loading').hide(); 
                      $('.select2').val(null).trigger('change');
          
                      
                  }

                      // if (save_method == 'add') {
                      //     toastr['success'](res.message);
                      //     $('form input[type != hidden], form textarea, form select').val('');
                      //     $('.message').fadeIn();
                      //     table.ajax.reload(null,false);
                      // } else {
                      //     toastr['success'](res.message);
                      //     $('.box-form').addClass('hide');
                      //     $('.message').fadeIn();
                      //     table.ajax.reload(null,false);
                      // }
                      
                      //$('.loading').hide();    
              } else {
                  $('.message').printMessage({
                          message: res.message,
                          type: 'warning'
                  });
                  $('.message').fadeIn();
                  table.ajax.reload(null,false);
                  $('.loading').hide();
              }
              }) 
    });  


     //for delete
    $(document).on('click', '#delete', function(){
        var user_id = $(this).attr('data-id');
        swal({
                title: "Anda Yakin?",
                text: "data yang di hapus tidak bisa di restore!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Hapus !",
                cancelButtonText: "Tidak !",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {

                   $.ajax({
                        url :'<?= base_url()?>admin/jadwal/delete',
                        type :'POST',
                        dataType: 'json',
                        data: {user_id:user_id}, 
                    })

                     .done(function(data){
                        
                        console.log(data.success);
                        if (data.success) {
                               $('.box-form').addClass('hide');
                                table.ajax.reload(null,false);
                                toastr['success'](data.message);   
                                return;
                            
                            
                        } 
                    }) 
                } 
            })
        
    });

    $(document).on('click', '#edit', function(){
      $('#modal_form').modal('show'); 
        $('.modal-title').text('Edit Jadwal');
        var user_id = $(this).attr('data-id');
        save_method = 'edit';
        $.ajax({
            url: '<?= base_url()?>admin/jadwal/get_update',
            type: 'POST',
            dataType: 'json',
            data: {user_id:user_id},
        }) 

        .done(function(res){
            if (res.success) {
                $('[name=id]').val(res.message.id);
                $('[name=semester]').val(res.message.semester);
                $('[name=nama_prodi]').val(res.message.nama_prodi).change();
                $('[name=nama_matkul]').val(res.message.nama_matkul).change();
                $('[name=nama_ruangan]').val(res.message.kode_ruangan).change();
                $('[name=nama_dosen]').val(res.message.nama_dosen).change();
                $('[name=dosen_pengganti]').val(res.message.dosen_pengganti).change();
                $('[name=jam_mulai]').val(res.message.jam_mulai);
                $('[name=jam_berakhir]').val(res.message.jam_berakhir);
                $('[name=tanggal]').val(res.message.tanggal);
                $('[name=jml_mahasiswa]').val(res.message.jml_mahasiswa);
                $('[name=sesi_kuliah]').val(res.message.sesi_kuliah);






                $('#btnSave').text('Update Data');
                $('.message').hide();
            } else {
                toastr['warning'](res.message);
            }
        });

        
    });

    $('#btn_rekap').click(function(event) {
      /* Act on the event */

      $('#modal_rekap').modal('show');
    
    });


    $('#rekap_btn').click(function(event) {
      /* Act on the event */
      var form_rekap = $('#form_rekap');
      var data_post = form_rekap.serializeArray();
      var save_type = $(this).attr('data-stype');

      $.ajax({
        url: BASE_URL + 'admin/jadwal/rekap_mengajar',
        type: 'POST',
        dataType: 'JSON',
        data: data_post,
      })
      .done(function(res) {
        console.log(res.message);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      

    });
     

    
});
</script>

<div class="modal fade" id="modal_rekap" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#03904e; color:#fff; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Rekap Data</h3>
            </div>
            <div class="modal-body  form-horizontal">
                <?= form_open('', [
                    'name'    => 'form_rekap', 
                    'class'   => 'form-horizontal', 
                    'id'      => 'form_rekap', 
                    'enctype' => 'multipart/form-data', 
                    'method'  => 'POST'
                  ]); 

                  ?>
                  <input type="hidden" name="id">
                    <div class="form-group ">
                        <label for="fullname" class="col-sm-2 control-label">Dosen <i class="required"></i></label>
                        <div class="col-sm-8">
                          <?php echo cmb_dinamis('nama_dosen','ci_dosen','nama_dosen','id',$nama_dosen, 'select2'); ?>
                        </div>

                    </div>
              



                    <div class="form-group ">
                        <label for="text" class="col-sm-2 control-label">Tanggal <i class="required"></i></label>
                        <div class="col-sm-8">
                          <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="tanggal" value="<?= $tanggal ?>" class="form-control pull-right datepicker" id="">
                            </div>
                          
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="text" class="col-sm-2 control-label">Range <i class="required"></i></label>
                        <div class="col-sm-8">
                          <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="range" value="<?= $tanggal ?>" class="form-control pull-right datepicker" id="">
                            </div>
                        </div>
                    </div>
                    

                  <?= form_close(); ?>
                  
                  
            </div>
            <div class="modal-footer">

                <div class="message">

                </div>
                <span class="loading loading-hide"><img src="<?= base_url('assets'); ?>/img/loading-spin-primary.svg"> <i>Loading, Calculating data ... </i></span>
                <button type="submit" class="btn btn-flat btn-info  " id="rekap_btn" data-stype='stay' title="save (Ctrl+s)"><i class="fa fa-save" ></i> Rekap Data</button>
                <button type="button" data-dismiss="modal" class="btn btn-flat btn-default " id="btn_cancel" title="cancel (Ctrl+x)"><i class="fa fa-undo" ></i> Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->