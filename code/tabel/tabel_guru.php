<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.2/jquery.min.js" integrity="sha512-poSrvjfoBHxVw5Q2awEsya5daC0p00C8SKN74aVJrs7XLeZAi+3+13ahRhHm8zdAFbI2+/SUIrKYLvGBJf9H3A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            bLengthChange : false,
            iDisplayLength: -1,
            paging: false,
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'print'],
        });
    })
</script>
<b>
	<font color="#2133F8"> GURU</font>
</b> <br><br>
<hr color="#2133F8" size="3px" width="100%"><br>

<form action="halaman_utama.php?tabel_guru=$tabel_guru" method="post">
	<table width="100%">
		<tr>
			<td>
				<?php
				if ($_SESSION['type_user'] == "Admin") {
				?>
					<a href="halaman_utama.php?formulir_guru=$formulir_guru"><input class="button" type="button" value="Tambah"></a>
				<?php } ?>

			</td>

		</tr>
	</table>
</form>

<br>

<div style="font-size: 14px !important;">
<table class="datatable" border="1" style="width: 100% !important;">
	<thead>
    <tr align='center'>
		<th class="normal">Kode Guru</th>
		<th class="normal">Nama Guru</th>
		<th class="normal">Mata Pelajaran</th>
		<th class="normal">TTL</th>
		<th class="normal">Jenis Kelamin</th>
		<th class="normal">Agama</th>
		<th class="normal">Alamat</th>
		<th class="normal">Tools</th>
	</tr>
    </thead>

		<tbody>
        <?php
	include "koneksi.php";

	$tampilkan_isi = "select * from guru g,mata_pelajaran mp where g.kode_mp=mp.kode_mp";

	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$kode_guru = $isi['kode_guru'];
		$nama_guru = $isi['nama_guru'];
		$kode_mp = $isi['kode_mp'];
		$nama_mp = $isi['nama_mp'];
		$tempat_lahir = $isi['tempat_lahir'];
		$tanggal_lahir = $isi['tanggal_lahir'];
		$jenis_kelamin = $isi['jenis_kelamin'];
		$agama = $isi['agama'];
		$alamat_guru = $isi['alamat_guru'];

	?>
        <tr align='center'>
			<td><?php echo $kode_guru ?></td>
			<td><?php echo $nama_guru ?></td>
			<td><?php echo $nama_mp ?></td>
			<td><?php echo $tempat_lahir ?>, <?php echo $tanggal_lahir ?></td>
			<td><?php echo $jenis_kelamin ?></td>
			<td><?php echo $agama ?></td>
			<td><?php echo $alamat_guru ?></td>
			<td>
				<form action="halaman_utama.php?aksi_guru=$aksi_guru" method="post">
					<input type="hidden" name="kode_guru" value="<?php echo $kode_guru; ?>">
					<input class="update" name="proses" type="submit" value="Update">
					<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data guru bernama <?php echo $nama_guru; ?> ?')">
                    </form>
			</td>
		</tr>
        <?php
	}
	?>
        </tbody>


</table>
</div>
