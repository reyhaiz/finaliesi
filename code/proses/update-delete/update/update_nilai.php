<?php
include "../../../../koneksi.php";
$kode_nilai = $_POST['kode_nilai'];
$nis = $_POST['nis'];
$kode_guru = $_POST['kode_guru'];
$kode_mp = $_POST['kode_mp'];
$nilai_tugas = $_POST['nilai_tugas'];
$nilai_uts = $_POST['nilai_uts'];
$nilai_uas = $_POST['nilai_uas'];
$average = $_POST['average'];

$updateNilai = "UPDATE nilai SET nilai_harian = '$nilai_tugas', nilai_uts = '$nilai_uts', nilai_uas = '$nilai_uas', average='$average' WHERE kode_nilai='$kode_nilai'";

$updateNilai_query = mysqli_query($connect,$updateNilai);

if ($updateNilai_query)
{
	header('location:../../../../halaman_utama.php?tabel_nilai=$tabel_nilai');
}
else
{
	echo "Update gagal dijalankan";
}

?>
