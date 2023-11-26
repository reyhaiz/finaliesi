<?php
include "../../../koneksi.php";
$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa'];
$kelas = 0;
$kode_jurusan = $_POST['kode_jurusan'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat_siswa = $_POST['alamat_siswa'];

function explodeString($string, $delimiter) {
    return explode($delimiter, $string);
}

function generateAngka($min, $max) {
    return rand($min, $max);
}

function generatePassword() {
    $pin = mt_rand(10000, 99999);
    return $pin;
}

$pecahnama = explodeString($nama_siswa, ' ');
$namadepan = strtolower($pecahnama[0]) . generateAngka(1, 500);
$password = generatePassword();
$type = 'Siswa';

$insertLogin = "INSERT INTO login values(NULL, '$namadepan','$password','$type')";
$insertLogin_query = mysqli_query($connect, $insertLogin);

// dapatkan id login terbaru
$idBaru = mysqli_insert_id($connect);

$insertSiswa = "INSERT INTO siswa values ('$nis', '$idBaru','$nama_siswa','$kelas','$kode_jurusan','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$alamat_siswa')";

$insertSiswa_query = mysqli_query($connect,$insertSiswa);

if ($insertSiswa_query)
{
	header('location:../../../halaman_utama.php?tabel_siswa=$tabel_siswa');
}
else
{
	die("Error: " . mysqli_error($connect));
	echo "Insert gagal dijalankan";
}

?>
