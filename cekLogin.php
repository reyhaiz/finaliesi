<?php
	include "koneksi.php";
	$username=$_POST['username']; // simpan data username dari form ke variabel
	$password=$_POST['password']; // simpan data password dari form ke variabel
	$login=
	"
	SELECT * FROM login where username='$username' AND BINARY password='$password'";

	$login_query=mysqli_query($connect,$login);
	$data=mysqli_fetch_array($login_query);

	if($data)
	{
        session_start();
        if($data['type_user'] == 'Guru') {
            $id = $data['id'];
            $datas = mysqli_query($connect, "SELECT * FROM guru WHERE kode_login = '$id'");
            $fetch = mysqli_fetch_array($datas);
            $_SESSION['kode_guru'] = $fetch['kode_guru'];
            $_SESSION['nama_guru'] = $fetch['nama_guru'];
        }

        if($data['type_user'] == 'Siswa') {
            $id = $data['id'];
            $datas = mysqli_query($connect, "SELECT * FROM siswa WHERE kode_login = '$id'");
            $fetch = mysqli_fetch_array($datas);
            $_SESSION['nis'] = $fetch['nis'];
		    $_SESSION['nama_siswa'] = $fetch['nama_siswa'];
        }

		$_SESSION['username'] = $data['username'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['type_user'] = $data['type_user'];
		header('location:halaman_utama.php?home=');
	}
	else
	{
		echo "
		<script type='text/javascript'>
		alert('Username atau Password anda salah!')
		window.location='index.php';
		</script>";
	}
