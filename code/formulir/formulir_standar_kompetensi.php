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
    <h2>Tambah Data Standar Kompetensi</h2>
</center><br><br>
<hr><br>

<form action="code/proses/input/input_standar_kompetensi.php" method="POST">

    <table id="tabel-pendaftaran">
        <tr>
            <td><b>Kode Standar Kompetensi</b></td>
        </tr>
        <tr>
            <td><?php include "koneksi.php";
                $tampilkan_isi = "select count(kode_sk) as jumlah from standar_kompetensi;";
                $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
                $no = 1;

                while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                    $jumlah = $isi['jumlah'];
                ?><input type="text" name='kode_sk' size="25px" maxlength="6" style="background-color:#E0DFDF"
                    value="SK-<?php echo $no + $jumlah ?>" readonly></td>
        </tr>
        <?php
                } ?>

        <tr>
            <td><b>Mata Pelajaran</b></td>
        </tr>
        <tr>
            <td><select name="kode_mp" class="select2" required>
                    <option value="" selected>Pilih Mata Pelajaran</option>
                    <?php include "koneksi.php";
                $tampilkan_isi = "select * from `mata_pelajaran`";
                $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

                while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                    $kode_mp = $isi['kode_mp'];
                    $nama_mp = $isi['nama_mp'];
                ?>
                    <option value="<?php echo $kode_mp ?>"><?php echo $kode_mp ?> | <?php echo $nama_mp ?>
                        <?php
                }
                    ?>
                    </option>
            </td>
        </tr>

        <td><b>Nama Standar Kompetensi</b></td>
        </tr>
        <tr>
            <td><input type="text" name="nama_sk" size="25px" maxlength="50"
                    placeholder="ketikkan nama standar kompetensi.." required></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;<input class="button" type="submit" value="Simpan"></td>

        </tr>

    </table>

</form>
