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
            $id_produk  = mysqli_real_escape_string($mysqli, trim($_POST['id_produk']));
            $nama_produk  = mysqli_real_escape_string($mysqli, trim($_POST['nama_produk']));
            $harga_jual  = mysqli_real_escape_string($mysqli, trim($_POST['harga_jual']));
            $kategori  = mysqli_real_escape_string($mysqli, trim($_POST['kategori']));
            $deskripsi  = mysqli_real_escape_string($mysqli, trim($_POST['deskripsi']));
            $foto = $_FILES['foto']['name'];
            $tmp = $_FILES['foto']['tmp_name'];
            // Rename nama filenya dengan menambahkan tanggal dan jam upload
            $fotobaru = date('dmYHis') . $foto;
            // Set path folder tempat menyimpan filenya
            $path = "../../images/" . $fotobaru;
            if (move_uploaded_file($tmp, $path)) {
                $query = mysqli_query($mysqli, "INSERT INTO produk(id_produk,nama_produk,harga_jual,deskripsi,gambar,kategori)
                    VALUES ('$id_produk','$nama_produk','$harga_jual','$deskripsi','$fotobaru','$kategori')")
                    or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=produk&alert=1");
                }
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['nama_produk'])) {
                // ambil data hasil submit dari form
                $id_produk  = mysqli_real_escape_string($mysqli, trim($_POST['id_produk']));
                $nama_produk  = mysqli_real_escape_string($mysqli, trim($_POST['nama_produk']));
                $harga_jual  = mysqli_real_escape_string($mysqli, trim($_POST['harga_jual']));
                $kategori  = mysqli_real_escape_string($mysqli, trim($_POST['kategori']));
                $deskripsi  = mysqli_real_escape_string($mysqli, trim($_POST['deskripsi']));
                $foto = $_FILES['foto']['name'];
                $tmp = $_FILES['foto']['tmp_name'];
                // Rename nama filenya dengan menambahkan tanggal dan jam upload
                $fotobaru = date('dmYHis') . $foto;
                // Set path folder tempat menyimpan filenya
                $path = "../../images/" . $fotobaru;
                if (!empty($foto)) {
                    if (move_uploaded_file($tmp, $path)) {
                        $query = mysqli_query($mysqli, "UPDATE produk SET  nama_produk   = '$nama_produk',
                                                                    harga_jual       = '$harga_jual',
                                                                    gambar = '$fotobaru',
                                                                    kategori = '$kategori',
                                                                    deskripsi       = '$deskripsi'
                                                              WHERE id_produk       = '$id_produk'")
                            or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));
                    }
                } else {
                    $query = mysqli_query($mysqli, "UPDATE produk SET  nama_produk   = '$nama_produk',
                        harga_jual      = '$harga_jual',
                        kategori = '$kategori',
                        deskripsi       = '$deskripsi'
                  WHERE id_produk       = '$id_produk'")
                        or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));
                }
                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=produk&alert=2");
                }
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id'])) {
            $nama_produk = $_GET['id'];
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM produk WHERE id_produk='$nama_produk'")
                or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));
            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=produk&alert=3");
            }
        }
    }
}
