<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['id_pelanggan'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=4'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act'] == 'insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $id_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['id_pelanggan']));
            $nama_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['nama_pelanggan']));
            $alamat_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['alamat_pelanggan']));
            $query = mysqli_query($mysqli, "INSERT INTO pelanggan(id_pelanggan,nama_pelanggan,alamat_pelanggan)
            VALUES ('$id_pelanggan','$nama_pelanggan','$alamat_pelanggan')")
                or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=pelanggan&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['nama_pelanggan'])) {
                // ambil data hasil submit dari form
                $id_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['id_pelanggan']));
                $nama_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['nama_pelanggan']));
                $alamat_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['alamat_pelanggan']));
                $query = mysqli_query($mysqli, "UPDATE pelanggan SET  nama_pelanggan   = '$nama_pelanggan',
                                                                    alamat_pelanggan       = '$alamat_pelanggan'
                                                              WHERE id_pelanggan       = '$id_pelanggan'")
                    or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));
            }
            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil update data
                header("location: ../../main.php?module=pelanggan&alert=2");
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id'])) {
            $nama_pelanggan = $_GET['id'];
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM pelanggan WHERE id_pelanggan='$nama_pelanggan'")
                or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));
            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=pelanggan&alert=3");
            }
        }
    }
}
