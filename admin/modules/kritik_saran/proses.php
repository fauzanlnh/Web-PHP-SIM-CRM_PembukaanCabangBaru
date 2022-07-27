<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['id_kritik_saran'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=4'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act'] == 'penanganan') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $id_kritik_saran  = mysqli_real_escape_string($mysqli, trim($_POST['id_kritik_saran']));
            $penanganan  = mysqli_real_escape_string($mysqli, trim($_POST['penanganan']));
            $query = mysqli_query($mysqli, "UPDATE kritik_saran SET  penanganan   = '$penanganan'
            WHERE id_kritik_saran       = '$id_kritik_saran'")
                or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));
            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=kritik_saran&alert=1");
            }
        }
    }
}
