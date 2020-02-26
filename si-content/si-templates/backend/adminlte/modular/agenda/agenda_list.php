
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Manajemen
    
      <small>Agenda</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Manajemen Agenda</li>
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
                        
                        <!-- <button class="btn btn-flat btn-success btn_add_new" id="btn_add_new" ><i class="fa fa-plus-square-o" ></i> Tambah Matakuliah</button> -->

                        <a href="<?= base_url('admin/agenda/add') ?>" class="btn btn-flat btn-success btn_add_new" id="add_dosen" ><i class="fa fa-plus-square-o" ></i> Tambah Agenda</a >
                        

                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET.'include/img/list.png'; ?>" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">List Agenda</h3>
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
                           <th width="100px">Agenda</th>
                           <th width="">Kegiatan</th>
                           <th width="130px">Tanggal</th>
                           <th width="100px">Jam</th>
                           <th>Program Studi</th>
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
                      <label for="username" class="col-sm-2 control-label">Judul Kegiatan<i class="required"></i></label>
                      <div class="col-sm-8">
                         <input type="text" name="judul_kegiatan" id="judul_kegiatan" class="form-control" placeholder="Judul Kegiatan">
                        <small class="info help-block"></small>
                      </div>
                  </div>
                  <div class="form-group ">
                        <label for="username" class="col-sm-2 control-label">Jenis Kegiatan<i class="required"></i></label>
                        <div class="col-sm-8">
                           <input type="text" name="jenis_kegiatan" id="jenis_kegiatan" class="form-control" placeholder="Jenis Kegiatan">
                          <small class="info help-block required"><i class="required">*Seminar, Sidang, Workshop</i></small>
                        </div>
                    </div>
                    <div class="form-group ">

                        <label for="username" class="col-sm-2 control-label">Program Studi<i class="required"></i></label>
                        <div class="col-sm-8">
                          <?php echo cmb_dinamis('nama_prodi','ci_prodi','nama_prodi','id',$nama_prodi, 'select2'); ?>

                          <small class="info help-block"></small>

                        </div>

                    </div>



                    <div class="form-group ">
                        <label for="fullname" class="col-sm-2 control-label">Jam <i class="required"></i></label>
                        <div class="col-sm-8">
                          <div class="row">
                              <div class="col-xs-6">
                                  <div class='input-group date timepicker' >
                                    <input type="text" class="form-control " id="timepicker" placeholder="Jam Mulai" name="jam_mulai" value="" />
                                      <span class="input-group-addon">
                                          <i class="fa fa-clock-o"></i>   
                                      </span>
                                  </div>
                              </div>
                               <div class="col-xs-6">
                                   <small class="info help-block">S/d <i class="required">Selesai</i></small>
                                  
                                  <!-- <div class='input-group date timepicker' >
                                    <input type="text" class="form-control" id="timepicker2" placeholder="Jam Akhir" name="jam_berakhir" value="" />
                                      <span class="input-group-addon">
                                          <i class="fa fa-clock-o"></i>   
                                      </span>
                                  </div>-->
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
                              <input type="text" name="tanggal" value="" class="form-control pull-right" id="datepicker">
                            </div>
                          <small class="info help-block required">
                            Hari ini Tanggal : <i class="required"><?= date('d-M-Y') ?></i>
                          </small>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="text" class="col-sm-2 control-label">Kegiatan <i class="required"></i></label>
                        <div class="col-sm-8">
                          <textarea name="kegiatan" id="kegiatan" cols="30" rows="10" placeholder="Kegiatan..." class="form-control text-editor"></textarea>

                          <small class="info help-block"></small>
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

    $('#datepicker').datepicker({

      autoclose: true,

      format: 'yyyy/mm/dd'

    });
  table = $('.dataTable').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        'autoWidth'   : false,

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/agenda/ajax')?>",
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

          var url = '<?= base_url('admin/agenda/update_save'); ?>';
          var save_type = 'back';
        var form = $('#form')[0];
        console.log(form);
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
                      console.log(save_type);
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
                        url :'<?= base_url()?>admin/agenda/delete',
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
            url: '<?= base_url()?>admin/agenda/get_update',
            type: 'POST',
            dataType: 'json',
            data: {user_id:user_id},
        }) 

        .done(function(res){
            if (res.success) {
                $('[name=id]').val(res.message.id_agenda);
                $('[name=judul_kegiatan]').val(res.message.judul_kegiatan);
                $('[name=jenis_kegiatan]').val(res.message.jenis_kegiatan);
                $('[name=nama_prodi]').val(res.message.prodi_id).change();
                $('[name=jam_mulai]').val(res.message.jam_mulai);
                $('[name=tanggal]').val(res.message.tanggal);
                $('[name=kegiatan]').val(res.message.kegiatan);







                $('#btnSave').text('Update Data');
                $('.message').hide();
            } else {
                toastr['warning'](res.message);
            }
        });

        
    });

     

    
});
</script>