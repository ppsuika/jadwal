
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Manajemen Matakuliah
    
      <small></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Manajemen Matakuliah</li>
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

                        <button  class="btn btn-flat btn-success btn_add_new" id="add_ruangan" ><i class="fa fa-plus-square-o" ></i> Tambah Matakuliah</button>
                        

                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET.'include/img/list.png'; ?>" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Manajemen Matakuliah</h3>
                     <h5 class="widget-user-desc">List all </h5>
                  </div>

               
                  
                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead class="head-table">
                        <tr class="">
                           <th>
                            #
                           </th>
                           <th>Kode Matkul</th>
                           <th>Nama Matkul</th>
                           <th>SKS</th>
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
                  <input type="hidden" name="id">
                  <div class="form-group ">
                        <label for="label" class="col-sm-2 control-label">Kode Matakuliah </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="kode_matkul" id="kode_matkul" placeholder="Kode Matakuliah" value="">
                          <i class="required"><small></small></i>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="url" class="col-sm-2 control-label">Nama Matakuliah <i class="required">*</i></label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nama_matkul" id="nama_matkul" placeholder="Nama Matakuliah" value="">
                        </div>
                    </div>
                    

                    <div class="form-group ">
                        <label for="url" class="col-sm-2 control-label">SKS <i class="required"></i></label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="sks" id="sks" placeholder="SKS" value="">
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
            "url": "<?php echo site_url('admin/matakuliah/ajax')?>",
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

    $('#add_ruangan').click(function(){
      save_method = 'add';
      $('#modal_form').modal('show');  
      $('.modal-title').text('Tambah Matakuliah'); // Set Title to Bootstrap modal title
      $('form input[type != hidden], form textarea, form select').val(''); //reset all form to 0
      $('.message').hide();  
      $('.box-form ').show();  
      $('#simpan').text('Simpan');
      $('.select2').val(null).trigger('change');
      $('.btn_save_back').show(); 
    })

    

    $('.btn_save').click(function(e){
      e.preventDefault(); 
      var form = $('#form')[0];
      if (save_method == 'add') {
          var url = '<?= base_url('admin/matakuliah/create'); ?>';
          var save_type = $(this).attr('data-stype');
      } else {
          var url = '<?= base_url('admin/matakuliah/data_update_save '); ?>';
          var save_type = 'back';
      }
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
              if (res.success == true) {
                if (save_type == 'stay') {
                  $('form input[type != hidden], form textarea, form select').val('');
                  table.ajax.reload(null,false);
                  $('.message').printMessage({
                        message: res.message
                    });
                } else {

                  toastr['success'](res.message);
                  $('form input[type != hidden], form textarea, form select').val('');
                  $('#modal_form').modal('hide');  
                  table.ajax.reload(null,false);

                }

              } else {
                console.log(res);
                $('.message').printMessage({
                        message: res.message,
                        type: 'warning'
                });
                $('.message').fadeIn();
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
                        url :'<?= base_url()?>admin/matakuliah/delete',
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
        $('.modal-title').text('Edit Matakuliah');
        var user_id = $(this).attr('data-id');
        save_method = 'edit';
        $.ajax({
            url: '<?= base_url()?>admin/matakuliah/data_update',
            type: 'POST',
            dataType: 'json',
            data: {user_id:user_id},
        }) 

        .done(function(res){
            if (res.success) {
               $('[name=kode_matkul]').val(res.message.kode_matkul);
                $('[name=nama_matkul]').val(res.message.nama_matkul);
                $('[name=sks]').val(res.message.sks);
                $('[name=id]').val(res.message.id);
                $('.btn_save_back').hide();
                $('#btnSave').text('Update Data');
                $('.title-box').text('Edit Ruangan'); // Set Title to Bootstrap modal title  
                $('#simpan').text('Update Data');
                $('.message').hide();
            } else {
                toastr['warning'](res.message);
            }
        })    
    });

    
});
</script>