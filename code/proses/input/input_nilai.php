<?php
include "../../../koneksi.php";
$kode_nilai = $_POST['kode_nilai'];
$nis = $_POST['nis'];
$kode_guru = $_POST['kode_guru'];
$kode_mp = $_POST['kode_mp'];
$nilai_tugas = $_POST['nilai_tugas'];
$nilai_uts = $_POST['nilai_uts'];
$nilai_uas = $_POST['nilai_uas'];
$average = $_POST['average'];

// cek apakah data duplikat?
$search = mysqli_query($connect, "SELECT * FROM nilai WHERE nis = '$nis' AND kode_mp = '$kode_mp'");
$searchNum = mysqli_num_rows($search);

// jika ada 1 maka tolak
if($searchNum > 0) {
    echo "<script>alert('Data Nilai sudah ada & tidak boleh duplikat. Periksa inputan anda kembali');window.history.back();</script>";
    return false;
}

$insertNilai = "INSERT INTO nilai values ('$kode_nilai','$nis','$kode_guru','$kode_mp', '$nilai_tugas', '$nilai_uts', '$nilai_uas', '$average')";

$insertNilai_query = mysqli_query($connect,$insertNilai);

if ($insertNilai_query)
{
	header('location:../../../halaman_utama.php?tabel_nilai=$tabel_nilai');
}
else
{
	echo $insertNilai;
}

?>
