<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
.select2-results__option {
    color: black !important;
}
.select2-selection__rendered {
    line-height: 32px !important;
    color: black !important;
}
.select2-container .select2-selection--single {
    height: 38px !important;
}
.select2-selection__arrow {
    height: 35px !important;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();

        $('#nilai_tugas, #nilai_uts, #nilai_uas').on('change keyup', function() {
            var tugas = $('#nilai_tugas').val();
            var uts = $('#nilai_uts').val();
            var uas = $('#nilai_uas').val();

            var sum = (Number(tugas) + Number(uts) + Number(uas)) / 3;

            $('#average').val(sum.toFixed(2));
        })
    })
</script>
<br>
<center>
	<h2>Tambah Data Nilai</h2>
</center><br><br>
<hr><br>

<form action="code/proses/input/input_nilai.php" method="POST">

	<table id="tabel-pendaftaran">
		<tr>
			<td><b>Kode Nilai</b></td>
		</tr>

		<tr>
			<td>

				<?php include "koneksi.php";
				$tampilkan_isi = "select count(kode_nilai) as jumlah from nilai;";
				$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
				$no = 1;

				while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
					$jumlah = $isi['jumlah'];
				?>
					<input type="text" name='kode_nilai' size="25px" maxlength="6" style="background-color:#E0DFDF" value="NI-<?php echo $no + $jumlah ?>" readonly>

			</td>
		</tr>
	<?php
				} ?>

	<tr>
		<td><b>Siswa</b></td>
	</tr>

	<tr>
		<td>
			<select name="nis" class="select2" required>
				<option value="" selected>Pilih Siswa</option>

				<?php include "koneksi.php";

				$tampilkan_isi = "select * from `siswa`";
				$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

				while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
					$nis = $isi['nis'];
					$nama_siswa = $isi['nama_siswa'];
				?>
					<option value="<?php echo $nis ?>"><?php echo $nis ?> | <?php echo $nama_siswa ?>
					<?php
				}
					?>
					</option>
		</td>
	</tr>

	<tr>
		<td><b>Guru</b></td>
	</tr>

	<tr>
		<td>
			<select name="kode_guru" class="select2" required>
				<option value="" selected>Pilih Guru</option>

				<?php
				include "koneksi.php";
				$tampilkan_isi = "select * from `guru`";
				$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

				while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
					$kode_guru = $isi['kode_guru'];
					$nama_guru = $isi['nama_guru'];
				?>
					<option value="<?php echo $kode_guru ?>"><?php echo $kode_guru ?> | <?php echo $nama_guru ?>
					<?php
				}
					?>
					</option>
		</td>
	</tr>

	<tr>
		<td><b>Mata Pelajaran</b></td>
	</tr>

	<tr>
		<td>
			<select name="kode_mp" class="select2" required>
				<option value="" disabled selected>Pilih Mata Pelajaran</option>
				<?php include "koneksi.php";
				$tampilkan_isi = "select * from mata_pelajaran; ";
				$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

				while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
					$kode_mp = $isi['kode_mp'];
					$nama_mp = $isi['nama_mp'];
				?>
					<option value="<?php echo $kode_mp ?>"><?php echo $kode_mp ?> | <?php echo $nama_mp ?> - <?php echo $nama_mp ?>
					<?php
				}
					?>
					</option>
		</td>
	</tr>

	<tr>
		<td><b>Nilai Tugas</b></td>
	</tr>

	<tr>
		<td><input type="number" min="0" name="nilai_tugas" id="nilai_tugas" size="25px" maxlength="5" placeholder="ketikkan nilai.." required></td>
	</tr>

    <tr>
		<td><b>Nilai UTS (Tengah Semester)</b></td>
	</tr>

	<tr>
		<td><input type="number" min="0" name="nilai_uts" id="nilai_uts" size="25px" maxlength="5" placeholder="ketikkan nilai.." required></td>
	</tr>

    <tr>
		<td><b>Nilai UAS (Akhir Semester)</b></td>
	</tr>

	<tr>
		<td><input type="number" min="0" name="nilai_uas" id="nilai_uas" size="25px" maxlength="5" placeholder="ketikkan nilai.." required></td>
	</tr>

    <tr>
		<td><b>Rata - Rata (Otomatis)</b></td>
	</tr>

	<tr>
		<td><input type="number" min="0" name="average" id="average" size="25px" maxlength="5" value="0" required readonly></td>
	</tr>

    <tr>
		<td>&nbsp;</td>
	</tr>

    <tr>
    <td><input class="button" type="submit" value="Simpan"></td>
    </tr>

	</table>

</form>
