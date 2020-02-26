<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BASIC EXAMPLE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Url</th>
                                            <th>Icon</th>
                                            <th>Parent</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    	$no = 1;
                                    		foreach ($menu_list as $menu):
                                    	 ?>
                                    	 <tr>
	                                    	 <td><?= $no; ?></td>
	                                    	 <td><?= $menu->title; ?></td>
	                                    	 <td><?= $menu->url; ?></td>
	                                    	 <td><?= $menu->icon; ?></td>
	                                    	 <td><?= $menu->parent; ?></td>
	                                    	 <td><?= $menu->is_active; ?></td>
	                                    	 <td>
	                                    	 	<div class="btn-group dropdown">
							                        <button type="button" class="btn btn-primary btn-xs" data-toggle="dropdown" style="border-radius:2px;" aria-expanded="false">
							                          <i class="material-icons">menu</i>
							                        </button>
							                        <ul class="dropdown-menu" style="margin-left:-155px; margin-top:0px; border-radius:0; padding:0;">

							                          <li><a ><i class="material-icons">zoom_in</i> View</a></li>
							                          <li><a ><i class="material-icons">lock_open</i> Edit</a></li>
							                          <li><a ><i class="material-icons">delete_sweep</i> Delete</a></li>
							                        </ul>
							                      </div>
	                                    	 </td>
                                    	 </tr>
                                    	<?php $no++; endforeach; ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>