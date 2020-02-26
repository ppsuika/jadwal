<link rel="stylesheet" href="<?= BASE_ASSET; ?>jquery-switch-button/jquery.switchButton.css">

<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Menu Manajemen 
    
      <small></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Menu Manajemen</li>
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
                        
                        <!-- <button class="btn btn-flat btn-success btn_add_new" id="btn_add_new" ><i class="fa fa-plus-square-o" ></i> Tambah Menu</button> -->

                        <a href="<?= base_url('admin/menu_manajemen/add') ?>" class="btn btn-flat btn-success btn_add_new" id="" ><i class="fa fa-plus-square-o" ></i> Tambah Menu</a>
                        

                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET.'include/img/list.png'; ?>" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Menu Manajemen</h3>
                     <h5 class="widget-user-desc">List all </h5>
                  </div>

                  <form name="form_user" id="form_user" action="<?= base_url('admin/user/index'); ?>">
                  
                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead class="head-table">
                        <tr class="">
                           <th>
                            <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                           </th>
                           <th>Label</th>
                           <th>Url / Link</th>
                           <th>Icon</th>
                           <th>Sort</th>
                           <th>Parent</th>
                           <th>Status</th>
                           <th>Category</th>
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
                <h3 class="modal-title text-center">Tambah Data</h3>
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
                  <div class="form-group ">
                        <label for="label" class="col-sm-2 control-label">Label <i class="required">*</i></label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="label" id="label" placeholder="Label" value="">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="url" class="col-sm-2 control-label">Link / Url <i class="required">*</i></label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="url" id="url" placeholder="Link / Url (dashboard)" value="">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="password" class="col-sm-2 control-label">Icon </label>

                        <div class="col-sm-8">
                          <div class="input-group col-md-8 input-password">
                          <input type="text" class="form-control icon" name="icon" id="icon" placeholder="Icon" value="<?= set_value('icon'); ?>">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-flat show-icon"><i class="fa fa-eye eye"></i></button>
                            </span>
                          </div>

                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="parent" class="col-sm-2 control-label">Parent </label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="">
                          <small class="info help-block"></small>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="fullname" class="col-sm-2 control-label">Urutan / sort </label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="sort" id="sort" placeholder="Urutan" value="">
                          <small class="info help-block"></small>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="fullname" class="col-sm-2 control-label">Status / Active</label>

                        <div class="col-sm-8">
                           <label>
                              <input value="Y" type="radio" name="status" class="flat-red checkbox" >
                              Menu Active
                            </label><br>
                            <label>
                              <input value="N" type="radio" name="status" class="flat-red checkbox">
                              Menu Non Active
                            </label>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Groups <i class="required">*</i></label>

                        <div class="col-sm-8">

                            <small class="info help-block">
                             Select one groups.
                          </small>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="username" class="col-sm-2 control-label">Avatar </label>

                        <div class="col-sm-8">
                            <div id="user_avatar_galery" ></div>
                            <input name="user_avatar_uuid" id="user_avatar_uuid" type="hidden" value="<?= set_value('user_avatar_uuid'); ?>">
                            <input name="user_avatar_name" id="user_avatar_name" type="hidden" value="<?= set_value('user_avatar_name')?>">
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
                <span class="loading loading-hide"><img src="<?= base_url('assets'); ?>/img/loading-spin-primary.svg"> <i>Loading, Saving data</i></span>
                <button type="submit" class="btn btn-flat btn-primary btn_save btn_action" id="simpan" data-stype='stay' title="save (Ctrl+s)"><i class="fa fa-save" ></i> Save</button>
                <button type="submit" class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="simpan" data-stype='back' title="save and back to the list (Ctrl+d)"><i class="ion ion-ios-list-outline" ></i> Save and Go to The List</button>
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
            "url": "<?php echo site_url('admin/menu_manajemen/ajax')?>",
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

    $('#btn_add_new').click(function(){
      save_method = 'add';
      $('#modal_form').modal('show');  
      $('.modal-title').text('Tambah Menu'); // Set Title to Bootstrap modal title
      $('form input[type != hidden], form textarea, form select').val(''); //reset all form to 0
      $('.message').hide();  
      $('.box-form ').show();  
      $('#simpan').text('Simpan');
      $('.select2').val(null).trigger('change');
      $('.btn_save_back').show(); 
    })

    

    $('.btn_save').click(function(e){
      e.preventDefault(); 
      if (save_method == 'add') {
          var url = '<?= base_url('admin/pegawai/create'); ?>';
          var save_type = $(this).attr('data-stype');
      } else {
          var url = '<?= base_url('admin/pegawai/update_save'); ?>';
          var save_type = 'back';
      }
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
                        url :'<?= base_url()?>admin/menu_manajemen/delete',
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
        $('.modal-title').text('Edit pegawai');
        var user_id = $(this).attr('data-id');
        save_method = 'edit';
        $.ajax({
            url: '<?= base_url()?>admin/pegawai/getUpdate',
            type: 'POST',
            dataType: 'json',
            data: {user_id:user_id},
        }) 

        .done(function(res){
            if (res.success) {
                $('[name=nama_lengkap]').val(res.dataAjax.nama_lengkap);
                $('[name=nip]').attr('readonly', 'readonly');
                $('[name=nip]').val(res.dataAjax.nip);
                $('[name=pangkat]').val(res.dataAjax.pangkat_id);
                $('[name=golongan]').val(res.dataAjax.golongan_id);
                $('[name=jabatan]').val(res.dataAjax.jabatan_id);
                $('[name=tempat_lahir]').val(res.dataAjax.tempat_lahir);
                $('[name=tgl_lahir]').val(res.dataAjax.tanggal_lahir);
                $('[name=alamat]').val(res.dataAjax.alamat_lengkap);
                $('[name=unitkerja]').val(res.dataAjax.unit_kerjaid);

                $('.box-form').removeClass('hide');
                $("#avatar_view").attr('src', '<?= base_url('uploads/user/')?>'+res.foto);
                $('.btn_save_back').hide();
                $('#btnSave').text('Update Data');
            $('.title-box').text('Edit pegawai'); // Set Title to Bootstrap modal title  
                $('#simpan').text('Update Data');
                $('.message').hide();
            } else {
                toastr['warning'](res.message);
            }
        })    
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