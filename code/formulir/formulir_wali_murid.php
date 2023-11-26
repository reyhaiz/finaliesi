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
    })
</script>
<br>
<center>
    <h2>Tambah Data Wali Murid</h2>
</center><br><br>
<hr><br>

<form action="code/proses/input/input_wali_murid.php" method="POST">

    <table id="tabel-pendaftaran">
        <tr>
            <td><b>Kode Wali</b></td>
        </tr>
        <tr>
            <td><?php include "koneksi.php";
                $tampilkan_isi = "select count(kode_wali) as jumlah from wali_murid;";
                $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
                $no = 1;

                while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                    $jumlah = $isi['jumlah'];
                ?><input type="text" name='kode_wali' size="25px" maxlength="6" style="background-color:#E0DFDF" value="WA-<?php echo $no + $jumlah ?>" readonly></td>
        </tr>
    <?php
                } ?>

    <tr>
        <td><b>Siswa dari</b></td>
    </tr>
    <tr>
        <td><select name="nis" class="select2" required>
                <option value="" selected>Pilih Siswa</option>
                <?php include "koneksi.php";
                $tampilkan_isi = "select s.nis,nama_siswa from siswa s left outer join wali_murid w ON s.nis = w.nis WHERE w.kode_wali is NULL;";
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
        <td><b>Nama Ayah</b></td>
    </tr>
    <tr>
        <td><input type="text" name="nama_ayah" size="25px" maxlength="50" placeholder="ketikkan nama ayah.." required></td>
    </tr>

    <tr>
        <td><b>Pekerjaan Ayah</b></td>
    </tr>
    <tr>
        <td><input type="text" name="pekerjaan_ayah" size="25px" maxlength="15" placeholder="ketikkan pekerjaan ayah.." required></td>
    </tr>

    <tr>
        <td><b>Nama Ibu</b></td>
    </tr>
    <tr>
        <td><input type="text" name="nama_ibu" size="25px" maxlength="50" placeholder="ketikkan nama ibu.." required></td>
    </tr>

    <tr>
        <td><b>Pekerjaan Ibu</b></td>
    </tr>
    <tr>
        <td><input type="text" name="pekerjaan_ibu" size="25px" maxlength="15" placeholder="ketikkan pekerjaan ibu.." required></td>
    </tr>

    <tr>
        <td><b>Alamat Wali</b></td>
    </tr>
    <tr>
        <td><textarea name="alamat_wali" cols="28" rows="5" maxlength="50" placeholder="ketikkan alamat wali.." required></textarea></td>
    </tr>

    <tr>
        <td><b>No.Telepon</b></td>
    </tr>
    <tr>
        <td><input type="text" name="no_telp" size="25px" maxlength="13" placeholder="ketikkan no.telepon.." required>&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Simpan"></td>
    </tr>

    </table>

</form>
