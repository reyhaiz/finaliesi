<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

<b>
    <font color="#2133F8"> NILAI</font>
</b> <br><br>
<hr color="#2133F8" size="3px" width="100%"><br>
<?php
if ($_SESSION['type_user'] == "Admin") {
?>
<a href="halaman_utama.php?formulir_nilai=$formulir_nilai"><input class="button" type="button"
        value="Tambah"></a><br><br>
<?php } else if ($_SESSION['type_user'] == "Guru") { ?>
<a href="halaman_utama.php?formulir_nilai_untuk_guru=$formulir_nilai_untuk_guru"><input class="button" type="button"
        value="Tambah"></a><br><br>
<?php } ?>

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
    foreach ($kelas as $key => $x) {
        $tampilkan_isi = "SELECT * FROM nilai JOIN siswa ON siswa.nis = nilai.nis JOIN guru ON guru.kode_guru = nilai.kode_guru JOIN mata_pelajaran ON mata_pelajaran.kode_mp = nilai.kode_mp JOIN jurusan ON siswa.kode_jurusan = jurusan.kode_jurusan WHERE jurusan.kode_jurusan = '$x'";
     ?>
    <div id="tabs-<?= $x ?>">
        <br>

        <table class="datatable" border="1" style="width: 100% !important;">
            <thead>
            <tr align='center'>
                <th class="normal">Nama </th>
                <th class="normal">Nama Guru</th>
                <th class="normal">Mata Pelajaran</th>
                <th class="normal">Nilai Harian</th>
                <th class="normal">Nilai UTS</th>
                <th class="normal">Nilai UAS</th>
                <th class="normal">Rata-rata</th>
                <th class="normal">Nilai Huruf</th>
                <?php
				if ($_SESSION['type_user'] == "Admin") {
				?>
                <th class="normal">Tools</th>
                <?php } ?>
            </tr>
            </thead>

            <tbody>
            <?php

			$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

			while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
				$kode_nilai = $isi['kode_nilai'];
				$nama_siswa = $isi['nama_siswa'];
				$nama_guru = $isi['nama_guru'];
				$nama_mp = $isi['nama_mp'];
                $nilai_harian = $isi['nilai_harian'];
                $nilai_uts = $isi['nilai_uts'];
                $nilai_uas = $isi['nilai_uas'];
				$angka_nilai = $isi['average'];

			?>
            <tr align='center'>
                <td><?php echo $nama_siswa ?>
                <td><?php echo $nama_guru ?></td>
                <td><?php echo $nama_mp ?></td>
                <td><?php echo $nilai_harian ?></td>
                <td><?php echo $nilai_uts ?></td>
                <td><?php echo $nilai_uas ?></td>
                <td>
                    <?php
						if ($angka_nilai <= 75) {
							echo "<b><font color='red'>" . $angka_nilai . "</b></font>";
						} else {
							echo $angka_nilai;
						}
						?>
                </td>
                <td>
                    <?php
						if ($angka_nilai >= 101) {
							echo "Angka melebihi kriteria penilaian";
						} else if ($angka_nilai >= 96 and $angka_nilai <= 100) {
							echo "A";
						} else if ($angka_nilai >= 91 and $angka_nilai <= 95) {
							echo "A-";
						} else if ($angka_nilai >= 86 and $angka_nilai <= 90) {
							echo "B+";
						} else if ($angka_nilai >= 80 and $angka_nilai <= 85) {
							echo "B";
						} else if ($angka_nilai >= 76 and $angka_nilai <= 80) {
							echo "B-";
						} else if ($angka_nilai >= 71 and $angka_nilai <= 75) {
							echo "<b><font color='red'>C+</b></font>";
						} else if ($angka_nilai >= 66 and $angka_nilai <= 70) {
							echo "<b><font color='red'>C</font></b>";
						} else if ($angka_nilai >= 61 and $angka_nilai <= 65) {
							echo "<b><font color='red'>C-</font></b>";
						} else if ($angka_nilai >= 0 and $angka_nilai <= 60) {
							echo "<b><font color='red'>D</font></b>";
						}
						?>
                </td>
                <?php
					if ($_SESSION['type_user'] == "Admin") {
					?>
                <td>
                    <form action="halaman_utama.php?aksi_nilai=$aksi_nilai" method="post">
                        <input type="hidden" name="kode_nilai" value="<?php echo $kode_nilai; ?>">
                        <input class="update" name="proses" type="submit" value="Update" style="font-size:15px;">
                        <input class="delete" name="proses" type="submit" value="Delete" style="font-size:15px;"
                            onClick="return confirm('Apakah Anda ingin menghapus data nilai <?php echo $kode_nilai; ?> ?')">
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
    <?php } ?>
    </div>
        </table>
    </div>

    </body>

    </html>
