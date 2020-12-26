


 <div class="modal-header" style="background-color:#03904e; color:#fff; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Simpan Kehadiran</h3>
            </div>
            <div class="modal-body form form-horizontal">
                <?= form_open('', [
                    'name'    => 'form', 
                    'class'   => 'form-horizontal', 
                    'id'      => 'form_update_kehadiran', 
                    'enctype' => 'multipart/form-data', 
                    'method'  => 'POST'
                  ]); 

                  ?>
                  


<table class="table table-bordered">
	<tr>
		<th>Nama Dosen </th>
		<td colspan=2> <?= $jadwal->nama_dosen ?> </td>
	</tr>

	<tr>
		<th>Nama Matakuliah</th>
		<td colspan=2> <?= $jadwal->nama_matkul ?> </td>
	</tr>

	<tr>
		<th>Program Studi</th>
		<td colspan=2> <?= $jadwal->nama_prodi ?> </td>
	</tr>

	<tr>
		<th>Tanggal Kuliah</th>
		<td colspan=2> <?= tgl_indo($jadwal->tanggal) ?> </td>
	</tr>

	

	<tr >
		<th>Jam Mengajar</th>
		<td> 
			<div class='input-group date timepicker' >

            <input type="text" class="form-control " id="timepicker" placeholder="Jam Mulai" name="jam_mulai" value="" />

              <span class="input-group-addon">

                  <i class="fa fa-clock-o"></i>   

              </span>

          </div>
		</td>
		<td>
			<div class='input-group date timepicker' >

            <input type="text" class="form-control" id="timepicker2" placeholder="Jam Akhir" name="jam_berakhir" value="" />

              <span class="input-group-addon">

                  <i class="fa fa-clock-o"></i>   

              </span>

          </div>
		</td>
	</tr>
</table>
<!-- <div class="row">
	<div class="col-4">
		<a href="{{ route('transactions.status', $jadwal->id) }}?status=SUCCESS" class="btn btn-success btn-block">
			<i class="fa fa-chechk"></i> Set Success
		</a>
	</div>

	<div class="col-4">
		<a href="{{ route('transactions.status', $jadwal->id) }}?status=FAILED" class="btn btn-danger btn-block">
			<i class="fa fa-chechk"></i> Set Gagal
		</a>
	</div>

	<div class="col-4">
		<a href="{{ route('transactions.status', $jadwal->id) }}?status=PENDING" class="btn btn-warning btn-block">
			<i class="fa fa-chechk"></i> Set Pending
		</a>
	</div>


</div> -->
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4"></div>
		<div class="col-md-4">
			
				<input type="hidden" name="form_kehadiran_id" value="<?= $jadwal->id ?>">
				<button type="button" class="btn btn-primary btn-block simpan_jam" data-id="<?= $jadwal->id ?>">
					<i class="fa fa-chechk"></i> Simpan
				</button>
			
		</div>
	</div>
	
	<?= form_close(); ?>
	  
	
</div>


<script>
	jQuery(document).ready(function() {
		$('.timepicker').datetimepicker({

		   format: 'HH:mm'

		  });
		 $('.datepicker').datepicker({

	      autoclose: true,

	      format: 'yyyy/mm/dd'

	    });
});	
</script>







      
