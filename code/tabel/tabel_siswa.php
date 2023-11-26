<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

<link type="text/css" href="development-bundle/themes/base/jquery.ui.all.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.2/jquery.min.js" integrity="sha512-poSrvjfoBHxVw5Q2awEsya5daC0p00C8SKN74aVJrs7XLeZAi+3+13ahRhHm8zdAFbI2+/SUIrKYLvGBJf9H3A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript" src="development-bundle/ui/jquery.ui.core.js"></script>

<script type="text/javascript" src="development-bundle/ui/jquery.ui.widget.js"></script>

<script type="text/javascript" src="development-bundle/ui/jquery.ui.tabs.js"></script>

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
        $("#tabs").tabs();
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
	<font color="#2133F8"> SISWA</font>
</b> <br><br>
<hr color="#2133F8" size="3px" width="100%"><br>

<form action="halaman_utama.php?tabel_siswa=$tabel_siswa" method="post">
	<table width="100%">
		<tr>
			<td>
				<?php
				if ($_SESSION['type_user'] == "Admin") {
				?>
					<a href="halaman_utama.php?formulir_siswa=$formulir_siswa"><input class="button" type="button" value="Tambah"></a>
				<?php } ?>
				<a href="code/pdf/pdf_siswa.php" target="_blank"><input class="button" type="button" value="Print"></a>

			</td>
		</tr>
	</table>
</form>

<br>
<div id="tabs">
<ul>
    <?php
		include "koneksi.php";
        $query = mysqli_query($connect, "SELECT * FROM jurusan ORDER BY kode_jurusan ASC");

        $kelas = [];
        while($data = mysqli_fetch_object($query)) :
            $kelas[] = $data->kode_jurusan;
        ?>
        <li><a href="#tabs-<?= $data->kode_jurusan ?>"><?= $data->nama_jurusan ?></a></li>
        <?php endwhile; ?>
    </ul>


<div style="font-size: 14px !important;">
<?php
    foreach ($kelas as $key => $x) { ?>
<div id="tabs-<?= $x ?>">
<table class="datatable" border="1" style="width: 100% !important;">
	<thead>
    <tr align='center'>
		<th class="normal">NIS</th>
		<th class="normal">Nama Siswa</th>
		<th class="normal">Kelas/Jurusan</th>
		<th class="normal">TTL</th>
		<th class="normal">Jenis Kelamin</th>
		<th class="normal">Agama</th>
		<th class="normal">Alamat</th>
		<?php
		if ($_SESSION['type_user'] == "Admin") {
		?>
			<th class="normal">Tools</th>
		<?php } ?>
	</tr>
    </thead>

		<tbody>
        <?php
	$tampilkan_isi = "SELECT * FROM siswa JOIN jurusan ON jurusan.kode_jurusan = siswa.kode_jurusan WHERE jurusan.kode_jurusan = '$x'";

	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$nis = $isi['nis'];
		$nama_siswa = $isi['nama_siswa'];
		$kelas = $isi['kelas'];
		$nama_jurusan = $isi['nama_jurusan'];
		$tempat_lahir = $isi['tempat_lahir'];
		$tanggal_lahir = $isi['tanggal_lahir'];
		$jenis_kelamin = $isi['jenis_kelamin'];
		$agama = $isi['agama'];
		$alamat_siswa = $isi['alamat_siswa'];

	?>
        <tr class="isi" align='center'>
			<td><?php echo $nis ?></td>
			<td><?php echo $nama_siswa ?></td>
			<td><?php echo $nama_jurusan ?></td>
			<td><?php echo $tempat_lahir ?>, <?php echo $tanggal_lahir ?></td>
			<td><?php echo $jenis_kelamin ?></td>
			<td><?php echo $agama ?></td>
			<td><?php echo $alamat_siswa ?></td>
			<?php
			if ($_SESSION['type_user'] == "Admin") {
			?>
				<td>
					<form action="halaman_utama.php?aksi_siswa=$aksi_siswa" method="post">
						<input type="hidden" name="nis" value="<?php echo $nis; ?>">
						<input class="update" name="proses" type="submit" value="Update">
						<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data siswa <?php echo $nama_siswa; ?> ?')">
                        </form>
				</td>

		</tr>
        <?php } ?>
        <?php
	}
	?>
        </tbody>

</table>
</div>
<?php } ?>
</div>
</div>
