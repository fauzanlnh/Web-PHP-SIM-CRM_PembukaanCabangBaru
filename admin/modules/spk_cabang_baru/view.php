<section class="content-header">
    <h1>
        <i class="fa fa-folder-o icon-title"></i> Data Pendukung Keputusan
        <a class="btn btn-primary btn-social pull-right" href="?module=form_spk_cabang_baru&form=add" title="Tambah Data" data-toggle="tooltip">
            <i class="fa fa-plus"></i> Tambah
        </a>
    </h1>

</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <?php
            // fungsi untuk menampilkan pesan
            // jika alert = "" (kosong)
            // tampilkan pesan "" (kosong)
            if (empty($_GET['alert'])) {
                echo "";
            }
            // jika alert = 1
            // tampilkan pesan Sukses "Data transaksi baru berhasil disimpan"
            elseif ($_GET['alert'] == 1) {
                echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data transaksi baru berhasil disimpan.
            </div>";
            }
            // jika alert = 2
            // tampilkan pesan Sukses "Data transaksi berhasil diubah"
            elseif ($_GET['alert'] == 2) {
                echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data transaksi berhasil diubah.
            </div>";
            }
            // jika alert = 3
            // tampilkan pesan Sukses "Data transaksi berhasil dihapus"
            elseif ($_GET['alert'] == 3) {
                echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data transaksi berhasil dihapus.
            </div>";
            }
            ?>

            <div class="box box-primary">
                <div class="box-body">
                    <!-- tampilan tabel transaksi -->
                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <!-- tampilan tabel header -->
                        <thead>
                            <tr>
                                <th class="center">No.</th>
                                <th class="center">ID SPK</th>
                                <th class="center">Tanggal</th>
                                <th class="center">Hasil</th>
                                <th class="center">Action</th>
                            </tr>
                        </thead>
                        <!-- tampilan tabel body -->
                        <tbody>
                            <?php
                            $no = 1;
                            // fungsi query untuk menampilkan data dari tabel transaksi
                            $query = mysqli_query($mysqli, "SELECT spk_cabang_baru.id_spk_cabang_baru, tanggal, nama_kota FROM spk_cabang_baru, spk_cabang_baru_jawaban where spk_cabang_baru.id_spk_cabang_baru = spk_cabang_baru_jawaban.id_spk_cabang_baru order by nilai desc limit 1;")
                                or die('Ada kesalahan pada query tampil Data transaksi: ' . mysqli_error($mysqli));
                            // tampilkan data
                            while ($data = mysqli_fetch_assoc($query)) {
                                //   $harga_beli = format_rupiah($data['harga_beli']);
                                //   $subtotal = format_rupiah($data['subtotal']);
                                // menampilkan isi tabel dari database ke tabel di aplikasi
                                echo "<tr>
                                    <td width='50' class='center'>$no</td>
                                    <td width='150' class='center'>$data[id_spk_cabang_baru]</td>
                                    <td width='150' class='center'>$data[tanggal]</td>
                                    <td width='150' class='center'>$data[nama_kota]</td>
                                    <td class='center' width='100'>
                                    <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_spk_cabang_baru&form=edit&id=$data[id_spk_cabang_baru]'>
                                        <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                                    </a>
                                    <a data-toggle='tooltip' data-placement='top' title='Delete' style='margin-right:5px' class='btn btn-danger btn-sm' href='modules/transaksi/proses.php?act=delete&id=$data[id_spk_cabang_baru]'>
                                        <i style='color:#fff' class='glyphicon glyphicon-trash'></i>
                                    </a>";
                            ?>
                            <?php
                                echo "    </div>
                      </td>
                    ";

                                echo "
                    </tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <!--/.col -->
    </div> <!-- /.row -->
</section>
<!-- /.content