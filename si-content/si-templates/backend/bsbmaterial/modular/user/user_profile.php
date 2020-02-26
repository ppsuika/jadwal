<script type="text/javascript">
	
</script>
<div class="container-fluid">
	<div class="row clearfix">
	    <div class="col-xs-12 col-sm-3">
	        <div class="card profile-card">
	            <div class="profile-header">&nbsp;</div>
	            <div class="profile-body">
	                <div class="image-area img-responsive " id="">
	                	<?php if (file_exists(FCPATH."si-content/uploads/user/".get_user_info('avatar'))):
	                		$image = UPLOAD_DIR."/user/".get_user_info('avatar');
	                	 ?>
	                	<?php else:
	                		$image = UPLOAD_DIR."/user/default.png";
	                	 ?>
	                	<?php endif ?>
	                    <img id="preview-image" class="img img-circle" src="<?= $image ?>" alt="AdminBSB - Profile Image" style="width:128px; height: 128px;" />
	                </div>
	                <div class="content-area">
	                    <h3 id="profile_name"><?= get_user_info('fullname'); ?></h3>
	                    <p>Web Software Developer</p>
	                    <p class='role'><?= get_user_info('role_id'); ?></p>
	                </div>
	            </div>
	            <div class="profile-footer">
	            	<?= form_open_multipart('admin/users/fileupload') ?>
	            		
  						<input type="file" name="image" class="form-control" />
  						<br>
                        <button type="submit" class="btn btn-primary btn-lg waves-effect btn-block" id="upload" name="upload" >Upload Profile Foto</button>
                    <?= form_close(); ?>

	                
	            </div>
	        </div>

	        <div class="card card-about-me">
	            <div class="header">
	                <h2>ABOUT ME</h2>
	            </div>
	            <div class="body">
	                <ul>
	                    <li>
	                        <div class="title">
	                            <i class="material-icons">library_books</i>
	                            Education
	                        </div>
	                        <div class="content">
	                            B.S. in Computer Science from the University of Tennessee at Knoxville
	                        </div>
	                    </li>
	                    <li>
	                        <div class="title">
	                            <i class="material-icons">location_on</i>
	                            Location
	                        </div>
	                        <div class="content">
	                            Malibu, California
	                        </div>
	                    </li>
	                    <li>
	                        <div class="title">
	                            <i class="material-icons">edit</i>
	                            Skills
	                        </div>
	                        <div class="content">
	                            <span class="label bg-red">UI Design</span>
	                            <span class="label bg-teal">JavaScript</span>
	                            <span class="label bg-blue">PHP</span>
	                            <span class="label bg-amber">Node.js</span>
	                        </div>
	                    </li>
	                    <li>
	                        <div class="title">
	                            <i class="material-icons">notes</i>
	                            Description
	                        </div>
	                        <div class="content">
	                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
	                        </div>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </div>
	    <div class="col-xs-12 col-sm-9">
	        <div class="card">
	            <div class="body">
	                <div>
	                    <ul class="nav nav-tabs" role="tablist">
	                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
	                        <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
	                        <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
	                    </ul>
							
	                    <div class="tab-content">
	                        <div role="tabpanel" class="tab-pane fade in active" id="home">
	                        	<div class="">
										<div class="post-body">
											<form action="<?= base_url('admin/users/save_post') ?>" method="post">
												<textarea name="editor" id="editor" cols="30" rows="10" ></textarea>
											<br>
												<div class="row">
													<div class="col-md-4"></div>
													<div class="col-md-8">
														<button class="btn btn-primary waves-effect right " type="submit" name="kirim">Submit</button>
													</div>
												</div>
											</form>
										</div>
									</div>	
								<!-- Status POST -->
								<?php foreach ($data_user_post as $r): ?>
	                            <div class="panel panel-default panel-post ">
	                                <div class="panel-heading header">
	                                    <div class="media">
	                                        <div class="media-left">
	                                            <a href="#">
	                                                <img src="<?= $image ?>" />
	                                            </a>
	                                        </div>

	                                        <div class="media-body">
	                                            <h4 class="media-heading">
	                                                <a href="#"><?= get_user_info_id('fullname', $r->ID_users); ?></a>
	                                            </h4>
	                                            Shared - <?= date('d-M-Y', strtotime($r->date)) ?>
	                                        </div>

	                                        <ul class="header-dropdown m-r-0">
			                                <li>
			                                    <a href="javascript:void(0);">
			                                        <i class="material-icons">info_outline</i>
			                                    </a>
			                                </li>
			                                <li>
			                                    <a href="#delete" id="delete" data-id='<?= $r->id ?>' data-toggle="tooltip" data-placement="top" title="Klik Untuk Menghapus" data-original-title="Klik Untuk Menghapus">
			                                        <i class="material-icons">delete_forever</i>
			                                    </a>
			                                </li>
			                            </ul>
	                                    </div>
	                                </div>
									
									

	                                <div class="panel-body">
	                                    <div class="post">
	                                        <div class="post-heading">
	                                        	<?= $r->content ?>
	                                            <!-- <p>
	                                            	I am a very simple wall post. I am good at containing <a href="#">#small</a> bits of <a href="#">#information</a>. I require little more information to use effectively.</p> -->
	                                        </div>
	                                        <div class="post-content">

	                                            <!-- <img src="../../images/profile-post-image.jpg" class="img-responsive" /> -->
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="panel-footer">
	                                    <ul>
	                                        <li>
	                                            <a href="#">
	                                                <i class="material-icons">thumb_up</i>
	                                                <span>12 Likes</span>
	                                            </a>
	                                        </li>
	                                        <li>
	                                            <a href="#">
	                                                <i class="material-icons">comment</i>
	                                                <span>5 Comments</span>
	                                            </a>
	                                        </li>
	                                        <li>
	                                            <a href="#">
	                                                <i class="material-icons">share</i>
	                                                <span>Share</span>
	                                            </a>
	                                        </li>
	                                    </ul>

	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" placeholder="Type a comment" />
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
								<?php endforeach ?>
	                          
	                        </div>
	                        <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
	                            <form class="form-horizontal" id="form-profile" action="<?= base_url('admin/users/update_users') ?>" method="POST" enctype="multipart/form-data">
	                                <div class="form-group">
	                                    <label for="NameSurname" class="col-sm-2 control-label">Name Surname</label>
	                                    <div class="col-sm-10">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Name Surname" value="Marc K. Hammond" required>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label for="Email" class="col-sm-2 control-label">Email</label>
	                                    <div class="col-sm-10">
	                                        <div class="form-line">
	                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="example@example.com" disabled="disabled">
	                                        </div>
	                                    </div>
	                                </div>
	                                
	                                <div class="form-group">
	                                    <div class="col-sm-offset-2 col-sm-10">
	                                        <button type="submit" class="btn btn-danger">Update Data</button>
	                                    </div>
	                                </div>
	                            </form>
	                        </div>
	                        <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
	                            <form class="form-horizontal" id="form-password" action="" method="POST" enctype="multipart/form-data">
	                                <div class="form-group">
	                                    <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
	                                    <div class="col-sm-9">
	                                        <div class="form-line">
	                                            <input type="password" class="form-control" id="OldPassword" name="oldpassword" placeholder="Old Password" required>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
	                                    <div class="col-sm-9">
	                                        <div class="form-line">
	                                            <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="New Password" required>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
	                                    <div class="col-sm-9">
	                                        <div class="form-line">
	                                            <input type="password" class="form-control" id="newpassword2" name="newpassword2" placeholder="New Password (Confirm)" required>
	                                        </div>
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <div class="col-sm-offset-3 col-sm-9">
	                                        <button type="submit" class="btn btn-danger">Update Data</button>
	                                    </div>
	                                </div>
	                            </form>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

<script type="text/javascript">
	


	$(document).ready(function() {
		loadProfile();
		
		function loadProfile(){
			$.ajax({
				url: '<?= base_url('admin/users/profile_ajax'); ?>',
				type: 'POST',
				dataType: 'json',
				success: function(res){
					if (res.status == true) {
						
						$('#fullname').val(res.profile.fullname);
						$('#email').val(res.profile.email);
						$('#profile_name').val(res.profile.fullname);
					}
				}
			})
		}

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
							url: '<?= base_url('admin/users/post_delete') ?>',
							type: 'POST',
							dataType: 'json',
							data: {id: id},
						})
						.done(function(res) {
							location.replace("profile");
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

		
	
		
	});
</script>