<style>
	button.btn.dropdown-toggle.btn-default {
    display: none;
}
</style>
<button type="submit" class="btn bg-teal  waves-effect" id="add_button">
    <i class="material-icons">add</i>
    <span>Add New Role</span>
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
                        <th>Matakuliah</th>
                        <th>SKS</th>
                        <th>Action ?</th>
                    </tr>
                </thead>
                <tbody>
                	
                	<tr>
                		<td colspan="4" class="text-center">Role tidak ditemukan</td>
                	</tr>
                	
                	
                </tbody>
            </table>
                
                </div>
    </div>
    <!-- #END# Task Info -->
	<!-- Bootstrap modal -->
<div class="modal fade" id="modal_detail" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#03904e; color:#fff; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center" id="modal_heading">Edit Matakuliah</h3>
            </div>
            <div class="modal-body form">
                <?= form_open('', [
                    'name'    => 'form_matkul', 
                    'class'   => 'form-horizontal', 
                    'id'      => 'form_matkul', 
                    'enctype' => 'multipart/form-data', 
                    'method'  => 'POST'
                  ]); 

                  ?>

					<div class="row clearfix">
	                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                        <label for="email_address_2">Matakuliah</label>
	                    </div>
	                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                        <div class="form-group">
	                            <div class="form-line">
	                                <input type="text" id="matakuliah" name="matakuliah" class="form-control" placeholder="Matakuliah">
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="row clearfix">
	                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
	                        <label for="password_2">SKS</label>
	                    </div>
	                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
	                        <div class="form-group">
	                            <div class="form-line">
	                                <input type="text" id="sks" name="sks" class="form-control" placeholder="SKS">
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

<script>
	$(document).ready(function(){
		table = $('#data_list').DataTable({ 

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
	        "responsive": true,

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('admin/matakuliah/load')?>",
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
							url: '<?= base_url('admin/matakuliah/delete') ?>',
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
        	$('#modal_heading').text('EDIT MATAKULIAH');
        	$('#button_submit').text('Update Data');
        	$('#modal_detail').modal('show'); 
        	save_method = 'update';
		 	id = $(this).attr('data-id');
        	$.ajax({
        		url: '<?= base_url('admin/matakuliah/edit') ?>',
        		type: 'POST',
        		dataType: 'JSON',
        		data: {id:id},
        	})
        	.done(function(res) {
        		if (res.success == true) {
        			$('#matakuliah').val(res.data.nama_matkul);
        			$('#sks').val(res.data.sks);
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
			$('#modal_heading').text('Tambah Matakuliah');
        	$('#button_submit').text('Simpan Data');
        	$('#modal_detail').modal('show'); 
        	save_method = 'add';
		
		});

        $('#button_submit').click(function() {

        	var url;
        	var form = $('#form_matkul');
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

        function reset(){
        	return $('form input[type != hidden], form textarea, form select').val('');
        }

		
	});
</script>