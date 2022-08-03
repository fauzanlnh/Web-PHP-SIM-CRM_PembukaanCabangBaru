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
        $id_transaksi  = mysqli_real_escape_string($mysqli, trim($_POST['id_transaksi']));
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $id_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['id_pelanggan']));
            $tanggal_transaksi  = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_transaksi']));
            // cek query

            header("location: ../../main.php?module=transaksi_detail&id_transaksi=$id_transaksi&id_pelanggan=$id_pelanggan");
        } else if (isset($_POST['tambah'])) {
            var_dump($_POST);
            $id_produk  = mysqli_real_escape_string($mysqli, trim($_POST['id_produk']));
            $qty  = mysqli_real_escape_string($mysqli, trim($_POST['qty']));
            $query = mysqli_query($mysqli, "SELECT * FROM produk where id_produk = '$id_produk'") or die('Ada kesalahan pada query tampil Data produk: ' . mysqli_error($mysqli));
            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            $harga_produk = $data['harga_jual'];
            $subtotal = $harga_produk * $qty;
            $query = mysqli_query($mysqli, "INSERT INTO transaksi_detail(id_produk,harga_produk,qty,subtotal_detail,status)
                   VALUES ('$id_produk','$harga_produk','$qty','$subtotal','Keranjang')")
                or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=form_transaksi&form=add");
            }
        } else if (isset($_POST['update'])) {
            var_dump($_POST);
            $query = mysqli_query($mysqli, "SELECT * FROM transaksi_detail where status = 'Keranjang'") or die('Ada kesalahan pada query tampil Data produk: ' . mysqli_error($mysqli));
            while ($data = mysqli_fetch_assoc($query)) {
                $qty = $_POST['qty_' . $data['id_detail']];
                $subtotal = $qty * $data['harga_produk'];
                echo "UPDATE transaksi_detail SET qty='$qty' WHERE id_detail = '$data[id_detail]'<br>";
                $query_2 = mysqli_query($mysqli, "UPDATE transaksi_detail SET qty='$qty',
                subtotal_detail = '$subtotal'
                WHERE id_detail       = '$data[id_detail]'")
                    or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));
                if ($query_2) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=form_transaksi&form=add");
                }
            }
        }
    } else if ($_GET['act'] == 'konfirmasi') {
        $id_transaksi  = mysqli_real_escape_string($mysqli, trim($_POST['id_transaksi']));
        $id_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['id_pelanggan']));
        $tanggal_transaksi  = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_transaksi']));
        $subtotal_transaksi  = mysqli_real_escape_string($mysqli, trim($_POST['subtotal_transaksi']));
        $diskon  = mysqli_real_escape_string($mysqli, trim($_POST['diskon']));
        $total_transaksi  = mysqli_real_escape_string($mysqli, trim($_POST['total_transaksi']));
        var_dump($_POST);
        $query = mysqli_query($mysqli, "INSERT INTO transaksi(id_transaksi,id_pelanggan,tanggal_transaksi,subtotal,diskon,total_pembelian)
                   VALUES ('$id_transaksi','$id_pelanggan','$tanggal_transaksi','$subtotal_transaksi','$diskon','$total_transaksi')")
            or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

        $query_2 = mysqli_query($mysqli, "UPDATE transaksi_detail SET id_transaksi   = '$id_transaksi',
                status='Checkout'
                WHERE status       = 'Keranjang'")
            or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));
        // cek query
        if ($query_2) {
            // jika berhasil tampilkan pesan berhasil simpan data
            header("location: ../../main.php?module=transaksi");
        }
    } else if ($_GET['act'] == 'delete') {
        $id_detail = $_GET['id'];
        $query = mysqli_query($mysqli, "DELETE FROM transaksi_detail WHERE id_detail='$id_detail'")
            or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
        if ($query) {
            // jika berhasil tampilkan pesan berhasil simpan data
            header("location: ../../main.php?module=form_transaksi&form=add");
        }
    } else if ($_GET['act'] == 'print') {
        #'require('../../library/fpdf184/fpdf.php');
        require('../../libraries/autoload.php');
        $mpdf = new \Mpdf\Mpdf();
        include '../../config/database.php';
        // $ambil = $conn->query("SELECT * FROM pembelian  LEFT JOIN user  ON pembelian.id_pelanggan = user.id_pelanggan WHERE status_pembelian = 'Pesanan Selesai' AND tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
        $query = mysqli_query($mysqli, "SELECT * FROM transaksi,transaksi_detail,produk WHERE produk.id_produk = transaksi_detail.id_produk  and transaksi.id_transaksi = transaksi_detail.id_transaksi and transaksi_detail.id_transaksi = '$_GET[id]'") or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));
        while ($pecah = $query->fetch_assoc()) {
            $semuadata[] = $pecah;
        }

        function tgl_indo($tanggal)
        {
            $bulan = array(
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);

            // variabel pecahkan 0 = tanggal
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tahun

            return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
        }
        $isi = "<p style='text-align: center; font-size: 30px; font-weight: bold;'>PASAR IKAN CIBARAJA</p>";
        $isi .= "<p style='text-align: center; padding-top: -35px;'>Jl. Selajambe, Kec. Cisaat, Kabupaten Sukabumi, Jawa Barat 43152</p>";
        $isi .= "<p style='text-align: center; padding-top: -15px; padding-bottom: -20px;'>(0266) 531-747</p>";
        $isi .= "<hr>";
        $isi .= "<p style='text-align: center; font-size: 24px; padding-top: -20px; font-weight: bold;'>Laporan Penjualan</p>";
        $isi .= "<p style='text-align: left; padding-top: -20px;'>Kode Penjualan:  " . $_GET['id'] . " </p>";
        $isi .= "<p style='text-align: left; padding-top: -20px;'>Tanggal Pembelian:  " . $semuadata[0]['tanggal_transaksi'] . " </p>";
        $isi .= "<table border='1' width='100%' style='margin-top:10px;border-collapse: collapse; border-spacing: 0px; padding: 0px; font-size: 11px'>";
        $isi .= "<thead>";
        $isi .= " <tr>
<th >No</th>
<th >Nama barang</th>
<th style='width: 85px;'>Harga Produk</th>
<th >Jumlah</th>
<th >Subtotal</th>
</tr>";
        $isi .= "</thead>";
        $isi .= " <tbody>";
        $total = 0;
        $i = 1;
        foreach ($semuadata as $key => $value) :
            $baju_sablon = $value["harga_produk"] + $value["harga_sablon"];
            $total += ($baju_sablon * $value["jumlah"]);
            $isi .= " <tr>";
            $isi .= " <th >" . $i++ . "</th>";
            $isi .= "<td>" . $value["nama_produk"] . "</td>";
            $isi .= "<td style='width: 130px;  text-align: center;'>Rp. " . number_format($value["harga_produk"]) . " </td>";
            $isi .= "<td  style='text-align: center;'>" . $value["qty"] . " </td>";
            $isi .= " <td style='width: 130px;  text-align: center;'>Rp.  " . number_format($value["subtotal_detail"]) . " </td>";
            $isi .= "</tr>";
        endforeach;
        $isi .= "</tbody>";
        $isi .= "<tfoot>";
        $isi .= "<tr>";
        $isi .= " <th colspan='4'>Diskon</th>";
        $isi .= " <th>Rp. " . number_format($value["diskon"]) . " </th>";
        $isi .= "</tr>";
        $isi .= "<tr>";
        $isi .= " <th colspan='4'>Total</th>";
        $isi .= " <th>Rp. " . number_format($value["total_pembelian"]) . " </th>";
        $isi .= "</tr>";
        $isi .= "</tfoot>";
        $isi .= "</table>";

        $isi .= "<br>";




        $mpdf->WriteHTML($isi);

        $mpdf->Output('Struk Penjualan.pdf', 'I');
    }
}
