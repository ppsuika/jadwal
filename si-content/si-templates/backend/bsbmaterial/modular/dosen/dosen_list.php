<style>
	button.btn.dropdown-toggle.btn-default {
    display: none;

}
.row {
    padding:10px;
}
</style>
<button type="submit" class="btn bg-teal  waves-effect" id="add_button">
    <i class="material-icons">add</i>
    <span>Tambah Data Dosen</span>
</button>
<hr>
<div class="row clearfix">
    <!-- Task Info -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="">
            <table class="table table-hover dashboard-task-info" id="data_list">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Dosen</th>
                        <th>NIDN</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Action ?</th>
                    </tr>
                </thead>
                <tbody>
                	
                	<tr>
                		<td colspan="4" class="text-center">Dosen tidak ditemukan</td>
                	</tr>
                	
                	
                </tbody>
            </table>
                
                </div>
    </div>
    <!-- #END# Task Info -->
	<!-- Bootstrap modal -->
<div class="modal fade" id="" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#03904e; color:#fff; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center" id="modal_heading">Edit Matakuliah</h3>
            </div>
            <div class="modal-body form">
                <?= form_open('', [
                    'name'    => 'form_dosen', 
                    'class'   => 'form-horizontal', 
                    'id'      => 'form_dosen', 
                    'enctype' => 'multipart/form-data', 
                    'method'  => 'POST'
                  ]); 

                  ?>

					<div class="row clearfix">
	                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                        <label for="email_address_2">Nama Dosen</label>
	                    </div>
	                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                        <div class="form-group">
	                            <div class="form-line">
	                                <input type="text" id="matakuliah" name="nama_dosen" class="form-control" placeholder="Nama Dosen">
	                            </div>
	                        </div>
                            <small class="required">*Wajib di Isi</small>
	                    </div>
	                </div>
	                <div class="row clearfix">
	                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                        <label for="password_2">NIP / NIDN</label>
	                    </div>
	                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                        <div class="form-group">
	                            <div class="form-line">
	                                <input type="text" id="nidn" name="nidn" class="form-control" placeholder="NIP / NIDN">
	                            </div>
	                        </div>
	                    </div>
	                </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="password_2">No. Kontak</label>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="kontak" name="kontak" class="form-control" placeholder="No. Kontak">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="password_2">Email</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="password_2">Foto</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" id="foto" name="foto" class="form-control" placeholder="Foto...">
                                </div>
                            </div>
                        </div>
                    </div>
	               
	                <div class="row clearfix">
	                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
	                        <button type="button" class="btn btn-primary m-t-15 waves-effect pull-right" id="button_submit" data-button>Simpan Data</button>
	                    </div>
	                </div>

                <?= form_close(); ?>  
            </div>
            <div class="modal-footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div>
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_view" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#03904e; color:#fff; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Detail Data Dosen</h3>
            </div>
            <div class="modal-body form">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td width="220px"><strong>FOTO</strong></td>
                                <td><strong>BIO DATA DOSEN</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="50px">
                                    <strong></strong>
                                    <div class="img-responsive">
                                        <img id="avatar_view" src="" class="img img-responsive">
                                    </div>
                                </td>

                                <td>
                                    <table class="table table-hover">
                                        <tr>
                                            <td width="150px"> 
                                                <label>Nama Dosen</label>
                                            </td>
                                            <td>
                                                <strong id="nama"></strong>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="150px"> 
                                                <label>NIDN / NIP</label>
                                            </td>
                                            <td>
                                                <strong id="nip"></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="150px"> 
                                                <label>Email</label>
                                            </td>
                                            <td>
                                                <strong id="email"></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="150px"> 
                                                <label>No. Hp / Kontak</label>
                                            </td>
                                            <td>
                                                <strong id="kontak"></strong>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="150px"> 
                                                <label>Pangkat</label>
                                            </td>
                                            <td>
                                                <strong id="pangkat"></strong>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="150px"> 
                                                <label>Golongan</label>
                                            </td>
                                            <td>
                                                <strong id="golongan"></strong>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="150px"> 
                                                <label>Jabatan</label>
                                            </td>
                                            <td>
                                                <strong id="jabatan"></strong>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="150px"> 
                                                <label>Home Base</label>
                                            </td>
                                            <td>
                                                <strong id="unit_kerja"></strong>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="150px"> 
                                                <label>Riwayat Mengajar</label>
                                            </td>
                                            <td>
                                                <strong id="riwayat"></strong>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_detail" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"> 
            <div class="modal-header" style="background-color:#03904e; color:#fff; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Detail Data Dosen</h3>
            </div>
            <?= form_open('', [
                'name'    => 'form_dosen', 
                'class'   => 'form-horizontal', 
                'id'      => 'form_dosen', 
                'enctype' => 'multipart/form-data', 
                'method'  => 'POST'
              ]); 

            ?>
            <div class="modal-body form">
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td width="220px"><strong>FOTO</strong></td>
                                <td><strong>BIO DATA DOSEN</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="50px">
                                    <strong></strong>
                                    <div class="img-responsive">
                                        <img id="avatar_view" src="" class="img img-responsive">
                                    </div>
                                </td>

                                <td>
                                    <table class="table table-hover">
                                        <tr>
                                            <td width="150px"> 
                                                <label>Nama Dosen</label>
                                            </td>
                                            <td>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="matakuliah" name="nama_dosen" class="form-control" placeholder="Nama Dosen">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="150px"> 
                                                <label>NIDN / NIP</label>
                                            </td>
                                            <td>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="nidn" name="nidn" class="form-control" placeholder="NIP / NIDN">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="150px"> 
                                                <label>Email</label>
                                            </td>
                                            <td>
                                                <div class="row clearfix">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="email" class="form-control" placeholder="Email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="150px"> 
                                                <label>No. Hp / Kontak</label>
                                            </td>
                                            <td>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="kontak" name="kontak" class="form-control" placeholder="No. Kontak">
                                                    </div>
                                                </div>
                                            </div>
                                            </td>
                                        </tr>

                                        
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
            <div class="modal-footer">
                <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="button" class="btn btn-primary m-t-15 waves-effect pull-right" id="button_submit" data-button>Simpan Data</button>
                        </div>
                    </div>

            </div>
            <?= form_close(); ?>  
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
	$(document).ready(function(){
		table = $('#data_list').DataTable({ 

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
	        "responsive": true,

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('admin/dosen/load')?>",
                "type": "POST",

            },


            //Set column definition initialisation properties.
            "columnDefs": [
                { 
                    "targets": [ -1, 0 ], //last column
                    "orderable": false, //set not orderable
                },
            ],
        });

        $(document).on('click','.delete',function(e) {
		  //handler code here
		 	var id = $(this).attr('data-id');

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
							url: '<?= base_url('admin/dosen/delete') ?>',
							type: 'POST',
							dataType: 'json',
							data: {id: id},
						})
						.done(function(res) {
							table.ajax.reload(null,false);
							$.toast({
							    heading: 'Success',
							    text: res.message,
							    bgColor: '#4CAF50',
							    textColor: 'white',
							    position: 'top-right',
							});

							
						})
						.fail(function() {
							$.toast({
							    heading: 'warning',
							    text: res.message,
							    bgColor: '#ff9600 ',
							    textColor: 'white',
							    position: 'top-right',
							});
						})
						.always(function() {
							console.log("complete");
						});
				    }
				})
		});

		$(document).on('click', '.edit', function(){
			reset();
        	$('#modal_heading').text('EDIT DOSEN');
        	$('#button_submit').text('Update Data');
        	$('#modal_detail').modal('show'); 
        	save_method = 'update';
		 	id = $(this).attr('data-id');
        	$.ajax({
        		url: '<?= base_url('admin/dosen/edit') ?>',
        		type: 'POST',
        		dataType: 'JSON',
        		data: {id:id},
        	})
        	.done(function(res) {
        		if (res.success == true) {

                    $('#nama').text(res.data.nama_dosen);
                    $('#nip').text(res.data.nidn);
                    $('#email').text(res.data.email);
                    $('#kontak').text(res.data.kontak);
                    $('#pangkat').text(res.data.nama_dosen);
                    $('#golongan').text(res.data.nama_dosen);
                    $('#jabatan').text(res.data.nama_dosen);
                    $('#unit_kerja').text(res.data.nama_dosen);
                    $('#riwayat').text(res.data.nama_dosen);
        			
        		} else {
        			$.toast({
					    heading: 'warning',
					    text: res.message,
					    bgColor: '#ff9600 ',
					    textColor: 'white',
					    position: 'top-right',
					});
        		}
        	})
        	.fail(function(res) {
        		$.toast({
				    heading: 'warning',
				    text: res.message,
				    bgColor: '#ff9600 ',
				    textColor: 'white',
				    position: 'top-right',
				});
        	})
        	.always(function() {
        		console.log("complete");
        	});
		});

		$('#add_button').click(function(event) {
			reset();
			$('#modal_heading').text('Tambah Dosen');
        	$('#button_submit').text('Simpan Data');
        	$('#modal_detail').modal('show'); 
        	save_method = 'add';
		
		});

        $('#button_submit').click(function() {

        	var url;
        	var form = $('#form_dosen');
	        var data_post = form.serializeArray();
        	if (save_method == 'update') {
        		url = '<?= base_url('admin/matakuliah/update') ?>';
        		data_post.push({
		        	name:'id',
		        	value:id
		        })
        	} else if (save_method == 'add') {
        		url = '<?= base_url('admin/matakuliah/add') ?>';
        	}

        	
        	$.ajax({
        		url: url,
        		type: 'POST',
        		dataType: 'json',
        		data: data_post,
        	})
        	.done(function(res) {
        		if (res.success == true) {
					$.toast({
					    heading: 'Success',
					    text: res.message,
					    bgColor: '#4CAF50',
					    textColor: 'white',
					    position: 'top-right',
					});
                    $('form input[type != hidden], form textarea, form select').val('');
                    table.ajax.reload(null,false);
        			$('#modal_detail').modal('hide'); 

        		} else {
        			$.toast({
					    heading: 'warning',
					    text: res.message,
					    bgColor: '#ff9600 ',
					    textColor: 'white',
					    position: 'top-right',
					});
        		}
        	})
        	.fail(function(res) {
        		$.toast({
					    heading: 'warning',
					    text: res.message,
					    bgColor: '#ff9600 ',
					    textColor: 'white',
					    position: 'top-right',
					});
        	})
        	.always(function() {
        		console.log("complete");
        	});
        	
        });

        $(document).on('click', '.view', function(event) {
            event.preventDefault();
            $('#modal_view').modal('show');
            var id = $(this).attr('data-id');
            $.ajax({
                url: '<?= base_url('admin/dosen/edit') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {id:id},
            })
            .done(function(res) {
                if (res.success == true) {
                    $('#nama').text(res.data.nama_dosen);
                    $('#nip').text(res.data.nidn);
                    $('#email').text(res.data.email);
                    $('#kontak').text(res.data.kontak);
                    $('#pangkat').text(' - ');
                    $('#golongan').text(' - ');
                    $('#jabatan').text(' - ');
                    $('#unit_kerja').text(' - ');
                    $('#riwayat').text(' - ');
                     $("#avatar_view").attr('src', '<?= base_url('si-content/uploads/user/')?>'+res.foto);

                } else {
                    $.toast({
                        heading: 'warning',
                        text: res.message,
                        bgColor: '#ff9600 ',
                        textColor: 'white',
                        position: 'top-right',
                    });
                }
            })
            .fail(function() {
                $.toast({
                    heading: 'warning',
                    text: res.message,
                    bgColor: '#ff9600 ',
                    textColor: 'white',
                    position: 'top-right',
                });
            })
            .always(function() {
                console.log("complete");
            });
            

        });

        function reset(){
        	return $('form input[type != hidden], form textarea, form select').val('');
        }

		
	});
</script>