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
	<font color="#2133F8"> AKUN LOGIN</font>
</b> <br><br>
<hr color="#2133F8" size="3px" width="100%"><br>

<form action="halaman_utama.php?tabel_login=$tabel_login" method="post">
	<table width="100%">
		<tr>
			<td>
				<a href="halaman_utama.php?formulir_login=$formulir_login"><input class="button" type="button" value="Tambah"></a>
			</td>

		</tr>
	</table>
</form>

<br>
<div style="font-size: 14px !important;">
<table class="datatable" border="1" style="width: 100% !important;">
	<thead>
    <tr align='center'>
		<th class="normal">Username</th>
		<th class="normal">Password</th>
		<th class="normal">Type User</th>
		<th class="normal">Tools</th>
	</tr>
    </thead>

    <tbody>
    <?php
	include "koneksi.php";

	$tampilkan_isi = "select * from login";

	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$username = $isi['username'];
		$password = $isi['password'];
		$type_user = $isi['type_user'];

	?>
		<tr class="isi" align='center'>
			<td><?php echo $username ?></td>
			<td><?php echo $password ?></td>
			<td><?php echo $type_user ?></td>
			<td>
				<?php if($type_user != 'Admin') { ?>
                    -
                <?php } else { ?>
                <form action="halaman_utama.php?aksi_login=$aksi_login" method="post">
					<input type="hidden" name="username" value="<?php echo $username; ?>">
					<input class="update" name="proses" type="submit" value="Update">
					<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus akun login <?php echo $username; ?> ?')">
                </form>
                <?php } ?>
			</td>
		</tr>

	<?php
	}
	?>
    </tbody>
</table>
</div>
