
<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";
/* panggil file fungsi tambahan */
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";
// fungsi untuk pengecekan status login user
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih beranda, panggil file view beranda
	if ($_GET['module'] == 'beranda') {
		include "modules/beranda/view.php";
	}
	// Master Data

	// kritik dan saran
	elseif ($_GET['module'] == 'kritik_saran') {
		include "modules/kritik_saran/view.php";
	} elseif ($_GET['module'] == 'form_kritik_saran') {
		include "modules/kritik_saran/form.php";
	}
	// pelanggan
	elseif ($_GET['module'] == 'pelanggan') {
		include "modules/pelanggan/view.php";
	} elseif ($_GET['module'] == 'form_pelanggan') {
		include "modules/pelanggan/form.php";
	}
	// produk
	elseif ($_GET['module'] == 'produk') {
		include "modules/produk/view.php";
	} elseif ($_GET['module'] == 'form_produk') {
		include "modules/produk/form.php";
	}
	// SPK
	elseif ($_GET['module'] == 'spk_cabang_baru') {
		include "modules/spk_cabang_baru/view.php";
	} elseif ($_GET['module'] == 'form_spk_cabang_baru') {
		include "modules/spk_cabang_baru/form.php";
	} elseif ($_GET['module'] == 'spk_cabang_baru_detail') {
		include "modules/spk_cabang_baru/form_detail.php";
	}
	// TRANSAKSI
	elseif ($_GET['module'] == 'transaksi') {
		include "modules/transaksi/view.php";
	} elseif ($_GET['module'] == 'form_transaksi') {
		include "modules/transaksi/form.php";
	} elseif ($_GET['module'] == 'transaksi_detail') {
		include "modules/transaksi/form_detail.php";
	}
}
?>