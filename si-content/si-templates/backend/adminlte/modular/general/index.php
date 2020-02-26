
<?= get_template('fine_upload'); ?>

<!-- Main content -->
<section class="content">
	<div class="row" >
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="panel-heading">
                        <h4>Data Instansi</h4>
                    </div>               
                </div>
               
               <?= form_open_multipart('', [
                    'name'    => 'form_user', 
                    'class'   => 'form-horizontal', 
                    'id'      => 'form_user', 
                    'enctype' => 'multipart/form-data', 
                    'method'  => 'POST'
                  ]); 

                  ?>
                  <div class="form-group ">
                        <label for="username" class="col-sm-2 control-label">Nama Instansi <i class="required">*</i></label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nama_instansi" id="nama_instansi" placeholder="Nama Instansi" value="<?= $information['nama_instansi'] ?>">
                          <small class="info help-block"></small>
                        </div>
                    </div>

                    <div class="form-group "> 
                        <label for="email" class="col-sm-2 control-label">Alamat Instansi </label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="alamat_instansi" id="alamat_instansi" placeholder="Alamat Instansi" value="<?= $information['alamat_instansi'] ?>">
                          <small class="info help-block"></small>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="username" class="col-sm-2 control-label">Logo Instansi </label>

                        <div class="col-sm-8">
                            <div id="user_avatar_galery" ></div>
                            <input name="user_avatar_uuid" id="user_avatar_uuid" type="hidden" value="<?= set_value('user_avatar_uuid'); ?>">
                            <input name="user_avatar_name" id="user_avatar_name" type="hidden" value="<?= set_value('user_avatar_name')?>">
                            <small class="info help-block">
                              Format file must PNG, JPEG.
                            </small>
                        </div>

                    </div>
                
                <hr>
                <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="panel-heading">
                        <h4>Settings Tanda Tangan</h4>
                    </div>               
                </div>

                <div class="form-group "> 
                    <label for="email" class="col-sm-2 control-label">Nama</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_pertama" id="nama_pertama" placeholder="Nama Lengkap" value="">
                        <small class="info help-block"></small>
                    </div>
                </div>

                <div class="form-group "> 
                    <label for="email" class="col-sm-2 control-label">Jabatan </label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="jabatan_pertama" id="jabatan_pertama" placeholder="Jabatan" value="">
                        <small class="info help-block"></small>
                    </div>
                </div>

                <div class="form-group "> 
                    <label for="email" class="col-sm-2 control-label">NIDN / NIP</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nidn_nip_pertama" id="nidn_nip_pertama" placeholder="NIDN / NIP" value="">
                        <small class="info help-block"></small>
                    </div>
                </div>
                <br>
                <br>
                <br>    
                <div class="form-group "> 
                    <label for="email" class="col-sm-2 control-label">Nama </label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_kedua" id="nama_kedua" placeholder="Nama Lengkap" value="">
                        <small class="info help-block"></small>
                    </div>
                </div>

                <div class="form-group "> 
                    <label for="email" class="col-sm-2 control-label">Jabatan</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="jabatan_kedua" id="jabatan_kedua" placeholder="Jabatan" value="">
                        <small class="info help-block"></small>
                    </div>
                </div>

                <div class="form-group "> 
                    <label for="email" class="col-sm-2 control-label">NIDN / NIP </label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nidn_nip_kedua" id="nidn_nip_kedua" placeholder="Nidn / Nip" value="">
                        <small class="info help-block"></small>
                    </div>
                </div>
                <br><br>
                <hr>
                <div class="form-group "> 
                    <label for="email" class="col-sm-2 control-label">Nama Aplikasi</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_aplikasi" id="nama_aplikasi" placeholder="Nama Aplikasi" value="<?= $information['nama_aplikasi'] ?>">
                        <small class="info help-block"></small>
                    </div>
                </div>
                <div class="form-group ">
                        <label for="username" class="col-sm-2 control-label">Favicon </label>

                        <div class="col-sm-8">
                          <input type="file" class="form-control" name="icon">
                          <small class="info help-block"></small>
                        </div>
                    </div>
                
                    <div class="message">
                      
                    </div>
                <br><br>    
                    <div class="row-fluid col-md-7">
                        <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="save (Ctrl+s)"><i class="fa fa-save" ></i> Simpan</button>
                        <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="cancel (Ctrl+x)"><i class="fa fa-undo" ></i> Cancel</a>
                        <span class="loading loading-hide"><img src="<?= BASE_ASSET ?>/img/loading-spin-primary.svg"> <i>Loading, Saving data</i></span>
                     </div>

                  <?= form_close(); ?>
               <hr>
               <!-- /.widget-user -->

            </div>
            <!--/box body -->
         </div>
         <!--/box -->

      </div>
   </div>

</section>

<!-- Page script -->
<script>
  $(document).ready(function() {
    $('#btn_cancel').click(function() {
        swal({
                title: "Are you sure?",
                text: "the data that you have created will be in the exhaust!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes!",
                cancelButtonText: "No!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location.href = BASE_URL + 'admin/dashboard';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();

        var form_user = $('#form_user');
        var data_post = form_user.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({
            name: 'save_type',
            value: save_type
        });

        $('.loading').show();
        $.ajax({
                url: BASE_URL + '/admin/general/simpan',
                type: 'POST',
                dataType: 'json',
                data: data_post,
            })
            .done(function(res) {
                if (res.success) {
                    var id = $('#user_avatar_galery').find('li').attr('qq-file-id');

                    if (save_type == 'back') {
                        window.location.href = res.redirect;
                        return;
                    }

                    $('.message').printMessage({
                        message: res.message
                    });
                    $('.message').fadeIn();
                    $('form input[type != hidden], form textarea, form select').val('');
                    $('.chosen').val('').trigger('chosen:updated');
                    $('#user_avatar_galery').fineUploader('deleteFile', id);

                } else {
                    $('.message').printMessage({
                        message: res.message,
                        type: 'warning'
                    });
                    $('.message').fadeIn();
                }

            })
            .fail(function() {
                $('.message').printMessage({
                    message: 'Error save data',
                    type: 'warning'
                });
            })
            .always(function() {
                $('.loading').hide();
                $('html, body').animate({
                    scrollTop: $(document).height()
                }, 1000);
            });

        return false;
    }); /*end btn save*/

    $('#user_avatar_galery').fineUploader({

        template: 'qq-template-gallery',
        request: {
            endpoint: BASE_URL + '/admin/general/upload_avatar_file',
            params: {
                '<?= $this->security->get_csrf_token_name(); ?>': '<?=   $this->security->get_csrf_hash(); ?>'
            }
        },
        deleteFile: {
            enabled: true,
            endpoint: BASE_URL + '/admin/general/delete_avatar_file'
        },
        thumbnails: {
            placeholders: {
                waitingPath: BASE_ASSET  + 'fine-upload/placeholders/waiting-generic.png',
                notAvailablePath: BASE_ASSET  + 'fine-upload/placeholders/not_available-generic.png'
            }
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
                $.get(BASE_URL + 'admin/general/delete_avatar_file/' + uuid);

            }
        }
    }); //end image galey/
}); /*end doc ready*/
</script>
