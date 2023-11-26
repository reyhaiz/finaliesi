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
    <font color="#2133F8"> STANDAR KOMPETENSI</font>
</b> <br><br>
<hr color="#2133F8" size="3px" width="100%"><br>

<br>

<div style="font-size: 14px !important;">
<table class="datatable" border="1" style="width: 100% !important;">
    <thead>
    <tr align='center'>
        <th class="normal">Kode Standar Kompetensi</th>
        <th class="normal">Mata Pelajaran</th>
        <th class="normal">Nama Standar Kompetensi</th>
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
	$informasi = $_SESSION['kode_guru'];

	$tampilkan_isi = "select distinct sk.kode_sk,mp.kode_mp,mp.nama_mp,sk.nama_sk,sk.kelas_sk from login l,standar_kompetensi sk,mata_pelajaran mp,guru g
where g.kode_guru='$informasi' and g.kode_mp=mp.kode_mp and sk.kode_mp=mp.kode_mp;";

	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array ($tampilkan_isi_sql)) {
		$kode_sk = $isi['kode_sk'];
		$kode_mp = $isi['kode_mp'];
		$nama_mp = $isi['nama_mp'];
		$nama_sk = $isi['nama_sk'];
		$kelas_sk = $isi['kelas_sk'];

	?>
    <tr class="isi" align='center'>
        <td><?php echo $kode_sk ?></td>
        <td><?php echo $nama_mp ?></td>
        <td><?php echo $nama_sk ?></td>
        <?php
			if ($_SESSION['type_user'] == "Admin") {
			?>
        <td>
            <form action="halaman_utama.php?aksi_standar_kompetensi=$aksi_kompetensi" method="post">
                <input type="hidden" name="kode_sk" value="<?php echo $kode_sk; ?>">
                <input class="update" name="proses" type="submit" value="Update">
                <input class="delete" name="proses" type="submit" value="Delete"
                    onClick="return confirm('Apakah Anda ingin menghapus standar kompetensi <?php echo $nama_sk; ?> ?')">
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
