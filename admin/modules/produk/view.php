<section class="content-header">
    <h1>
        <i class="fa fa-folder-o icon-title"></i> Data produk
        <a class="btn btn-primary btn-social pull-right" href="?module=form_produk&form=add" title="Tambah Data" data-toggle="tooltip">
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
            // tampilkan pesan Sukses "Data produk baru berhasil disimpan"
            elseif ($_GET['alert'] == 1) {
                echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data produk baru berhasil disimpan.
            </div>";
            }
            // jika alert = 2
            // tampilkan pesan Sukses "Data produk berhasil diubah"
            elseif ($_GET['alert'] == 2) {
                echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data produk berhasil diubah.
            </div>";
            }
            // jika alert = 3
            // tampilkan pesan Sukses "Data produk berhasil dihapus"
            elseif ($_GET['alert'] == 3) {
                echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data produk berhasil dihapus.
            </div>";
            }
            ?>

            <div class="box box-primary">
                <div class="box-body">
                    <!-- tampilan tabel produk -->
                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <!-- tampilan tabel header -->
                        <thead>
                            <tr>
                                <th class="center">No.</th>
                                <th class="center">ID Produk</th>
                                <th class="center">Nama Produk</th>
                                <th class="center">Kategori</th>
                                <th class="center">Harga Jual</th>
                                <th class="center">Deskripsi Produk</th>
                                <th class="center">Stok</th>
                                <th class="center">Foto</th>
                                <th class="center">Action</th>
                            </tr>
                        </thead>
                        <!-- tampilan tabel body -->
                        <tbody>
                            <?php
                            $no = 1;
                            // fungsi query untuk menampilkan data dari tabel produk
                            $query = mysqli_query($mysqli, "SELECT * FROM produk")
                                or die('Ada kesalahan pada query tampil Data produk: ' . mysqli_error($mysqli));

                            // tampilkan data
                            while ($data = mysqli_fetch_assoc($query)) {
                                //   $harga_beli = format_rupiah($data['harga_beli']);
                                //   $harga_jual = format_rupiah($data['harga_jual']);
                                // menampilkan isi tabel dari database ke tabel di aplikasi
                                echo "<tr>
                      <td width='50' class='center'>$no</td>
                      <td width='150' class='center'>$data[id_produk]</td>
                      <td width='150' class='center'>$data[nama_produk]</td>
                      <td width='150' class='center'>$data[kategori]</td>
                      <td width='150' class='center'>$data[harga_jual]</td>
                      <td width='150' class='center'>$data[deskripsi]</td>
                      <td width='150' class='center'>$data[stok]</td>
                      <td width='100'><center><img src='images/" . $data['gambar'] . "' width='100' height='100'></center></td>
                    <td class='center' width='100'>
                        <div>
                        <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_produk&form=edit&id=$data[id_produk]'>
                            <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                        </a>
                        <a data-toggle='tooltip' data-placement='top' title='Delete' style='margin-right:5px' class='btn btn-primary btn-sm' href='modules/produk/proses.php?act=delete&id=$data[id_produk]'>
                                        <i style='color:#fff' class='glyphicon glyphicon-trash'></i>
                                    </a>
                        </div>";
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