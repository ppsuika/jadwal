<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Sekolah Pascasarjana | SPS JADWAL</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.5 -->

    <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'assets/bootstrap/dist/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'assets/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'assets/Ionicons/css/ionicons.min.css') ?>">
<!-- Theme style -->
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'assets/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'assets/css/skins/_all-skins.min.css'); ?>">
 <link rel="stylesheet" href="<?= get_template_dir(dirname(__FILE__), 'assets/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

<style type="text/css">

	/* dengan background transparent agar scroll bar tidak terlihat */

.widget-user-2 .widget-user-header {
    overflow: hidden !important;
    }
    div#DataTables_Table_0_paginate {
    float: right !important;
}

	.main-footer {

    width: 100%;

    bottom: 0;

    margin: 0 auto;

    position: fixed;

}



.info {

	height :200px;

}

.ticker-container ul{
	padding: 0;
}
.ticker-container li{
	list-style: none;
	border-bottom: 1px solid green;
	padding: 10px;
}




</style>

<body>

<div class="wrapper" >

  <!-- Full Width Column -->

    <div class="container" style='padding-top:20px;'>

    <div class="row">

    	<div class="col-md-6 col-xs-6 col-xs-12 ">

			 <div class='col-md-3 col-xs-12'>

			 	<img src="<?php echo base_url('assets'); ?>/img/Logo.png" class='img img-responsive'/>	

			 </div>

			 <div class="col-md-9 col-xs-12">

				<div class="header">

					<h2>Media Informasi Sekolah Pascasarjana</h2>

					<span></span>

				</div>

              </div>

    	</div>

    	<div class="col-md-6 col-xs-12"></div>

    	<!-- <div class="col-md-6 col-xs-12">

	        <div class="callout callout-info">

	          <h4></h4>

	          <p> 

	         

	          </p>

	        </div>

    	</div> -->

    </div>



      <!-- Main content -->

	<section class="content">

		<div class="row">
			<div class="col-md-12">
	          <div class="box box-info">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>

	              <div class="box-tools pull-right">
	              </div>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <div class="row">
	              	<?php if ($agenda != null && $jadwal != null): ?>
	              		<div class="col-md-8">
		                  <p class="text-center">
		                    <strong>Jadwal Perkuliahan <?= hari_ini(date("w")).', '.tgl_indo(date('Y-m-d')); ?></strong>
		                  </p>

		                  <div class="table-responsive">

							  	<table class="table table-bordered table-striped" id="data_jadwal">

								    <thead>
					                    <tr>
					                      <th>No.</th>
					                      <th>Program Studi</th>
					                      <th>Smt</th>
					                      <th>Matakuliah</th>
					                      <th>Dosen</th>
					                      <th>Ruangan</th>
					                      <th>Jml Mhs</th>
					                      <th>Jam</th>
					                    </tr>
					                  </thead>
					                  <tbody>
					                    <?php $no = 1; foreach ($jadwal as $row): ?>
					                      <tr>
					                        <td><?= $no; ?></td>
					                        <td><?= $row->nama_prodi; ?></td>
					                        <td><?= $row->semester; ?></td>
					                        <td><?= $row->nama_matkul; ?></td>
					                        <td><?= $row->nama_dosen; ?></td>
					                        <td><?= $row->nama_ruangan; ?></td>
					                        <td><?= $row->jml_mahasiswa; ?></td>
					                        <td><?= $row->jam_mulai.' - '.$row->jam_berakhir; ?></td>
					                      </tr>
					                    <?php $no++;endforeach ?>
					                  </tbody>

							 	 </table>

						 	</div>

		                </div>
		                <!-- /.col -->
		                <div class="col-md-4">
		                  <p class="text-center">
		                    <strong>Agenda Sekolah Pascasarjana</strong>
		                  </p>
		                  <table class="table table-bordered table-striped" id="data_agenda">

								    <thead>
					                    <tr>
					                      <th>No.</th>
					                      <th>Prodi</th>
					                      <th>Kegiatan</th>
					                      <th>tanggal</th>
					                    </tr>
					                  </thead>
					                  <tbody>
					                    <?php $no = 1; foreach ($agenda as $row): ?>
					                      <tr>
					                        <td><?= $no; ?></td>
					                        <td><?= $row->nama_prodi; ?></td>
					                        <td><?= $row->judul_kegiatan; ?></td>
					                        <td><?= tgl_indo($row->tanggal).' / '.$row->jam_mulai.' - '.$row->jam_berakhir; ?></td>
					                      </tr>
					                    <?php $no++;endforeach ?>
					                  </tbody> 

							 	 </table>	
		                 
		                </div>
		                <!-- /.col -->
		            <?php elseif ($jadwal == null && $agenda != null): ?>
		            	<div class="col-md-12">
		                  <p class="text-center">
		                    <strong>Agenda Sekolah Pascasarjana</strong>
		                  </p>
		                  <table class="table table-bordered table-striped" id="data_agenda">

								    <thead>
					                    <tr>
					                      <th>No.</th>
					                      <th>Prodi</th>
					                      <th>Kegiatan</th>
					                      <th>tanggal</th>
					                    </tr>
					                  </thead>
					                  <tbody>
					                    <?php $no = 1; foreach ($agenda as $row): ?>
					                      <tr>
					                        <td><?= $no; ?></td>
					                        <td><?= $row->nama_prodi; ?></td>
					                        <td><?= $row->judul_kegiatan; ?></td>
					                        <td><?= tgl_indo($row->tanggal).' / '.$row->jam_mulai.' - '.$row->jam_berakhir; ?></td>
					                      </tr>
					                    <?php $no++;endforeach ?>
					                  </tbody> 

							 	 </table>	
		                 
		                </div>
		            <?php else: ?>
		            	<div class="col-md-12">
		            		<p class="text-center">
		                    <strong>Jadwal Perkuliahan <?= hari_ini(date("w")).', '.tgl_indo(date('Y-m-d')); ?></strong>
		                  </p>

		                  <div class="table-responsive">

							  	<table class="table table-bordered table-striped" id="data_jadwal">

								    <thead>
					                    <tr>
					                      <th>No.</th>
					                      <th>Program Studi</th>
					                      <th>Smt</th>
					                      <th>Matakuliah</th>
					                      <th>Dosen</th>
					                      <th>Ruangan</th>
					                      <th>Jml Mhs</th>
					                      <th>Jam</th>
					                    </tr>
					                  </thead>
					                  <tbody>
					                    <?php $no = 1; foreach ($jadwal as $row): ?>
					                      <tr>
					                        <td><?= $no; ?></td>
					                        <td><?= $row->nama_prodi; ?></td>
					                        <td><?= $row->semester; ?></td>
					                        <td><?= $row->nama_matkul; ?></td>
					                        <td><?= $row->nama_dosen; ?></td>
					                        <td><?= $row->nama_ruangan; ?></td>
					                        <td><?= $row->jml_mahasiswa; ?></td>
					                        <td><?= $row->jam_mulai.' - '.$row->jam_berakhir; ?></td>
					                      </tr>
					                    <?php $no++;endforeach ?>
					                  </tbody>

							 	 </table>

						 	</div>
		            	</div>
	              	<?php endif ?>

	                


	              </div>
	              <!-- /.row -->
	            </div>
	            <!-- ./box-body -->
	            <div class="box-footer">
	              <div class="row">
	                <div class="col-md-12 col-sm-12 col-xs-12">
	                  <div class="description-block ">
	                  		<div class="ticker-container">
							  <ul>
							  	<?php foreach ($agenda as $row): ?>
							  		<li id="list_agenda">
								    	 <h5 class="item description-header text-green" id="agenda_header"><?= $row->nama_prodi.' - '.$row->judul_kegiatan.' - '.tgl_indo($row->tanggal).' / '.$row->jam_mulai.' s/d '.$row->jam_berakhir ?></h5> 
								     	 <span><?= $row->kegiatan ?></span>
									 </li>
							  	<?php endforeach ?>
							  </ul>
							</div>
	                  </div>
	                </div>
	              </div>
	              <!-- /.row -->
	            </div>
	            <!-- /.box-footer -->
	          </div>
	          <!-- /.box -->
	        </div>

			<!-- <div class="col-md-8 col-xs-12">

				<div class="box box-info">

				     <div class="box-header with-border">

				       <h3 class="box-title">Jadwal Perkuliahan Sekolah Pascasarjana</h3>

				       <h4> <?= hari_ini(date("w")).', '.tgl_indo(date('Y-m-d')); ?></h4>

				     </div>

					<div class="box-body ">

						<div class="table-responsive">

						  	<table class="table table-bordered table-striped" id="data_jadwal">

							    <thead>
				                    <tr>
				                      <th>No.</th>
				                      <th>Program Studi</th>
				                      <th>Smt</th>
				                      <th>Matakuliah</th>
				                      <th>Dosen</th>
				                      <th>Ruangan</th>
				                      <th>Jml Mhs</th>
				                      <th>Jam</th>
				                    </tr>
				                  </thead>
				                  <tbody>
				                    <?php $no = 1; foreach ($jadwal as $row): ?>
				                      <tr>
				                        <td><?= $no; ?></td>
				                        <td><?= $row->nama_prodi; ?></td>
				                        <td><?= $row->semester; ?></td>
				                        <td><?= $row->nama_matkul; ?></td>
				                        <td><?= $row->nama_dosen; ?></td>
				                        <td><?= $row->nama_ruangan; ?></td>
				                        <td><?= $row->jml_mahasiswa; ?></td>
				                        <td><?= $row->jam_mulai.' - '.$row->jam_berakhir; ?></td>
				                      </tr>
				                    <?php $no++;endforeach ?>
				                  </tbody>

						 	 </table>

					 	</div>

					</div>

				</div>

			</div>  -->

			<!-- <div class="col-md-4 col-xs-12 ">

			 <div class="box box-info">

			 	<div class="box-header"> <i class="fa fa-comment"></i>

			 	Tentang Sekolah Pascasarjana

			 	</div>

			 	<div class="box-body">

				 	<div class="video">

						

						<div class="embed-responsive embed-responsive-16by9">   

							 <video autoplay="" loop="">

							  <source src="" type="video/mp4">

							</video>

						</div>

					</div>

			 	</div>

			</div> -->

				



		    <!-- <div class="box box-info">

		            <div class="box-header">

		              <i class="fa fa-envelope"></i>



		              <h3 class="box-title">Informasi</h3>

		            </div>

		            <div class="box-body info">

		            	

		              <p>

		              	

		              </p>


		            </div>

		          </div>

  

		    </div> -->

		</div>



        <!-- /.box -->

      </section>

      <!-- /.content -->

    </div>

    <!-- /.container -->



  <!-- /.content-wrapper -->

 <!-- <footer class="main-footer">

    <div class="container">

      <div class="pull-right hidden-xs">

        <b>Version</b> 1.0.0

      </div>

      <strong>Copyright &copy; <?=date('Y');?> <a href="https://ppsuika.ac.id">SPS-UIKA</a>.</strong> All rights

      reserved.

    </div>

    <!-- /.container 

  </footer>->>

</div>

<!-- ./wrapper -->



<!-- /.login-box -->



 <!-- jQuery 2.1.4 -->

<script src="<?= get_template_dir(dirname(__FILE__), 'assets/js/jquery2.js') ?>"></script>
<script src="<?= get_template_dir(dirname(__FILE__), 'assets/ticker.js') ?>"></script>
<script src="<?= get_template_dir(dirname(__FILE__), 'assets/js/jquery.easing.min.js') ?>"></script>
<script src="<?= get_template_dir(dirname(__FILE__), 'assets/js/jquery.easy-ticker.js') ?>"></script>
<script src="<?= get_template_dir(dirname(__FILE__), 'assets/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script src="<?= get_template_dir(dirname(__FILE__), 'assets/backstreet/jquery.backstretch.min.js') ?>"></script>
  <script src="<?= get_template_dir(dirname(__FILE__), 'assets/datatables.net/js/jquery.dataTables.min.js') ?>"></script>

<script src="<?= get_template_dir(dirname(__FILE__), 'assets/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<script>

$.backstretch([

      "<?= get_template_dir(dirname(__FILE__), 'assets/img/3.jpg') ?>",
      "<?= get_template_dir(dirname(__FILE__), 'assets/img/2.jpg') ?>",
      "<?= get_template_dir(dirname(__FILE__), 'assets/img/2.jpeg') ?>",
      "<?= get_template_dir(dirname(__FILE__), 'assets/img/3.jpeg') ?>",
      "<?= get_template_dir(dirname(__FILE__), 'assets/img/1.jpg') ?>",


  ], {duration: 3000, fade: 750});



$(document).ready(function() {
	// table_agenda = $('#data_agenda').DataTable({ 

 //        "processing": true, //Feature control the processing indicator.
 //        "serverSide": true, //Feature control DataTables' server-side processing mode.
 //        "order": [], //Initial no order.
 //        'paging'      : false,
	//       'lengthChange': false,
	//       'searching'   : false,
	//       'ordering'    : false,
	//       'info'        : false,
	//       'autoWidth'   : false,

 //        // Load data for the table's content from an Ajax source
 //        "ajax": {
 //            "url": "<?php echo site_url('main/ajaxAgenda')?>",
 //            "type": "POST",

 //        },


 //        //Set column definition initialisation properties.
 //        "columnDefs": [
 //            { 
 //                "targets": [ -1, 0 ], //last column
 //                "orderable": false, //set not orderable
 //            }
 //        ],

 //    });

	$.ajax({
		url: '<?= base_url('main/ajaxFile') ?>',
		type: 'POST',
		dataType: 'JSON',
	})
	.done(function(res) {
		// $.each(res, function( index, value ) {
		//   if (index != 'message') {
		// 	  	$.each(value, function(index, row) {
			  		
		// 	  		$('.ticker-container ul').append('<li>'+
		// 	    	 '<h5 class="item description-header text-green" id="agenda_header">'+row.nama_prodi+' - '+row.judul_kegiatan+' -  '+tgl_indo(row.tanggal)+' /  '+row.jam_mulai+' s/d '+row.jam_berakhir+'</h5>'+
		// 	     	 '<span>'+row.kegiatan+'</span>'+
		// 			 '</li>');
		// 	  	});

			  	

			  	
		//   }
		// });
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		setInterval(function(){
	    	$('#data_agenda').load(location.href + ' #data_agenda');		
	    }, 1000);

	    // setInterval(function(){
	    // 	$('#list_agenda').load(location.href + ' #list_agenda');		
	    // }, 15000);
	    var dd = $('.ticker-container').easyTicker({
					direction: 'up',
					easing: 'easeInOutBack',
					speed: 'slow',
					interval: 10000,
					height: 'auto',
					visible: 1,
					mousePause: 0,
					controls: {
						up: '.up',
						down: '.down',
						toggle: '.toggle',
						stopText: 'Stop !!!'
					}
				}).data('easyTicker');
		//table_agenda.ajax.reload(null,false);

	});

	function tgl_indo(param){
		var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
		var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

		var tanggal = new Date(param).getDate();
		var xhari = new Date(param).getDay();
		var xbulan = new Date(param).getMonth();
		var xtahun = new Date(param).getYear();

		var hari = hari[xhari];
		var bulan = bulan[xbulan];
		var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;
		var fullDate = '';
		return fullDate = (hari +', ' + tanggal + ' ' + bulan + ' ' + tahun);
	}
	


	

});

</script>





</body>

</html>

