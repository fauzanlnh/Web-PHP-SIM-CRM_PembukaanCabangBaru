<?php
// fungsi pengecekan level untuk menampilkan menu sesuai dengan hak akses
// jika hak akses = Super Admin, tampilkan menu
if ($_SESSION['hak_akses'] == 'superadmin') { ?>
  <!-- sidebar menu start -->
  <ul class="sidebar-menu">
    <li class="header">MAIN MENU</li>
    <?php
    // fungsi untuk pengecekan menu aktif
    // jika menu beranda dipilih, menu beranda aktif
    if ($_GET["module"] == "beranda") { ?>
      <li class="active">
        <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
      </li>
    <?php
    }
    // jika tidak, menu home tidak aktif
    else { ?>
      <li>
        <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
      </li>
    <?php
    }
    if ($_GET["module"] == "pelanggan" || $_GET["module"] == "form_pelanggan") { ?>
      <li class="active">
        <a href="?module=pelanggan"><i class="fa fa-user"></i> Pelanggan </a>
      </li>
    <?php
    }
    // jika tidak, menu home tidak aktif
    else { ?>
      <li>
        <a href="?module=pelanggan"><i class="fa fa-user"></i> Pelanggan </a>
      </li>
    <?php
    }
    // jika menu user dipilih, menu user aktif
    if ($_GET["module"] == "produk" || $_GET["module"] == "form_produk") { ?>
      <li class="active">
        <a href="?module=produk"><i class="fa fa-dropbox"></i> Produk</a>
      </li>
    <?php
    }
    // jika tidak, menu user tidak aktif
    else { ?>
      <li>
        <a href="?module=produk"><i class="fa fa-dropbox"></i> Produk</a>
      </li>
    <?php
    }
    if ($_GET["module"] == "transaksi" || $_GET["module"] == "form_transaksi" || $_GET["module"] == "transaksi_detail") { ?>
      <li class="active">
        <a href="?module=transaksi"><i class="fa fa-exchange"></i> Transaksi</a>
      </li>
    <?php
    }
    // jika tidak, menu user tidak aktif
    else { ?>
      <li>
        <a href="?module=transaksi"><i class="fa fa-exchange"></i> Transaksi</a>
      </li>
    <?php
    }
    // jika menu ubah password dipilih, menu ubah password aktif
    if ($_GET["module"] == "kritik_saran" || $_GET["module"] == "form_kritik_saran") { ?>
      <li class="active">
        <a href="?module=kritik_saran"><i class="fa fa-inbox"></i> Kritik dan Saran</a>
      </li>
    <?php
    }
    // jika tidak, menu ubah password tidak aktif
    else { ?>
      <li>
        <a href="?module=kritik_saran"><i class="fa fa-inbox"></i> Kritik dan Saran</a>
      </li>
    <?php
    }
    if ($_GET["module"] == "spk_cabang_baru" || $_GET["module"] == "form_spk_cabang_baru" || $_GET["module"] == "spk_cabang_baru_detail") { ?>
      <li class="active">
        <a href="?module=spk_cabang_baru"><i class="fa fa-university"></i> SPK Cabang Baru</a>
      </li>
    <?php
    }
    // jika tidak, menu ubah password tidak aktif
    else { ?>
      <li>
        <a href="?module=spk_cabang_baru"><i class="fa fa-university"></i> SPK Cabang Baru</a>
      </li>
  <?php
    }
  }
  ?>
  </ul>

  <!--sidebar menu end-->