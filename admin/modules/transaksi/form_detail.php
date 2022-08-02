<?php
if ($_GET['module'] == 'transaksi_detail') { ?>
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
                    <form role="form" class="form-horizontal" action="modules/transaksi/proses.php?act=konfirmasi" method="POST" enctype="multipart/form-data">
                        <?php
                        $query = mysqli_query($mysqli, "SELECT * FROM transaksi, pelanggan where pelanggan.id_pelanggan = transaksi.id_pelanggan and id_transaksi='$_GET[id_transaksi]'")
                            or die('Ada kesalahan pada query tampil Data produk: ' . mysqli_error($mysqli));
                        // tampilkan data
                        $data = mysqli_fetch_assoc($query);

                        ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID produk</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="id_transaksi" autocomplete="off" required readonly value="<?= $_GET['id_transaksi'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID Pelanggan</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="id_pelanggan" autocomplete="off" required readonly value="<?= $_GET['id_pelanggan'] ?>">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php
                                        $ambil = $mysqli->query("SELECT * FROM transaksi_detail, produk where transaksi_detail.id_produk = produk.id_produk and transaksi_detail.status='Keranjang'");
                                        ?>
                                        <?php while ($pecah = $ambil->fetch_assoc()) {

                                        ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?php echo $pecah['nama_produk'] ?></td>
                                                <td>Rp.<?php echo number_format($pecah['harga_produk']); ?></td>
                                                <td><?php echo $pecah['qty'] ?></td>
                                                <td>Rp.<?php echo number_format($pecah['subtotal_detail']); ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div><!-- /.box body -->
                            <div class="box-footer" style="margin-top: 20px;" class=" form-vertical">
                                <?php
                                $ambil = $mysqli->query("SELECT * FROM transaksi_detail, produk where transaksi_detail.id_produk = produk.id_produk and transaksi_detail.status='Keranjang'");
                                $subtotal = 0;
                                while ($pecah = $ambil->fetch_assoc()) {
                                    $subtotal = $subtotal + ($pecah['harga_produk'] * $pecah['qty']);
                                }
                                $query_jumlah_transaksi = $ambil = $mysqli->query("SELECT * FROM transaksi,pelanggan where transaksi.id_pelanggan = pelanggan.id_pelanggan and pelanggan.id_pelanggan = '$_GET[id_pelanggan]' and total_pembelian > 500000");
                                $row = mysqli_num_rows($query_jumlah_transaksi);
                                echo $row;
                                echo fmod($row, 5);
                                if ($row > 0 && fmod($row, 5) == 0) {
                                    echo $row;
                                    if ($row > 0 && fmod($row, 5) == 0) {
                                        $diskon = $subtotal * 10 / 100;
                                    } else {
                                        $diskon = 0;
                                    }
                                } else {
                                    $diskon = 0;
                                }
                                $total = $subtotal - $diskon;
                                ?>
                                <div class="row" style="float:right;">
                                    <div class="row">
                                        <label class="col-sm-2 control-label">Subtotal</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="subtotal_transaksi" autocomplete="off" readonly value="<?= $subtotal ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 control-label">Diskon</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" name="diskon" autocomplete="off" readonly value="<?= $diskon ?>">
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <label class="col-sm-2 control-label">Total</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" name="total_transaksi" autocomplete="off" readonly value="<?= $total ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <a href="?module=produk" class="btn btn-default btn-reset">Batal</a>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
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