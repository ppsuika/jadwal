
 <div class="modal-header" style="background-color:#03904e; color:#fff; ">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h3 class="modal-title text-center">Detail Kehadiran</h3>
</div>
<div class="modal-body form form-horizontal">
	<form method="post" action="<?= base_url('admin/dashboard/save_url') ?>" id="form_url">
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
				<th>Jam Masuk & Keluar</th>
				<td> <span class="badge badge-pill bg-green">Jam Masuk :  <?= $jadwal->jam_masuk ?> | Keluar  : <?= $jadwal->jam_keluar ?></span> </td>
			</tr>

		

			<tr>
				<th>Url / Link Rekaman</th>
				<td> 
					<input type="text" name="rekaman" class="form-control" value="<?= $jadwal->url_video ?>">
				 </td>
			</tr>
		</table>
		<div class="row">
	<div class="col-md-4">
		
	</div>

	<div class="col-md-4">
		
	</div>
	<input type="hidden" name="id" value="<?= $jadwal->id ?>">
	<div class="col-md-4">
		<button type="button" class="btn btn-primary btn-block simpan_url" data-id="<?= $jadwal->id ?>">
			<i class="fa fa-chechk"></i> Simpan
		</button>
	</div>
	</form>

</div>
</div>