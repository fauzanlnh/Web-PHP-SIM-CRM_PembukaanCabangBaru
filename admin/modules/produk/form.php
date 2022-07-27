<?php
$query_id = mysqli_query($mysqli, "SELECT RIGHT(id_produk,4) as kode FROM produk
ORDER BY id_produk DESC LIMIT 1")
    or die('Ada kesalahan pada query tampil id_artikel : ' . mysqli_error($mysqli));
$count = mysqli_num_rows($query_id);
if ($count <> 0) {
    // mengambil data kode_artikel
    $data_id = mysqli_fetch_assoc($query_id);
    $kode    = $data_id['kode'] + 1;
} else {
    $kode = 1;
}
$buat_id   = str_pad($kode, 4, "0", STR_PAD_LEFT);
$id_produk = "PRODUK-$buat_id";
if ($_GET['form'] == 'add') { ?>
    <section class="content-header">
        <h1>
            <i class="fa fa-edit icon-title"></i> Input Data produk
        </h1>
        <ol class="breadcrumb">
            <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
            <li><a href="?module=produk"> Data produk </a></li>
            <li class="active"> Tambah </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="modules/produk/proses.php?act=insert" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID produk</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="id_produk" autocomplete="off" required readonly value="<?= $id_produk ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama produk</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nama_produk" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kategori</label>
                                <div class="col-sm-5">
                                    <select id="cars" class="form-control" name="kategori" onchange="detectChange(this)">
                                        <option value="t-shirt">T-Shirt</option>
                                        <option value="sablon">sablon</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Harga</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="harga_jual" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Keterangan Produk</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="deskripsi" autocomplete="off" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">foto</label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control" name="foto" autocomplete="off" accept="image/*" required>
                                </div>
                            </div>
                        </div><!-- /.box body -->

                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                                    <a href="?module=produk" class="btn btn-default btn-reset">Batal</a>
                                </div>
                            </div>
                        </div><!-- /.box footer -->
                    </form>
                </div><!-- /.box -->
            </div>
            <!--/.col -->
        </div> <!-- /.row -->
    </section><!-- /.content -->
<?php
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form'] == 'edit') {
    if (isset($_GET['id'])) {
        // fungsi query untuk menampilkan data dari tabel produk
        $query = mysqli_query($mysqli, "SELECT * FROM produk WHERE id_produk='$_GET[id]'")
            or die('Ada kesalahan pada query tampil Data produk : ' . mysqli_error($mysqli));
        $data  = mysqli_fetch_assoc($query);
    }
?>
    <!-- tampilan form edit data -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-edit icon-title"></i> Ubah produk
        </h1>
        <ol class="breadcrumb">
            <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
            <li><a href="?module=produk"> produk </a></li>
            <li class="active"> Ubah </li>
        </ol>
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="modules/produk/proses.php?act=update" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Id Produk</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="id_produk" autocomplete="off" value="<?= $_GET['id'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama produk</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nama_produk" autocomplete="off" value="<?= $data['nama_produk'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kategori</label>
                                <div class="col-sm-5">
                                    <select id="cars" class="form-control" name="kategori">
                                        <?php
                                        if ($data['kategori'] == 't-shirt') {
                                            echo '<option selected value="t-shirt">T-Shirt</option>';
                                        } else {
                                            echo '<option value="t-shirt">T-Shirt</option>';
                                        }
                                        ?>
                                        <?php
                                        if ($data['kategori'] == 'sablon') {
                                            echo '<option selected value="sablon">sablon</option>';
                                        } else {
                                            echo '<option value="sablon">sablon</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Harga</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="harga_jual" autocomplete="off" value="<?= $data['harga_jual'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Keterangan Produk</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="deskripsi" autocomplete="off" required><?= $data['deskripsi'] ?> </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Foto</label>
                                <div class="col-sm-5">
                                    <img src="images/<?= $data['gambar'] ?>" alt="User Image" width="50%" style="margin-bottom: 10px;">
                                    <br><span>Klik untuk ubah gambar</span><br>
                                    <input type="file" class="form-control" name="foto" autocomplete="off" accept="image/*">
                                </div>
                            </div>
                        </div><!-- /.box body -->
                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                                    <a href="?module=produk" class="btn btn-default btn-reset">Batal</a>
                                </div>
                            </div>
                        </div><!-- /.box footer -->
                    </form>
                </div><!-- /.box -->
            </div>
            <!--/.col -->
        </div> <!-- /.row -->
    </section><!-- /.content -->
<?php
}
?>