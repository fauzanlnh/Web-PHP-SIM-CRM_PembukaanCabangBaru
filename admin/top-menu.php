<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";

// fungsi query untuk menampilkan data dari tabel user
$query = mysqli_query($mysqli, "SELECT id_user, username,role FROM user WHERE id_user ='$_SESSION[id_user]'")
  or die('Ada kesalahan pada query tampil Manajemen User: ' . mysqli_error($mysqli));

// tampilkan data
$data = mysqli_fetch_assoc($query);

?>

<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <span class="hidden-xs"><?php echo $data['username']; ?> <i style="margin-left:5px" class="fa fa-angle-down"></i></span>
  </a>
  <ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header">



      <img src="images/user/user-default.png" class="img-circle" alt="User Image" />

      <p>
        <?php echo $data['username']; ?>
        <small><?php echo $data['role']; ?></small>
      </p>
    </li>

    <!-- Menu Footer-->
    <li class="user-footer">

      <div class="pull-right">
        <a style="width:80px" data-toggle="modal" href="#logout" class="btn btn-default btn-flat">Logout</a>
      </div>
    </li>
  </ul>
</li>