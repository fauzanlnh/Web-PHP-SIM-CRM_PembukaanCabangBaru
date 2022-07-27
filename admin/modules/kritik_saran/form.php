<?php
if ($_GET['form'] == 'penanganan') {
    $query = mysqli_query($mysqli, "SELECT * FROM kritik_saran WHERE id_kritik_saran ='$_GET[id]'")
        or die('Ada kesalahan pada query tampil Data pelanggan : ' . mysqli_error($mysqli));
    $data  = mysqli_fetch_assoc($query); ?>
    <section class="content-header">
        <h1>
            <i class="fa fa-edit icon-title"></i> Input Data Kritik dan Saran
        </h1>
        <ol class="breadcrumb">
            <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
            <li><a href="?module=kritik_saran"> Data Kritik dan Saran </a></li>
            <li class="active"> Penanganan </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="modules/kritik_saran/proses.php?act=penanganan&id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID Kritik dan Saran</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="id_kritik_saran" autocomplete="off" required readonly value="<?= $data['id_kritik_saran'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kritik dan Saran</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="deskripsi" autocomplete="off" required readonly><?= $data['kritik_saran'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Penanganan</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="penanganan" autocomplete="off" required></textarea>
                                </div>
                            </div>

                        </div><!-- /.box body -->

                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                                    <a href="?module=kritik_saran" class="btn btn-default btn-reset">Batal</a>
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