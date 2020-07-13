
 <div class="modal-header" style="background-color:#03904e; color:#fff; ">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h3 class="modal-title text-center">Detail Kehadiran</h3>
</div>
<div class="modal-body form form-horizontal">
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
			<span class="badge badge-success"><?= $sesi_old->jumlah_sesi ?>
			</span>
		 </td>
	</tr>
</table>
</div>