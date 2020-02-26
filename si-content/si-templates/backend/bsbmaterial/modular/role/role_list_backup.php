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
                    <ul class="pagination pull-right" id="pagination">
                        <li class="disabled">
                            <a href="javascript:void(0);">
                                <i class="material-icons">chevron_left</i>
                            </a>
                        </li>
                        <li class="active"><a href="">1</a></li>
                        <li><a href="" class="waves-effect">2</a></li>
                        <li><a href="" class="waves-effect">3</a></li>
                        <li><a href="" class="waves-effect">4</a></li>
                        <li><a href="" class="waves-effect">5</a></li>
                        <li>
                            <a href="" class="waves-effect">
                                <i class="material-icons">chevron_right</i>
                            </a>
                        </li>
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
		/*Jquery Hash Change*/
		$(function(){
			var path = window.location.pathname;
			var host = window.location.hostname;

			$(window).hashchange(function(){
				var hash = $.param.fragment();
				if (hash.search('page') == 0) {
					var hal = 1;
					var hash = getUrlVars();
					
					if (hash['hal']) {
						hal = hash['hal'];
					} 
				getData(hal);
        		$("ul#pagination li a:contains('"+hal+"')").parents().addClass('active').siblings().removeClass('active');        
        		
				} else  {
					var hal = 1;
        			$("#pagination li a:contains('"+hal+"')").parents().addClass('active').siblings().removeClass('active');        
					
					
				}

				

			});

			$(window).trigger('hashchange');
			
		})

		/*Aneka function*/
		function getData(hal_aktif) {
			//var hal_active;
			$.ajax({
			url: '<?= $role_list ?>',
			type: 'POST',
			dataType: 'json',
			data :{hal_aktif:hal_aktif},
			})
			.done(function(res) {
				$('.dashboard-task-infos tbody tr td').remove();
				
				var mulai = (hal_aktif>1) ? (hal_aktif*res.perpage) - res.perpage + 1: 1;
				var no = mulai;
				$.each(res.record, function(index, val) {
				
					
					$('.dashboard-task-infos').find('tbody').append(
						'<tr>'+
		            		'<td>'+no+'</td>'+
		            		'<td>'+val.role+'</td>'+
		            		'<td>'+
		            			'<button data-id="'+val.id+'" class="btn label bg-green m-r-5" id="edit">Edit</button>'+
		            			'<button type="button" data-id="'+val.id+'" class="btn label bg-red" id="delete">Delete</button>'+
		            		'</td>'+
		            	'</tr>'


					);
					no++;
				});

				var pagination = '';
		        var paging = Math.ceil(res.count / res.perpage);

		        if( (!hal_aktif) ){
		          $('ul#pagination li').remove();
		          for(i = 1; i <= paging ; i++){
		            pagination = pagination + '<li class="hal"><a href="role#page?hal='+i+'">'+i+'</a></li>';
		          }
		        }
		        
		        else if(hal_aktif){
		          $('ul#pagination li').remove();
		          for (i = 1; i <= paging; i++) {
		            pagination = pagination + '<li class="hal"><a href="role#page?&hal='+i+'">'+i+'</a></li>';
		          }               
		        }
		        $('#form').hide('slow');
				$('ul#pagination').append(pagination);

				$("ul#pagination li:contains('"+hal_aktif+"')").addClass('active');
				
				
				$('html, body').animate({
                    scrollTop: $(document).height()
                }, 1000);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				$('html, body').animate({
                    scrollTop: $(document).height()
                }, 1000);
			});
		}

		function getUrlVars(){
		  var vars = [], hash;
		  var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
		  for(var i = 0; i < hashes.length; i++)
		  {
		      hash = hashes[i].split('=');
		      vars.push(hash[0]);
		      vars[hash[0]] = hash[1];
		  }
		  return vars;

		}
		
		getData(null);
		/*Crud function*/

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
							getData(null);
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
					getData(null);
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

		
		
	});
</script>