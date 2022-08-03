<?php
if ($_GET['module'] == 'spk_cabang_baru_detail') {
    $i = 1;
    $hasil = 0; ?>
    <?php
    if ($_GET['form'] = 'form_edit') {
        $ambil = $mysqli->query("SELECT * FROM spk_cabang_baru_jawaban where id_spk_cabang_baru='$_GET[id_spk]'");
        $rows = mysqli_num_rows($ambil);
        $ambil = $mysqli->query("SELECT * FROM spk_cabang_baru_jawaban where id_spk_cabang_baru='$_GET[id_spk]'");
    } else {
        $ambil = $mysqli->query("SELECT * FROM spk_cabang_baru_jawaban where status='Add'");
        $rows = mysqli_num_rows($ambil);
        $ambil = $mysqli->query("SELECT * FROM spk_cabang_baru_jawaban where status='Add'");
    }

    $hasil_keputusan = array();
    while ($pecah = $ambil->fetch_assoc()) {
        # Luat Tanah
        if ($pecah['luas_tanah'] < 1500) {
            $bobot_lt = 1;
        } else if ($pecah['luas_tanah'] >= 1500 && $pecah['luas_tanah'] < 2000) {
            $bobot_lt = 2;
        } else if ($pecah['luas_tanah'] >= 2000) {
            $bobot_lt = 3;
        }
        #Lokasi berdekatan dengan fasilitas pendidikan
        if ($pecah['lks_dkt_pdk'] >= 3) {
            $bobot_pdk = 1;
        } else if ($pecah['lks_dkt_pdk'] > 1 && $pecah['lks_dkt_pdk'] <= 2) {
            $bobot_pdk = 2;
        } else if ($pecah['lks_dkt_pdk'] <= 1) {
            $bobot_pdk = 3;
        }
        #Lokasi berdekatan dengan pelanggan lama
        if ($pecah['lks_dkt_plg_lama'] <= 30) {
            $bobot_plg = 1;
        } else if ($pecah['lks_dkt_plg_lama'] >= 31 && $pecah['lks_dkt_plg_lama'] <= 60) {
            $bobot_plg = 2;
        } else if ($pecah['lks_dkt_plg_lama'] >= 61) {
            $bobot_plg = 3;
        }
        #Lokasi berdekatan dengan cabang yang lain
        if ($pecah['lks_dkt_cbg'] <= 2) {
            $bobot_cbg = 1;
            #echo $pecah['lks_dkt_cbg'] . " - " . $bobot_cbg . "<br>";
        } else if ($pecah['lks_dkt_cbg'] > 2 && $pecah['lks_dkt_cbg'] <= 4) {
            $bobot_cbg = 2;
            #echo $pecah['lks_dkt_cbg'] . " - " . $bobot_cbg . "<br>";
        } else if ($pecah['lks_dkt_cbg'] > 4) {
            $bobot_cbg = 3;
            #echo $pecah['lks_dkt_cbg'] . " - " . $bobot_cbg . "<br>";
        }
        #Ketesediaan lahan parkir
        if ($pecah['lahan_parkir'] <= 2) {
            $bobot_lp = 1;
        } else if ($pecah['lahan_parkir'] > 2 && $pecah['lahan_parkir'] <= 4) {
            $bobot_lp = 2;
        } else if ($pecah['lahan_parkir'] > 4) {
            $bobot_lp = 3;
        }
        #kriteria harga sewa bangunan
        if ($pecah['harga_sewa'] >= 150000000) {
            $bobot_harga = 1;
        } else if ($pecah['harga_sewa'] >= 100000000 && $pecah['harga_sewa'] < 150000000) {
            $bobot_harga = 2;
        } else if ($pecah['harga_sewa'] < 100000000) {
            $bobot_harga = 3;
        }
        # Matriks Keputusan
        $matriks_keputusan = array();
        $normalisasi = array();
        $matriks_keputusan['bobot_lt'] = $bobot_lt;
        $matriks_keputusan['bobot_pdk'] = $bobot_pdk;
        $matriks_keputusan['bobot_plg'] = $bobot_plg;
        $matriks_keputusan['bobot_cbg'] = $bobot_cbg;
        $matriks_keputusan['bobot_lp'] = $bobot_lp;
        $matriks_keputusan['bobot_harga'] = $bobot_harga;
        $props[] = $matriks_keputusan;
        // Normalisasi Matriks
        if ($i == $rows) {
            foreach ($props as $value) {
                $list_bobot_lt[] = $value['bobot_lt'];
                $list_bobot_pdk[] = $value['bobot_pdk'];
                $list_bobot_plg[] = $value['bobot_plg'];
                $list_bobot_cbg[] = $value['bobot_cbg'];
                $list_bobot_lp[] = $value['bobot_lp'];
                $list_bobot_harga[] = $value['bobot_harga'];
            }
            # Kolom 1
            $j = 0;
            foreach ($list_bobot_lt as $value) {
                $normalisasi_matriks_lt = $value / max($list_bobot_lt);
                # echo $value . " - " . $normalisasi_matriks_lt . "<br>";
                $normalisasi[$j]['normalisasi_lt'] = $normalisasi_matriks_lt;
                $j++;
            }
            //echo "<br>";
            # Kolom 2
            $j = 0;
            foreach ($list_bobot_pdk as $value) {
                $normalisasi_matriks_pdk = $value / max($list_bobot_pdk);
                # echo $value . " - " . $normalisasi_matriks_pdk . "<br>";
                $normalisasi[$j]['normalisasi_matriks_pdk'] = $normalisasi_matriks_pdk;
                $j++;
            }
            //echo "<br>";
            # Kolom 3 
            $j = 0;
            foreach ($list_bobot_plg as $value) {
                $normalisasi_matriks_plg = $value / max($list_bobot_plg);
                #echo $value . " - " . $normalisasi_matriks_plg . "<br>";
                $normalisasi[$j]['normalisasi_matriks_plg'] = $normalisasi_matriks_plg;
                $j++;
            }
            //echo "<br>";
            # Kolom 4 
            $j = 0;
            foreach ($list_bobot_cbg as $value) {
                $normalisasi_matriks_cbg = min($list_bobot_cbg) / $value;
                # echo $value . " - " . $normalisasi_matriks_cbg . "<br>";
                $normalisasi[$j]['normalisasi_matriks_cbg'] = $normalisasi_matriks_cbg;
                $j++;
            }
            //echo "<br>";
            # Kolom 5
            $j = 0;
            foreach ($list_bobot_lp as $value) {
                $normalisasi_matriks_lp = $value / max($list_bobot_lp);
                #echo $value . " - " . $normalisasi_matriks_lp . "<br>";
                $normalisasi[$j]['normalisasi_matriks_lp'] = $normalisasi_matriks_lp;
                $j++;
            }
            //echo "<br>";
            # Kolom 6
            $j = 0;
            foreach ($list_bobot_harga as $value) {
                $normalisasi_matriks_harga = min($list_bobot_harga) / $value;
                #echo $value . " - " . $normalisasi_matriks_harga . "<br>";
                $normalisasi[$j]['normalisasi_matriks_harga'] = $normalisasi_matriks_harga;
                $j++;
            }
            # Hitung
            $k = 0;
            foreach ($normalisasi as $value) {
                $j = 0;
                foreach ($value as $nilai) {
                    if ($j == 0) {
                        $kolom_1 = $nilai * 15;
                        #    echo ($nilai * 15) . "<br>";
                    } else if ($j == 1) {
                        $kolom_2 = $nilai * 15;
                        #   echo ($nilai * 15) . "<br>";
                    } else if ($j == 2) {
                        $kolom_3 = $nilai * 25;
                        #   echo ($nilai * 25) . "<br>";
                    } else if ($j == 3) {
                        $kolom_4 = $nilai * 10;
                        #  echo ($nilai * 10) . "<br>";
                    } else if ($j == 4) {
                        $kolom_5 = $nilai * 15;
                        # echo ($nilai * 15) . "<br>";
                    } else if ($j == 5) {
                        $kolom_6 = $nilai * 20;
                        #echo ($nilai * 20) . "<br>";
                        $hasil = $kolom_1 + $kolom_2 + $kolom_3 + $kolom_4 + $kolom_5 + $kolom_6;
                        $hasil_keputusan[$k] = $hasil;
                        #  echo $hasil . "<br>";
                    }
                    $j++;
                }
                $k++;
            }
            #matriks hasil normalisasi
        }
        $i++;
    }
    ?>
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
                    <form role="form" class="form-horizontal" action="modules/spk_cabang_baru/proses.php?act=konfirmasi" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID SPK</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="id_spk" autocomplete="off" required readonly value="<?= $_GET['id_spk'] ?>">
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
                                        <th scope="col">Hasil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($_GET['form'] = 'form_edit') {
                                        $ambil = $mysqli->query("SELECT * FROM spk_cabang_baru_jawaban where id_spk_cabang_baru='$_GET[id_spk]'");
                                    } else {
                                        $ambil = $mysqli->query("SELECT * FROM spk_cabang_baru_jawaban where status='Add'");
                                    }

                                    $no = 1;
                                    $x = 0;
                                    while ($pecah = $ambil->fetch_assoc()) {
                                        # Luat Tanah
                                        if ($pecah['luas_tanah'] < 1500) {
                                            $bobot_lt = 1;
                                        } else if ($pecah['luas_tanah'] >= 1500 && $pecah['luas_tanah'] < 2000) {
                                            $bobot_lt = 2;
                                        } else if ($pecah['luas_tanah'] >= 2000) {
                                            $bobot_lt = 3;
                                        }
                                        #Lokasi berdekatan dengan fasilitas pendidikan
                                        if ($pecah['lks_dkt_pdk'] >= 3) {
                                            $bobot_pdk = 1;
                                        } else if ($pecah['lks_dkt_pdk'] > 1 && $pecah['lks_dkt_pdk'] <= 2) {
                                            $bobot_pdk = 2;
                                        } else if ($pecah['lks_dkt_pdk'] <= 1) {
                                            $bobot_pdk = 3;
                                        }
                                        #Lokasi berdekatan dengan pelanggan lama
                                        if ($pecah['lks_dkt_plg_lama'] <= 30) {
                                            $bobot_plg = 1;
                                        } else if ($pecah['lks_dkt_plg_lama'] >= 31 && $pecah['lks_dkt_plg_lama'] <= 60) {
                                            $bobot_plg = 2;
                                        } else if ($pecah['lks_dkt_plg_lama'] >= 61) {
                                            $bobot_plg = 3;
                                        }
                                        #Lokasi berdekatan dengan cabang yang lain
                                        if ($pecah['lks_dkt_cbg'] <= 2) {
                                            $bobot_cbg = 1;
                                            #echo $pecah['lks_dkt_cbg'] . " - " . $bobot_cbg . "<br>";
                                        } else if ($pecah['lks_dkt_cbg'] > 2 && $pecah['lks_dkt_cbg'] <= 4) {
                                            $bobot_cbg = 2;
                                            #echo $pecah['lks_dkt_cbg'] . " - " . $bobot_cbg . "<br>";
                                        } else if ($pecah['lks_dkt_cbg'] > 4) {
                                            $bobot_cbg = 3;
                                            #echo $pecah['lks_dkt_cbg'] . " - " . $bobot_cbg . "<br>";
                                        }
                                        #Ketesediaan lahan parkir
                                        if ($pecah['lahan_parkir'] <= 2) {
                                            $bobot_lp = 1;
                                        } else if ($pecah['lahan_parkir'] > 2 && $pecah['lahan_parkir'] <= 4) {
                                            $bobot_lp = 2;
                                        } else if ($pecah['lahan_parkir'] > 4) {
                                            $bobot_lp = 3;
                                        }
                                        #kriteria harga sewa bangunan
                                        if ($pecah['harga_sewa'] >= 150000000) {
                                            $bobot_harga = 1;
                                        } else if ($pecah['harga_sewa'] >= 100000000 && $pecah['harga_sewa'] < 150000000) {
                                            $bobot_harga = 2;
                                        } else if ($pecah['harga_sewa'] < 100000000) {
                                            $bobot_harga = 3;
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?php echo $pecah['nama_kota'] ?></td>
                                            <td><?php echo $pecah['alamat'] ?></td>
                                            <td><?php echo $bobot_lt ?></td>
                                            <td><?php echo $bobot_pdk ?></td>
                                            <td><?php echo $bobot_plg ?></td>
                                            <td><?php echo $bobot_cbg ?></td>
                                            <td><?php echo $bobot_lp ?></td>
                                            <td><?php echo $bobot_harga ?></td>
                                            <td><input type="text" name="hasil_keputusan_<?= $pecah['id_jawaban'] ?>" id="" value="<?php echo $hasil_keputusan[$x] ?>"></td>
                                        </tr>
                                    <?php
                                        $x++;
                                    }
                                    $max = max($hasil_keputusan);
                                    ?>
                                </tbody>
                            </table>
                        </div><!-- /.box body -->
                        <div class="box-footer" style="margin-top: 20px;" class=" form-vertical">
                            <div class="row" style="float:right;">

                                <div class="row">
                                    <div class="col-sm-5">
                                        <?php
                                        if ($_GET['form'] = 'form_edit') { ?>
                                            <a href="?module=form_spk_cabang_baru&form=edit&id=<?= $_GET['id_spk'] ?>" class="btn btn-default btn-reset">Kembali</a>
                                        <?php } else {
                                        ?>
                                            <a href="?module=form_spk_cabang_baru&form=add" class="btn btn-default btn-reset">Kembali</a>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="col-sm-6" style="float: right;">
                                        <input type="hidden" name="row" value="<?= $x ?>">
                                        <?php
                                        if ($_GET['form'] = 'form_edit') { ?>
                                            <input type="submit" class="btn btn-primary btn-submit" name="simpan_edit" value="Simpan">
                                        <?php } else {
                                        ?>
                                            <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                                        <?php
                                        }
                                        ?>
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