<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#nilai_tugas, #nilai_uts, #nilai_uas').on('change keyup', function() {
            var tugas = $('#nilai_tugas').val();
            var uts = $('#nilai_uts').val();
            var uas = $('#nilai_uas').val();

            var sum = (Number(tugas) + Number(uts) + Number(uas)) / 3;

            $('#average').val(sum.toFixed(2));
        })
    })
</script>
<body>
    <?php
    include "koneksi.php";
    $aksi = strtolower($_POST['proses']);
    $kode_nilai = $_POST['kode_nilai'];

    if ($aksi == "delete") {
        $delete_nilai = "DELETE from nilai where kode_nilai='$kode_nilai'";

        $delete_nilai_query = mysqli_query($connect, $delete_nilai);

        if ($delete_nilai_query) {
            header("location:halaman_utama.php?tabel_nilai=$table_nilai");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        include "koneksi.php";

        $query = mysqli_query($connect, "SELECT * FROM nilai JOIN siswa ON siswa.nis = nilai.nis JOIN guru ON guru.kode_guru = nilai.kode_guru JOIN mata_pelajaran ON mata_pelajaran.kode_mp = nilai.kode_mp JOIN jurusan ON siswa.kode_jurusan = jurusan.kode_jurusan WHERE kode_nilai = '$kode_nilai'");
    ?>

    <br>
    <center>
        <h2>Update Data Nilai</h2>
    </center><br>

    <form action="code/proses/update-delete/update/update_nilai.php" method="POST">

        <table id="tabel-pendaftaran">
            <?php
                while ($isi = mysqli_fetch_array($query)) {
                ?>
            <tr>
                <td><b>Kode Nilai</b></td>
            </tr>

            <tr>
                <td><input type="text" name="kode_nilai" size="25px" maxlength="50" style="background-color:#E0DFDF"
                        value="<?php echo $kode_nilai ?>" readonly></td>
            </tr>

            <tr>
                <td><b>Nama / Kelas</b></td>
            </tr>

            <tr>
                <td><input type="text" name="nis" size="25px" maxlength="50" style="background-color:#E0DFDF"
                        value="<?php echo $isi['nis']; ?> | <?php echo $isi['nama_siswa']; ?> | <?php echo $isi['nama_jurusan']; ?>"
                        readonly></td>
            </tr>

            <tr>
                <td><b>Guru</b></td>
            </tr>

            <tr>
                <td><input type="text" name="kode_guru" size="25px" maxlength="50" style="background-color:#E0DFDF"
                        value="<?php echo $isi['kode_guru']; ?> | <?php echo $isi['nama_guru']; ?>" readonly></td>
            </tr>

            <tr>
                <td><b>Mata Pelajaran</b></td>
            </tr>

            <tr>
                <td><input type="text" name="kode_mp" size="25px" maxlength="15" style="background-color:#E0DFDF"
                        value="<?php echo $isi['kode_mp']; ?> | <?php echo $isi['nama_mp']; ?>" readonly></td>
            </tr>

            <tr>
		<td><b>Nilai Tugas</b></td>
	</tr>

	<tr>
		<td><input type="number" min="0" value="<?= $isi['nilai_harian'] ?>" name="nilai_tugas" id="nilai_tugas" size="25px" maxlength="5" placeholder="ketikkan nilai.." required></td>
	</tr>

    <tr>
		<td><b>Nilai UTS (Tengah Semester)</b></td>
	</tr>

	<tr>
		<td><input type="number" min="0" value="<?= $isi['nilai_uts'] ?>" name="nilai_uts" id="nilai_uts" size="25px" maxlength="5" placeholder="ketikkan nilai.." required></td>
	</tr>

    <tr>
		<td><b>Nilai UAS (Akhir Semester)</b></td>
	</tr>

	<tr>
		<td><input type="number" min="0" value="<?= $isi['nilai_uas'] ?>" name="nilai_uas" id="nilai_uas" size="25px" maxlength="5" placeholder="ketikkan nilai.." required></td>
	</tr>

    <tr>
		<td><b>Rata - Rata (Otomatis)</b></td>
	</tr>

	<tr>
		<td><input type="number" min="0" value="<?= $isi['average'] ?>" name="average" id="average" size="25px" maxlength="5" required readonly></td>
	</tr>

    <tr>
		<td>&nbsp;</td>
	</tr>

    <tr>
    <td><input class="button" type="submit" value="Update"></td>
    </tr>

            <?php } ?>
        </table>

    </form>
    <?php } ?>
