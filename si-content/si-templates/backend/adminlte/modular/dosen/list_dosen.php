
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Manajemen Dosen
    
      <small></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Manajemen Dosen</li>
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

                        <a href="<?= base_url('admin/dosen/add') ?>" class="btn btn-flat btn-success btn_add_new" id="add_dosen" ><i class="fa fa-plus-square-o" ></i> Tambah Dosen</a >
                        

                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET.'include/img/list.png'; ?>" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Manajemen Dosen</h3>
                     <h5 class="widget-user-desc">List all </h5>
                  </div>

                  
                  
                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead class="head-table">
                        <tr class="">
                           <th>
                            #
                           </th>
                           <th>ID</th>
                           <th>Nama Dosen</th>
                           <th>Kontak</th>
                           <th>Email</th>
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
            <div class="modal-body form-horizontal">
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

                        <label for="username" class="col-sm-2 control-label">ID Dosen<i class="required"></i></label>



                        <div class="col-sm-8">

                          <input type="text" class="form-control" name="kode_dosen" id="kode_dosen" placeholder="ID Dosen" value="">

                          <small class="info help-block"></small>

                        </div>

                    </div>
                  <div class="form-group ">

                        <label for="username" class="col-sm-2 control-label">Nama Dosen <i class="required"></i></label>



                        <div class="col-sm-8">

                          <input type="text" class="form-control" name="nama_dosen" id="nama_dosen" placeholder="Nama Dosen" value="">

                          <small class="info help-block"></small>

                        </div>

                    </div>



                    <div class="form-group ">

                        <label for="text" class="col-sm-2 control-label">NIDN <i class="required"></i></label>



                        <div class="col-sm-8">

                          <input type="text" class="form-control" name="nidn" id="nidn" placeholder="NIDN" value="">

                          <small class="info help-block"></small>

                        </div>

                    </div>



                    <div class="form-group ">

                        <label for="fullname" class="col-sm-2 control-label">No. Kontak <i class="required"></i></label>



                        <div class="col-sm-8">

                          <input type="number" class="form-control" name="kontak" id="kontak" placeholder="No. Kontak" value="">

                         

                        </div>

                    </div>

                       <div class="form-group ">

                        <label for="fullname" class="col-sm-2 control-label">Email <i class="required"></i></label>



                        <div class="col-sm-8">

                          <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="">

                         

                        </div>

                    </div>
                    
                    <div class="form-group ">
                        <label for="username" class="col-sm-2 control-label">Avatar </label>
  
                        <div class="col-sm-8">
                            <div id="user_avatar_galery" ></div>
                            <input name="user_avatar_uuid" id="user_avatar_uuid" type="hidden" value="<?= set_value('user_avatar_uuid'); ?>">
                            <input name="user_avatar_name" id="user_avatar_name" type="hidden" value="<?= set_value('user_avatar_name')?>">
                            <input name="avatar_save" id="avatar_save" type="hidden" value="">
                            <small class="info help-block">
                              Format file must PNG, JPEG.
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


  table = $('.dataTable').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/dosen/ajax')?>",
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

          var url = '<?= base_url('admin/dosen/update_save'); ?>';
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
                      $("#avatar").attr('src', '<?= base_url('uploads/user/default.png'); ?>');
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
                        url :'<?= base_url()?>admin/dosen/delete',
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
        $('.modal-title').text('Edit Dosen');
        var user_id = $(this).attr('data-id');
        save_method = 'edit';
        $.ajax({
            url: '<?= base_url()?>admin/dosen/get_update',
            type: 'POST',
            dataType: 'json',
            data: {user_id:user_id},
        }) 

        .done(function(res){
            if (res.success) {
                $('[name=id]').val(res.message.id);
                $('[name=kode_dosen]').val(res.message.kode_dosen);
                $('[name=nama_dosen]').val(res.message.nama_dosen);
                $('[name=nidn]').val(res.message.nidn);
                $('[name=kontak]').val(res.message.kontak);
                $('[name=email]').val(res.message.email);
                $('[name=avatar_save]').val(res.message.avatar);






                $('#btnSave').text('Update Data');
                $('.message').hide();
            } else {
                toastr['warning'](res.message);
            }
        });

        $('#user_avatar_galery').fineUploader({
         template: 'qq-template-gallery',
         request: {
             endpoint: BASE_URL + 'admin/dosen/upload_avatar_file',
             params: {
                 '<?= $this->security->get_csrf_token_name(); ?>': '<?=   $this->security->get_csrf_hash(); ?>'
             }
         },
         deleteFile: {
             enabled: true,
             endpoint: BASE_URL + 'admin/dosen/delete_avatar_file',
         },
         thumbnails: {
             placeholders: {
                 waitingPath: BASE_ASSET + '/fine-upload/placeholders/waiting-generic.png',
                 notAvailablePath: BASE_ASSET + '/fine-upload/placeholders/not_available-generic.png'
             }
         },
         session: {
             endpoint: BASE_URL + 'admin/dosen/get_avatar_file/' + user_id,
             refreshOnRequest: true
         },
         multiple: false,
         validation: {
             allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']
         },
         showMessage: function(msg) {
             toastr['error'](msg);
         },
         callbacks: {
             onComplete: function(id, name) {
                 var uuid = $('#user_avatar_galery').fineUploader('getUuid', id);
                 $('#user_avatar_uuid').val(uuid);
                 $('#user_avatar_name').val(name);
             },
             onSubmit: function(id, name) {
                 var uuid = $('#user_avatar_uuid').val();
                 $.get(BASE_URL + '/admin/dosen/delete_image_file/' + uuid);
             }
         }
     }); /*end image galey*/ 
    });

     

    
});
</script>