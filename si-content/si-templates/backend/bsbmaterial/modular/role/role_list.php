<button type="submit" class="btn bg-teal  waves-effect" id="add_button">
    <i class="material-icons">add</i>
    <span>Add New Role</span>
</button>
<hr>
<div class="row clearfix">
    <!-- Task Info -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	
                        	<tr>
                        		<td colspan="3" class="text-center">Role tidak ditemukan</td>
                        	</tr>
                        	
                        	
                        </tbody>
                    </table>
                    <ul style="margin-top:10px;" class="pagination pull-right" id="pagination">
                        
                    </ul>
                </div>
    </div>
    <!-- #END# Task Info -->
  	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
  		<div class="form-hidden" style="display: none">
  			<form id="form" name="form" enctype="multipart/form-data" method="post">
	            <label for="email_address">Role Name</label>
	            <div class="form-group">
	                <div class="form-line">
	                    <input type="text" id="role" class="form-control" placeholder="Role">
	                </div>
	            </div>

	            <br>
	            <button  type="button" class="btn btn-primary waves-effect" id="submit">Simpan</button>
	        </form>
  		</div>
  		<div class="message">
                      
        </div>
  	</div>	

</div>

<script>
	$(document).ready(function(){
		/*Crud function*/
		//Pagination
		$('#pagination').on('click', 'a', function(event) {
			event.preventDefault();
			var pageno = $(this).attr('data-ci-pagination-page');
			loadPagination(pageno);

		});
		getPosition(null);
		function getPosition(position = null) {
			$.ajax({
				url: '<?= base_url('admin/role/pagePosition') ?>',
				type: 'get',
				success: function(res){
					var pageno = '';
					if (position != null) {
						pageno = position;
					} else {
						pageno = res;
					}
					loadPagination(pageno)
				}
			});

		}

		function loadPagination(pageno){
			$.ajax({
				url: '<?= base_url('admin/role/getAjax/') ?>'+pageno,
				type: 'get',
				dataType: 'json',
				//data: {hal_aktif: pageno},
				success: function(res){
					$('#pagination').html(res.pagination);
					getData(res.record, res.row);
				}
			})
			
		}

		//Add function
		$('#add_button').click(function(){
			$('.form-hidden').show( "slow" );
			$('#form').fadeIn('slow');
			$('#role').val('');
			$('#submit').text('Simpan');
			$('#submit').attr('status', 'simpan');
			console.log('');
		});

		//delete function
		$(document).on('click', '#delete', function(event) {
			event.preventDefault();
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
							url: '<?= base_url('admin/role/delete') ?>',
							type: 'POST',
							dataType: 'json',
							data: {id: id},
						})
						.done(function(res) {
							getPosition(1);
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

		//edit function show
		$(document).on('click', '#edit', function(event) {
			event.preventDefault();
			$('#form').fadeIn('slow');
			$('#role').val('');
			$('#submit').text('Update Data');
			$('#submit').attr('status', 'edit');
			var id = $(this).attr('data-id');
			$.ajax({
				url: '<?= base_url('admin/role/role_edit_data') ?>',
				type: 'POST',
				dataType: 'json',
				data: {id: id},
			})
			.done(function(res) {

				$('.form-hidden').fadeIn('slow');
				$('#role').val(res.record.role);

			})
			.fail(function(res) {
				$.toast({
				    heading: 'Warning',
				    text: res.message,
				    bgColor: '#ff9600 ',
				    textColor: 'white',
				    position: 'top-right',
				});
			})
			
		});

		//Submit form
		$('#submit').click(function() {
			var status = $(this).attr('status');
			var url = '';	
			var data_post = $('#role').val();
			var id = '';
			if (status == 'simpan') {
				url = '<?= base_url('admin/role/simpan'); ?>';
			} else {
				url = '<?= base_url('admin/role/update'); ?>';
				id = $('#edit').attr('data-id');

			}
			
		
			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'JSON',
				data: {role: data_post, id: id},
			})
			.done(function(res) {
				if (res.success == true) {
					$('#role').val('');
					$.toast({
					    heading: 'Success',
					    text: res.message,
					    bgColor: '#4CAF50',
					    textColor: 'white',
					    position: 'top-right',
					});
					getPosition(1);
				} else {
					$('.message').printMessage({
	                    message: res.message,
	                    type: 'warning'
	                });
					
				}
			})
			.fail(function() {
				$('.message').printMessage({
                    message: 'Gagal Melakukan request ',
                    type: 'warning'
                });
			})
			.always(function() {
				$('html, body').animate({
                    scrollTop: $(document).height()
                }, 1000);
			});
		});

		/*Aneka function*/
		function getData(result, rno) {
			rno = Number(rno);
			$('.dashboard-task-infos tbody tr td').remove();

			for(index in result) {
				rno+=1;
				
				$('.dashboard-task-infos').find('tbody').append(
					'<tr>'+
	            		'<td>'+rno+'</td>'+
	            		'<td>'+result[index].role+'</td>'+
	            		'<td>'+
	            			'<button data-id="'+result[index].id+'" class="btn label bg-green m-r-5" id="edit">Edit</button>'+
	            			'<button type="button" data-id="'+result[index].id+'" class="btn label bg-red" id="delete">Delete</button>'+
	            		'</td>'+
	            	'</tr>'


				);
				
			};			
		}


		

		
		
	
		

		
		
	});
</script>