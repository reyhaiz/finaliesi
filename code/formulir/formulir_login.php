<script type="text/javascript">
    function validasi_input(form) {
        if (form.password.value !== form.cpassword.value) {
            alert("Konfirmasi Password harus sama dengan password sebelumnya!");
            form.cpassword.focus();
            return (false);
        }
        return (true);
    }
</script>

<br>
<center>
    <h2>Tambah Data Akun Login</h2>
</center><br><br>
<hr><br>

<form action="code/proses/input/input_login.php" method="POST" onsubmit="return validasi_input(this)">

    <table id="tabel-pendaftaran">
        <tr>
            <td><b>Username</b></td>
        </tr>

        <tr>
            <td><input type="text" name="username" size="25px" maxlength="20" placeholder="ketikkan username.." required></td>
        </tr>

        <tr>
            <td><b>Password</b></td>
        </tr>

        <tr>
            <td><input type="password" name="password" size="25px" maxlength="20" placeholder="ketikkan password.." required></td>
        </tr>

        <tr>
            <td><b>Type User</b></td>
        </tr>

        <tr>
            <td>
                <select name="type_user" required readonly>
                    <option value="">Pilih Type User</option>
                    <option value="Admin" selected>Admin</option>
                </select>&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Simpan">
            </td>
        </tr>

    </table>

</form>
