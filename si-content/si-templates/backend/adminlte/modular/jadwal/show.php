


 <div class="modal-header" style="background-color:#03904e; color:#fff; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Simpan Kehadiran</h3>
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
                  


<table class="table table-bordered">
	<tr>
		<th>Nama Dosen </th>
		<td> <?= $jadwal->nama_dosen ?> </td>
	</tr>

	<tr>
		<th>Nama Matakuliah</th>
		<td> <?= $jadwal->nama_matkul ?> </td>
	</tr>

	<tr>
		<th>Program Studi</th>
		<td> <?= $jadwal->nama_prodi ?> </td>
	</tr>

	<tr>
		<th>Tanggal Kuliah</th>
		<td> <?= tgl_indo($jadwal->tanggal) ?> </td>
	</tr>

	<tr>
		<th>Sesi Kewajiban</th>
		<td> <span class="badge badge-info"><?= $jadwal->sesi_kuliah ?></span> </td>
	</tr>

	<tr>
		<th>Sesi Kehadiran hari ini</th>
		<td> 
			<select name="sesi_kuliah" id="sesi_kuliah" class="form-control">
				<option value="null">Ubah Sesi (0 sesi)</option>
				<?php for ($a = 1; $a <= (int) $jadwal->sesi_kuliah; $a++): ?>
					<option value="<?= $a; ?>" <?= $a == $sesi_old->jumlah_sesi ? 'selected' : '' ?>><strong> Hadir <?= $a ?> Sesi</strong></option>
				<?php endfor ?>
			</select>
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

	<input type="hidden" name="form_kehadiran_id" value="<?= $jadwal->id ?>">
	<?= form_close(); ?>
	  
	<span class="loading loading-hide">Saving Data... <img src="<?= BASE_ASSET ?>include/img/loading-spin-primary.svg">      
</div>








      
