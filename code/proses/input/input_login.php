<?php
include "../../../koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$type_user = "Admin";

$insertLogin = "INSERT INTO login values (NULL, '$username','$password','$type_user')";

$insertLogin_query = mysqli_query($connect,$insertLogin);

if ($insertLogin_query)
{
	header('location:../../../halaman_utama.php?tabel_login=$tabel_login');
}
else
{
	echo "Insert gagal dijalankan";
}

?>
