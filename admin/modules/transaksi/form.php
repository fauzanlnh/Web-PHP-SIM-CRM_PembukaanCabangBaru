<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("#update").click(function() {
            $("#id_pelanggan").removeAttr("required");
        });
        $("#tambah").click(function() {
            $("#id_pelanggan").removeAttr("required");
        });
        $("#update").click(function() {
            $("#qty").removeAttr("required");
        });
        $("#simpan").click(function() {
            $("#qty").removeAttr("required");
        });
    });
</script>
<?php
$query_id = mysqli_query($mysqli, "SELECT RIGHT(id_transaksi,4) as kode FROM transaksi
ORDER BY id_transaksi DESC LIMIT 1")
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
$id_transaksi = "TRANSAKSI-$buat_id";
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
                    <form role="form" class="form-horizontal" action="modules/transaksi/proses.php?act=insert" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID produk</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="id_transaksi" autocomplete="off" required readonly value="<?= $id_transaksi ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID Pelanggan</label>
                                <div class="col-sm-5">
                                    <select id="id_pelanggan" class="form-control" name="id_pelanggan" onchange="detectChange(this)" required>
                                        <option value="">Pilih Pelanggan</option>
                                        <?php
                                        $query = mysqli_query($mysqli, "SELECT * FROM pelanggan")
                                            or die('Ada kesalahan pada query tampil Data produk: ' . mysqli_error($mysqli));
                                        // tampilkan data
                                        while ($data = mysqli_fetch_assoc($query)) { ?>
                                            <option value="<?= $data['id_pelanggan'] ?>"><?= $data['id_pelanggan'] . " - " . $data['nama_pelanggan'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Transaksi</label>
                                <div class="col-sm-5">
                                    <?php
                                    $today =  date("Y-m-d");
                                    ?>
                                    <input type="date" class="form-control" name="tanggal_transaksi" autocomplete="off" readonly value="<?= $today ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Produk</label>
                                <div class="col-sm-2">
                                    <select id="cars" class="form-control" name="id_produk" onchange="detectChange(this)">
                                        <?php
                                        $query = mysqli_query($mysqli, "SELECT * FROM produk")
                                            or die('Ada kesalahan pada query tampil Data produk: ' . mysqli_error($mysqli));
                                        // tampilkan data
                                        while ($data = mysqli_fetch_assoc($query)) { ?>
                                            <option value="<?= $data['id_produk'] ?>"><?= $data['id_produk'] . " - " . $data['nama_produk'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <label class="col-sm-1 control-label">Qty</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="qty" autocomplete="off" required id="qty">
                                </div>
                                <input type="submit" class="btn btn-primary btn-submit" name="tambah" value="Tambah" id="tambah">
                            </div>
                        </div><!-- /.box body -->
                        <hr>
                        <div class="box-body" style="margin-top: -30px; ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col-lg-2">Nama Barang</th>
                                        <th scope="col-lg-4">Harga Produk</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php
                                    $ambil = $mysqli->query("SELECT * FROM transaksi_detail, produk where transaksi_detail.id_produk = produk.id_produk and status='Keranjang'");
                                    ?>
                                    <?php while ($pecah = $ambil->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?php echo $pecah['nama_produk'] ?></td>
                                            <td>Rp.<?php echo number_format($pecah['harga_produk']); ?></td>
                                            <td><input type="number" class="form-control" value="<?php echo $pecah['qty'] ?>" name="qty_<?= $pecah['id_detail'] ?>"></td>
                                            <td>Rp.<?php echo number_format($pecah['subtotal_detail']); ?></td>
                                            <td>
                                                <a data-toggle='tooltip' data-placement='top' title='Delete' style='margin-right:5px' class='btn btn-danger btn-sm' href='modules/transaksi/proses.php?act=delete&id=<?= $pecah['id_detail'] ?>'>
                                                    <i style='color:#fff' class='glyphicon glyphicon-trash'></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div><!-- /.box body -->
                        <div class="box-footer" style="margin-top: 20px;" class=" form-vertical">
                            <div class="row" style="float:right;">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="?module=produk" class="btn btn-default btn-reset">Batal</a>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="submit" name="update" class="btn btn-warning btn-submit" value="Update" id="update">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan" id="simpan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

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