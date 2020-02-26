
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      User
      <small>List all</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> home</a></li>
      <li class="active">user</li>
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
                        
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="Tambah data user dengan (Ctrl+a)" href="<?= site_url('admin/users/add'); ?>"><i class="fa fa-plus-square-o" ></i> Tambah User</a>
                        

                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET.'include/img/list.png'; ?>" alt="User Avatar">

                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">User</h3>
                     <h5 class="widget-user-desc">List all <i class="label bg-yellow"><?= $user_counts; ?>  items</i></h5>
                  </div>

                  <form name="form_user" id="form_user" action="<?= base_url('admin/user/index'); ?>">
                  
                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead class="head-table">
                        <tr class="">
                           <th>
                            #
                           </th>
                           <th>Username</th>
                           <th>Full name</th>
                           <th>Email</th>
                           <th>role</th>
                           <th>Group</th>
                           <th>Status</th>
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
<?= get_template('fine_upload'); ?>
<form></form>
<div class="modal fade" id="modal_form" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#03904e; color:#fff; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Edit Data</h3>
            </div>
            <div class="modal-body form-horizontal">
        
                <form name="form_user" class="form-horizontal" id="form" enctype="multipart/form-data" method="POST">
                  <input type="hidden" name="id">
                  <div class="form-group ">
                        <label for="username" class="col-sm-2 control-label">Username <i class="required">*</i></label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="" readonly="readonly">
                          <small class="info help-block">The username of user.</small>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="email" class="col-sm-2 control-label">Email <i class="required">*</i></label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="" readonly="readonly">
                          <small class="info help-block">The email of user.</small>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="password" class="col-sm-2 control-label">Password <i class="required">*</i></label>

                        <div class="col-sm-6">
                          <div class="input-group col-md-8 input-password">
                          <input type="password" class="form-control password" name="password" id="password" placeholder="Password" value="<?= set_value('password'); ?>">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-flat show-password"><i class="fa fa-eye eye"></i></button>
                            </span>
                          </div>
                           <small class="info help-block">
                             The password character must 6 or more.
                          </small>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="fullname" class="col-sm-2 control-label">Full Name <i class="required">*</i></label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name" value="">
                          <small class="info help-block"></small>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="fullname" class="col-sm-2 control-label">Role<i class="required">*</i></label>

                        <div class="col-sm-8">
                          <?php echo cmb_dinamis('role_id','si_role','role','role_id', '', 'select2'); ?>
                          <small class="info help-block"></small>
                        </div>
                    </div>

                       <div class="form-group ">
                        <label for="fullname" class="col-sm-2 control-label">Group <i class="required"></i></label>
                        <div class="col-sm-8">
                          <?php echo cmb_dinamis('group_id','si_group','group','group_id', '', 'select2'); ?>
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


                  </form>
                  
                  
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
            "url": "<?php echo site_url('admin/users/requesAjax')?>",
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

    $('#add').click(function(){
      save_method = 'add';
      $("#avatar").attr('src', '<?= base_url('uploads/user/default.png'); ?>');
      $('#modal_form').modal('show');  
      $('.modal-title').text('Tambah Users'); // Set Title to Bootstrap modal title
      $('form input[type != hidden], form textarea, form select').val(''); //reset all form to 0
      $('.message').hide();  
      $('.box-form ').show();  
      $('#simpan').text('Simpan');
      $('.select2').val(null).trigger('change');
      $('.btn_save_back').show(); 
      $('[name=nip]').removeAttr('readonly', 'readonly');

    })

    

    $('.btn_save').click(function(e){
      e.preventDefault(); 
          var url = '<?= base_url('admin/users/update_save'); ?>';
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
                  if (save_type == 'back') {
                      $("#avatar").attr('src', '<?= base_url('uploads/user/default.png'); ?>');
                      table.ajax.reload(null,false);
                      toastr['success'](res.message);
                      $('#modal_form').modal('hide');
                      $('form input[type != hidden], form textarea, form select').val(''); //reset all form to 0
                      $('#btnSave').text('saving');
                      $('#btnSave').attr('disabled',false);
                      $('.loading').hide(); // hidden
                      //$('#model_form').modal('hide');
                      $('.select2').val(null).trigger('change');
                      
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
                        url :'<?= base_url()?>admin/users/delete',
                        type :'POST',
                        dataType: 'json',
                        data: {user_id:user_id}, 
                    })

                     .done(function(data){
                        
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
        $('.modal-title').text('Edit Users');
        var user_id = $(this).attr('data-id');
        save_method = 'edit';
        $.ajax({
            url: '<?= base_url()?>admin/users/get_update',
            type: 'POST',
            dataType: 'json',
            data: {user_id:user_id},
        }) 

        .done(function(res){
            if (res.success) {
                $('[name=id]').val(res.message.ID);
                $('[name=username]').val(res.message.username);
                $('[name=email]').val(res.message.email);
                $('[name=group_id]').val(res.message.group_id).change();
                $('[name=role_id]').val(res.message.role_id).change();
                $('[name=fullname]').val(res.message.fullname);
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
             endpoint: BASE_URL + 'admin/users/upload_avatar_file',
             params: {
                 '<?= $this->security->get_csrf_token_name(); ?>': '<?=   $this->security->get_csrf_hash(); ?>'
             }
         },
         deleteFile: {
             enabled: true,
             endpoint: BASE_URL + 'admin/users/delete_avatar_file',
         },
         thumbnails: {
             placeholders: {
                 waitingPath: BASE_ASSET + '/fine-upload/placeholders/waiting-generic.png',
                 notAvailablePath: BASE_ASSET + '/fine-upload/placeholders/not_available-generic.png'
             }
         },
         session: {
             endpoint: BASE_URL + 'admin/users/get_avatar_file/' + user_id,
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
                 $.get(BASE_URL + '/admin/users/delete_image_file/' + uuid);
             }
         }
     }); /*end image galey*/ 
    });

    $(document).on('click', '#view', function(){
        $('#modal_detail').modal('show'); 
        var user_id = $(this).attr('data-id');
        $.ajax({
            url: '<?= base_url()?>admin/pegawai/getDetail',
            type: 'POST',
            dataType: 'json',
            data: {user_id:user_id},
        }) 

        .done(function(res){
            if (res.success) {

                $('#nama').text(res.dataAjax.nama_lengkap);
                $('#nip').text(res.dataAjax.nip);
                $('#pangkat').text(res.pangkat);
                $('#golongan').text(res.golongan);
                $('#jabatan').text(res.jabatan);
                $('#unit_kerja').text(res.unitkerja);
                $("#avatar_view").attr('src', '<?= base_url('uploads/user/')?>'+res.foto);
                
                $('[name=id]').val(res.dataAjax.unit_kerjaid);
            } else {
                toastr['warning'](res.message);
            }
        })  
         
    });

    $('#foto').change(function() {
        var file=this.files[0];
        var imageFile=file.type;
        var match=["image/jpeg","image/png","image/jpg"];   

        if(!((imageFile==match[0]) || (imageFile==match[1]) || (imageFile==match[2]))){
            $("#type").text("Only Jpeg/ Jpg /Png /Gif are allowed");
            return false;
        }else{
            $("#type").hide();
            //alert("required");
            var reader=new FileReader();
            reader.onload=imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }

    });

    function imageIsLoaded(e){
        $("#avatar").attr('src', e.target.result);
         $("#imgRead").show();
    }
});
</script>