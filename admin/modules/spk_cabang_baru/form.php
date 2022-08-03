<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("#update").click(function() {
            $("#nama_kota").removeAttr("required");
            $("#alamat").removeAttr("required");
            $("#luas_tanah").removeAttr("required");
            $("#lk_pendidikan").removeAttr("required");
            $("#lk_pelanggan_lama").removeAttr("required");
            $("#lk_cab_lain").removeAttr("required");
            $("#lahan_parkir").removeAttr("required");
            $("#harga_sewa").removeAttr("required");
        });
        $("#simpan").click(function() {
            $("#nama_kota").removeAttr("required");
            $("#alamat").removeAttr("required");
            $("#luas_tanah").removeAttr("required");
            $("#lk_pendidikan").removeAttr("required");
            $("#lk_pelanggan_lama").removeAttr("required");
            $("#lk_cab_lain").removeAttr("required");
            $("#lahan_parkir").removeAttr("required");
            $("#harga_sewa").removeAttr("required");
        });
    });
</script>
<?php
$query_id = mysqli_query($mysqli, "SELECT RIGHT(id_spk_cabang_baru,4) as kode FROM spk_cabang_baru
ORDER BY id_spk_cabang_baru DESC LIMIT 1")
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
$id_transaksi = "SPK-$buat_id";
if ($_GET['form'] == 'add') { ?>
    <section class="content-header">
        <h1>
            <i class="fa fa-edit icon-title"></i> Input Data SPK
        </h1>
        <ol class="breadcrumb">
            <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
            <li><a href="?module=spk_cabang_baru"> Data SPK </a></li>
            <li class="active"> Tambah </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="modules/spk_cabang_baru/proses.php?act=insert" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID SPK</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="id_spk" autocomplete="off" required readonly value="<?= $id_transaksi ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal</label>
                                <div class="col-sm-5">
                                    <?php
                                    $today =  date("Y-m-d");
                                    ?>
                                    <input type="date" class="form-control" name="tanggal" autocomplete="off" readonly value="<?= $today ?>">
                                </div>
                            </div>
                        </div><!-- /.box body -->
                        <hr>
                        <div class="box-body" style="margin-top: -20px; ">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Kota</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nama_kota" autocomplete="off" required id="nama_kota">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="alamat" autocomplete="off" rows="5" required id="alamat"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Luas Tanah</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="luas_tanah" autocomplete="off" required id="luas_tanah">
                                </div>
                                <label class="col-sm-1 control-label">Lok dekat fas Pend.</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="lks_dkt_pdk" autocomplete="off" required id="lk_pendidikan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Lok dekat pel lama</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="lks_dkt_plg_lama" autocomplete="off" required id="lk_pelanggan_lama">
                                </div>
                                <label class="col-sm-1 control-label">Lok dekat cab lain</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="lks_dkt_cbg" autocomplete="off" required id="lk_cab_lain">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Lahan Parkir</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="lahan_parkir" autocomplete="off" required id="lahan_parkir">
                                </div>
                                <label class="col-sm-1 control-label">Harga Sewa</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="harga_sewa" autocomplete="off" required id="harga_sewa">
                                </div>
                                <input type="submit" class="btn btn-primary btn-submit" name="tambah" value="Tambah">
                            </div>
                        </div>
                        <hr>
                        <div class="box-body" style="margin-top: -30px; ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col-lg-2">Nama Kota</th>
                                        <th scope="col-lg-4">Alamat</th>
                                        <th scope="col">Luas Tanah</th>
                                        <th scope="col">Lokasi dekat fasilitas Pend.</th>
                                        <th scope="col">Lokasi dekat Pel. lama</th>
                                        <th scope="col">Lokasi dekat Cab. lain</th>
                                        <th scope="col">Lahan Parkir</th>
                                        <th scope="col">Harga Sewa</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php
                                    $ambil = $mysqli->query("SELECT * FROM spk_cabang_baru_jawaban where status='Add'");
                                    ?>
                                    <?php while ($pecah = $ambil->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><input type="text" class="form-control" value="<?php echo $pecah['nama_kota'] ?>" name="nama_kota_<?= $pecah['id_jawaban'] ?>"></td>
                                            <td><input type="text" class="form-control" value="<?php echo $pecah['alamat'] ?>" name="alamat_<?= $pecah['id_jawaban'] ?>"></td>
                                            <td><input type="number" class="form-control" value="<?php echo $pecah['luas_tanah'] ?>" name="luas_tanah_<?= $pecah['id_jawaban'] ?>"></td>
                                            <td><input type="number" class="form-control" value="<?php echo $pecah['lks_dkt_pdk'] ?>" name="lks_dkt_pdk_<?= $pecah['id_jawaban'] ?>"></td>
                                            <td><input type="number" class="form-control" value="<?php echo $pecah['lks_dkt_plg_lama'] ?>" name="lks_dkt_plg_lama_<?= $pecah['id_jawaban'] ?>"></td>
                                            <td><input type="number" class="form-control" value="<?php echo $pecah['lks_dkt_cbg'] ?>" name="lks_dkt_cbg_<?= $pecah['id_jawaban'] ?>"></td>
                                            <td><input type="number" class="form-control" value="<?php echo $pecah['lahan_parkir'] ?>" name="lahan_parkir_<?= $pecah['id_jawaban'] ?>"></td>
                                            <td><input type="number" class="form-control" value="<?php echo $pecah['harga_sewa'] ?>" name="harga_sewa_<?= $pecah['id_jawaban'] ?>"></td>
                                            <td>
                                                <a data-toggle='tooltip' data-placement='top' title='Delete' style='margin-right:5px' class='btn btn-danger btn-sm' href='modules/spk_cabang_baru/proses.php?act=delete&id=' .<?= $pecah['id_jawaban'] ?>>
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
                                        <a href="?module=spk_cabang_baru" class="btn btn-default btn-reset">Kembali</a>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="submit" name="update" class="btn btn-warning btn-submit" value="Update" id="update">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Proses" id="simpan">
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
} else if ($_GET['form'] == 'edit') {
    $query = mysqli_query($mysqli, "SELECT * FROM spk_cabang_baru, spk_cabang_baru_jawaban where spk_cabang_baru.id_spk_cabang_baru = spk_cabang_baru_jawaban.id_spk_cabang_baru")
        or die('Ada kesalahan pada query tampil Data produk: ' . mysqli_error($mysqli));
    // tampilkan data
    $data = mysqli_fetch_assoc($query);
?>
    <section class="content-header">
        <h1>
            <i class="fa fa-edit icon-title"></i> Input Data SPK
        </h1>
        <ol class="breadcrumb">
            <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
            <li><a href="?module=spk_cabang_baru"> Data SPK </a></li>
            <li class="active"> Tambah </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="modules/spk_cabang_baru/proses.php?act=insert&form=form_edit" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID SPK</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="id_spk" autocomplete="off" required readonly value="<?= $data['id_spk_cabang_baru'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal</label>
                                <div class="col-sm-5">
                                    <?php
                                    $today =  date("Y-m-d");
                                    ?>
                                    <input type="date" class="form-control" name="tanggal" autocomplete="off" readonly value="<?= $data['tanggal'] ?>">
                                </div>
                            </div>
                        </div><!-- /.box body -->
                        <hr>
                        <div class="box-body" style="margin-top: -20px; ">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Kota</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nama_kota" autocomplete="off" required id="nama_kota">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="alamat" autocomplete="off" rows="5" required id="alamat"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Luas Tanah</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="luas_tanah" autocomplete="off" required id="luas_tanah">
                                </div>
                                <label class="col-sm-1 control-label">Lok dekat fas Pend.</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="lks_dkt_pdk" autocomplete="off" required id="lk_pendidikan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Lok dekat pel lama</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="lks_dkt_plg_lama" autocomplete="off" required id="lk_pelanggan_lama">
                                </div>
                                <label class="col-sm-1 control-label">Lok dekat cab lain</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="lks_dkt_cbg" autocomplete="off" required id="lk_cab_lain">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Lahan Parkir</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="lahan_parkir" autocomplete="off" required id="lahan_parkir">
                                </div>
                                <label class="col-sm-1 control-label">Harga Sewa</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="harga_sewa" autocomplete="off" required id="harga_sewa">
                                </div>
                                <input type="submit" class="btn btn-primary btn-submit" name="tambah" value="Tambah">
                            </div>
                        </div>
                        <hr>
                        <div class="box-body" style="margin-top: -30px; ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col-lg-2">Nama Kota</th>
                                        <th scope="col-lg-4">Alamat</th>
                                        <th scope="col">Luas Tanah</th>
                                        <th scope="col">Lokasi dekat fasilitas Pend.</th>
                                        <th scope="col">Lokasi dekat Pel. lama</th>
                                        <th scope="col">Lokasi dekat Cab. lain</th>
                                        <th scope="col">Lahan Parkir</th>
                                        <th scope="col">Harga Sewa</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    $ambil = $mysqli->query("SELECT * FROM spk_cabang_baru, spk_cabang_baru_jawaban where spk_cabang_baru.id_spk_cabang_baru = spk_cabang_baru_jawaban.id_spk_cabang_baru");
                                    while ($pecah = $ambil->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><input type="text" class="form-control" value="<?php echo $pecah['nama_kota'] ?>" name="nama_kota_<?= $pecah['id_jawaban'] ?>"></td>
                                            <td><input type="text" class="form-control" value="<?php echo $pecah['alamat'] ?>" name="alamat_<?= $pecah['id_jawaban'] ?>"></td>
                                            <td><input type="number" class="form-control" value="<?php echo $pecah['luas_tanah'] ?>" name="luas_tanah_<?= $pecah['id_jawaban'] ?>"></td>
                                            <td><input type="number" class="form-control" value="<?php echo $pecah['lks_dkt_pdk'] ?>" name="lks_dkt_pdk_<?= $pecah['id_jawaban'] ?>"></td>
                                            <td><input type="number" class="form-control" value="<?php echo $pecah['lks_dkt_plg_lama'] ?>" name="lks_dkt_plg_lama_<?= $pecah['id_jawaban'] ?>"></td>
                                            <td><input type="number" class="form-control" value="<?php echo $pecah['lks_dkt_cbg'] ?>" name="lks_dkt_cbg_<?= $pecah['id_jawaban'] ?>"></td>
                                            <td><input type="number" class="form-control" value="<?php echo $pecah['lahan_parkir'] ?>" name="lahan_parkir_<?= $pecah['id_jawaban'] ?>"></td>
                                            <td><input type="number" class="form-control" value="<?php echo $pecah['harga_sewa'] ?>" name="harga_sewa_<?= $pecah['id_jawaban'] ?>"></td>
                                            <td>
                                                <a data-toggle='tooltip' data-placement='top' title='Delete' style='margin-right:5px' class='btn btn-danger btn-sm' href='modules/spk_cabang_baru/proses.php?act=delete&id=<?= $pecah['id_jawaban'] ?>&form=form_edit'>
                                                    <i style='color:#fff' class='glyphicon glyphicon-trash'></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div><!-- /.box body -->
                        <div class="box-footer" style="margin-top: 20px;" class=" form-vertical">
                            <div class="row" style="float:right;">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="?module=spk_cabang_baru" class="btn btn-default btn-reset">Kembali</a>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="submit" name="update" class="btn btn-warning btn-submit" value="Update" id="update">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Proses" id="simpan">
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