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
        $id_spk  = mysqli_real_escape_string($mysqli, trim($_POST['id_spk']));
        if (isset($_POST['simpan'])) {
            // jika berhasil tampilkan pesan berhasil simpan data
            if ($_GET['form'] = 'form_edit') {
                header("location: ../../main.php?module=spk_cabang_baru_detail&id_spk=$id_spk&form=form_edit");
            } else {
                header("location: ../../main.php?module=spk_cabang_baru_detail&id_spk=$id_spk");
            }
        } else if (isset($_POST['tambah'])) {
            var_dump($_POST);
            $nama_kota  = mysqli_real_escape_string($mysqli, trim($_POST['nama_kota']));
            $alamat  = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
            $luas_tanah  = mysqli_real_escape_string($mysqli, trim($_POST['luas_tanah']));
            $lks_dkt_pdk  = mysqli_real_escape_string($mysqli, trim($_POST['lks_dkt_pdk']));
            $lks_dkt_plg_lama  = mysqli_real_escape_string($mysqli, trim($_POST['lks_dkt_plg_lama']));
            $lks_dkt_cbg  = mysqli_real_escape_string($mysqli, trim($_POST['lks_dkt_cbg']));
            $lahan_parkir = mysqli_real_escape_string($mysqli, trim($_POST['lahan_parkir']));
            $harga_sewa  = mysqli_real_escape_string($mysqli, trim($_POST['harga_sewa']));
            echo "INSERT INTO spk_cabang_baru_jawaban(nama_kota,alamat,luas_tanah,lks_dkt_pdk,lks_dkt_plg_lama,lks_dkt_cbg,lahan_parkir,harga_sewa,status)
            VALUES ('$nama_kota','$alamat','$alamat','$luas_tanah','$lks_dkt_pdk','$lks_dkt_plg_lama','$lks_dkt_cbg','$lahan_parkir','$harga_sewa','Add";
            if ($_GET['form'] = 'form_edit') {
                $query = mysqli_query($mysqli, "INSERT INTO spk_cabang_baru_jawaban(nama_kota,alamat,luas_tanah,lks_dkt_pdk,lks_dkt_plg_lama,lks_dkt_cbg,lahan_parkir,harga_sewa,status,id_spk_cabang_baru)
                VALUES ('$nama_kota','$alamat','$luas_tanah','$lks_dkt_pdk','$lks_dkt_plg_lama','$lks_dkt_cbg','$lahan_parkir','$harga_sewa','Edit','$id_spk')")
                    or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=form_spk_cabang_baru&form=edit&id=$id_spk");
                }
            } else {
                $query = mysqli_query($mysqli, "INSERT INTO spk_cabang_baru_jawaban(nama_kota,alamat,luas_tanah,lks_dkt_pdk,lks_dkt_plg_lama,lks_dkt_cbg,lahan_parkir,harga_sewa,status)
                VALUES ('$nama_kota','$alamat','$luas_tanah','$lks_dkt_pdk','$lks_dkt_plg_lama','$lks_dkt_cbg','$lahan_parkir','$harga_sewa','Add')")
                    or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=form_spk_cabang_baru&form=add");
                }
            }
        } else if (isset($_POST['update'])) {
            var_dump($_POST);
            $query = mysqli_query($mysqli, "SELECT * FROM spk_cabang_baru,spk_cabang_baru_jawaban where spk_cabang_baru.id_spk_cabang_baru = spk_cabang_baru_jawaban.id_spk_cabang_baru and spk_cabang_baru.id_spk_cabang_baru='$id_spk'") or die('Ada kesalahan pada query tampil Data produk: ' . mysqli_error($mysqli));
            while ($data = mysqli_fetch_assoc($query)) {
                $nama_kota = $_POST['nama_kota_' . $data['id_jawaban']];
                $alamat = $_POST['alamat_' . $data['id_jawaban']];
                $luas_tanah = $_POST['luas_tanah_' . $data['id_jawaban']];
                $lks_dkt_pdk = $_POST['lks_dkt_pdk_' . $data['id_jawaban']];
                $lks_dkt_plg_lama = $_POST['lks_dkt_plg_lama_' . $data['id_jawaban']];
                $lks_dkt_cbg = $_POST['lks_dkt_cbg_' . $data['id_jawaban']];
                $lahan_parkir = $_POST['lahan_parkir_' . $data['id_jawaban']];
                $harga_sewa = $_POST['harga_sewa_' . $data['id_jawaban']];
                echo "<br>UPDATE spk_cabang_baru_jawaban SET nama_kota='$nama_kota', alamat = '$alamat', luas_tanah = '$luas_tanah', lks_dkt_pdk = '$lks_dkt_pdk', lks_dkt_plg_lama = '$lks_dkt_plg_lama', lks_dkt_cbg = '$lks_dkt_cbg', lahan_parkir = '$lahan_parkir', harga_sewa = '$harga_sewa' WHERE id_jawaban = '$data[id_jawaban]'";
                $query_2 = mysqli_query($mysqli, "UPDATE spk_cabang_baru_jawaban SET nama_kota='$nama_kota', alamat = '$alamat', luas_tanah = '$luas_tanah', lks_dkt_pdk = '$lks_dkt_pdk', lks_dkt_plg_lama = '$lks_dkt_plg_lama', lks_dkt_cbg = '$lks_dkt_cbg', lahan_parkir = '$lahan_parkir', harga_sewa = '$harga_sewa' WHERE id_jawaban = '$data[id_jawaban]'")
                    or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));
                if ($_GET['form'] = 'form_edit') {
                    if ($query_2) {
                        // jika berhasil tampilkan pesan berhasil simpan data
                        header("location: ../../main.php?module=form_spk_cabang_baru&form=edit&id=$id_spk");
                    }
                } else {
                    if ($query_2) {
                        // jika berhasil tampilkan pesan berhasil delete data
                        header("location: ../../main.php?module=form_spk_cabang_baru&form=add");
                    }
                }
            }
        }
    } else if ($_GET['act'] == 'konfirmasi') {
        var_dump($_POST);
        $id_spk  = mysqli_real_escape_string($mysqli, trim($_POST['id_spk']));
        $tanggal  = mysqli_real_escape_string($mysqli, trim($_POST['tanggal']));
        if (isset($_POST['simpan_edit'])) {
            $query = mysqli_query($mysqli, "SELECT * FROM spk_cabang_baru_jawaban where id_spk_cabang_baru = '$id_spk' ") or die('Ada kesalahan pada query tampil Data transaksi: ' . mysqli_error($mysqli));
            while ($data = mysqli_fetch_assoc($query)) {
                $hasil_keputusan  = mysqli_real_escape_string($mysqli, trim($_POST['hasil_keputusan_' . $data['id_jawaban']]));
                echo "UPDATE spk_cabang_baru_jawaban SET id_spk_cabang_baru  = '$id_spk', status = 'Proses', nilai='$hasil_keputusan' WHERE id_jawaban = '$data[id_jawaban]'";
                $query_2 = mysqli_query($mysqli, "UPDATE spk_cabang_baru_jawaban SET id_spk_cabang_baru  = '$id_spk', status = 'Proses', nilai='$hasil_keputusan' WHERE id_jawaban = '$data[id_jawaban]'") or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));
                // cek query
                if ($query_2) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=spk_cabang_baru");
                }
            }
        } else {
            $query = mysqli_query($mysqli, "INSERT INTO spk_cabang_baru(id_spk_cabang_baru ,tanggal)
            VALUES ('$id_spk','$tanggal')")
                or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
            $query = mysqli_query($mysqli, "SELECT * FROM spk_cabang_baru_jawaban where status = 'Add' ") or die('Ada kesalahan pada query tampil Data transaksi: ' . mysqli_error($mysqli));
            while ($data = mysqli_fetch_assoc($query)) {
                $hasil_keputusan  = mysqli_real_escape_string($mysqli, trim($_POST['hasil_keputusan_' . $data['id_jawaban']]));
                echo "UPDATE spk_cabang_baru_jawaban SET id_spk_cabang_baru  = '$id_spk', status = 'Proses', nilai='$hasil_keputusan' WHERE id_jawaban = '$data[id_jawaban]'";
                $query_2 = mysqli_query($mysqli, "UPDATE spk_cabang_baru_jawaban SET id_spk_cabang_baru  = '$id_spk', status = 'Proses', nilai='$hasil_keputusan' WHERE id_jawaban = '$data[id_jawaban]'") or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));
                // cek query
                if ($query_2) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=spk_cabang_baru");
                }
            }
        }
    } else if ($_GET['act'] == 'delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM spk_cabang_baru_jawaban WHERE id_jawaban='$id'")
                or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));
            // cek hasil query
            if ($_GET['form'] = 'form_edit') {
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=form_spk_cabang_baru&form=edit&id=$id_spk");
                }
            } else {
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil delete data
                    header("location: ../../main.php?module=form_spk_cabang_baru&form=add");
                }
            }
        }
    }
}
