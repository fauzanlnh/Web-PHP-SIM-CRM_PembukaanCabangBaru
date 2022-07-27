<?php
// Include calendar helper functions
require_once "config/fungsi_calendar.php";
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-home icon-title"></i> Beranda
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p style="font-size:15px">
          <i class="icon fa fa-user"></i> Selamat datang <strong><?php echo $_SESSION['username']; ?></strong> di Dashboard
        </p>
      </div>
    </div>
  </div>

  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div style="background-color:#00c0ef;color:#fff" class="small-box">
        <div class="inner">
          <?php
          // fungsi query untuk menampilkan data dari tabel obat
          $query = mysqli_query($mysqli, "SELECT COUNT(id_transaksi) as jumlah FROM transaksi")
            or die('Ada kesalahan pada query tampil Data Booking: ' . mysqli_error($mysqli));
          // tampilkan data
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Data Transaksi</p>
        </div>
        <div class="icon">
          <i class="fa fa-folder"></i>
        </div>
        <?php
        if ($_SESSION['hak_akses'] == 'superadmin') { ?>
          <a href="?module=form_artikel&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        <?php
        } else { ?>
          <a class="small-box-footer"><i class="fa"></i></a>
        <?php
        }
        ?>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div style="background-color:#00a65a;color:#fff" class="small-box">
        <div class="inner">
          <?php
          // fungsi query untuk menampilkan data dari tabel obat
          $query = mysqli_query($mysqli, "SELECT COUNT(id_produk) as jumlah FROM produk")
            or die('Ada kesalahan pada query tampil Data Booking: ' . mysqli_error($mysqli));
          // tampilkan data
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Data Produk</p>
        </div>
        <div class="icon">
          <i class="fa fa-sign-in"></i>
        </div>
        <?php
        if ($_SESSION['hak_akses'] == 'superadmin') { ?>
          <a href="?module=form_anggota&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        <?php
        } else { ?>
          <a class="small-box-footer"><i class="fa"></i></a>
        <?php
        }
        ?>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div style="background-color:#f39c12;color:#fff" class="small-box">
        <div class="inner">
          <?php
          // fungsi query untuk menampilkan data dari tabel obat
          $query = mysqli_query($mysqli, "SELECT COUNT(id_kritik_saran) as jumlah FROM kritik_saran")
            or die('Ada kesalahan pada query tampil Data Motto: ' . mysqli_error($mysqli));
          // tampilkan data
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Data Kritik dan Saran</p>
        </div>
        <div class="icon">
          <i class="fa fa-file-text-o"></i>
        </div>
        <?php
        if ($_SESSION['hak_akses'] == 'superadmin') { ?>
          <a href="?module=form_peralatan&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        <?php
        } else { ?>
          <a class="small-box-footer"><i class="fa"></i></a>
        <?php
        }
        ?>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div style="background-color:#dd4b39;color:#fff" class="small-box">
        <div class="inner">
          <?php
          // fungsi query untuk menampilkan data dari tabel obat
          $query = mysqli_query($mysqli, "SELECT COUNT(id_pelanggan) as jumlah FROM pelanggan")
            or die('Ada kesalahan pada query tampil Data pengurus: ' . mysqli_error($mysqli));
          // tampilkan data
          $data = mysqli_fetch_assoc($query);
          ?>
          <h3><?php echo $data['jumlah']; ?></h3>
          <p>Data Pelanggan</p>
        </div>
        <div class="icon">
          <i class="fa fa-clone"></i>
        </div>
        <?php
        if ($_SESSION['hak_akses'] == 'superadmin') { ?>
          <a href="?module=form_angkatan&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        <?php
        } else { ?>
          <a class="small-box-footer"><i class="fa"></i></a>
        <?php
        }
        ?>
      </div>
    </div><!-- ./col -->
    <!-- Display event calendar -->
  </div><!-- /.row -->
</section><!-- /.content -->