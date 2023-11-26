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
	<font color="#2133F8"> WALI MURID</font>
</b> <br>
<hr color="#2133F8" size="3px" width="100%"><br>

<form action="halaman_utama.php?tabel_wali_murid=$tabel_wali_murid" method="post">
	<table width="100%">
		<tr>
			<td>
				<?php
				if ($_SESSION['type_user'] == "Admin") {
				?>
					<a href="halaman_utama.php?formulir_wali_murid=$formulir_wali_murid"><input class="button" type="button" value="Tambah"></a>
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
            <th class="normal">Nama Siswa</th>
            <th class="normal">Ayah / Pekerjaan</th>
            <th class="normal">Ibu / Pekerjaan</th>
            <th class="normal">Alamat</th>
            <th class="normal">No.Telp</th>
            <?php
            if ($_SESSION['type_user'] == "Admin") {
            ?>
                <th class="normal">Tools</th>
            <?php } ?>
        </tr>
    </thead>
	<tbody>
    <?php
	include "koneksi.php";

	$tampilkan_isi = "select * from siswa s,wali_murid w where s.nis=w.nis order by nama_siswa;";

	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$kode_wali = $isi['kode_wali'];
		$nama_siswa = $isi['nama_siswa'];
		$nama_ayah = $isi['nama_ayah'];
		$pekerjaan_ayah = $isi['pekerjaan_ayah'];
		$nama_ibu = $isi['nama_ibu'];
		$pekerjaan_ibu = $isi['pekerjaan_ibu'];
		$alamat_wali = $isi['alamat_wali'];
		$no_telp = $isi['no_telp'];

	?>
		<tr class="isi" align='center'>
			<td><?php echo $nama_siswa ?></td>
			<td><?php echo $nama_ayah ?> | <?php echo $pekerjaan_ayah ?></td>
			<td><?php echo $nama_ibu ?> | <?php echo $pekerjaan_ibu ?></td>
			<td><?php echo $alamat_wali ?></td>
			<td><?php echo $no_telp ?></td>
			<?php
			if ($_SESSION['type_user'] == "Admin") {
			?>
				<td>
					<form action="halaman_utama.php?aksi_wali_murid=$aksi_wali_murid" method="post">
						<input type="hidden" name="kode_wali" value="<?php echo $kode_wali; ?>">
						<input class="update" name="proses" type="submit" value="Update">
						<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data walimurid <?php echo $nama_siswa; ?> ?')">
				</td>
			<?php } ?>
		</tr>
		</form>
	<?php
	}
	?>
    </tbody>
</table>
</div>
