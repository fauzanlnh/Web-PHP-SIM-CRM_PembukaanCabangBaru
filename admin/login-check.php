
<?php
// panggil file untuk koneksi ke database
require_once "config/database.php";

// ambil data hasil submit dari form
if (isset($_POST["login"])) {
	$username = strtoupper($_POST['username']);
	// ambil data dari tabel user untuk pengecekan berdasarkan inputan username dan passrword
	$query = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$username'")
		or die('Ada kesalahan pada query user: ' . mysqli_error($mysqli));
	$rows  = mysqli_fetch_row($query);
	// jika data ada, jalankan perintah untuk membuat session
	if (mysqli_num_rows($query) > 0) {
		$password = $_POST['password'];
		$data  = mysqli_fetch_assoc($query);
		session_start();
		// lalu alihkan ke halaman user
		var_dump($rows);
		if (password_verify($password, $rows[2])) {
			$_SESSION['username'] = $rows[1];
			$_SESSION['id_user'] = $rows[0];
			$_SESSION['hak_akses'] = $rows[3];
			header("Location: main.php?module=beranda");
		} else {
			header("Location: index.php?alert=1");
		}
	} else {
		header("Location: index.php?alert=1");
	}
	// jika data tidak ada, alihkan ke halaman login dan tampilkan pesan = 1

}
?>