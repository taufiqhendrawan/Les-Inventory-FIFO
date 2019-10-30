<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>
                    Data Distribusi Barang</h3>
            </div>
            <div class="module-body">
                <a class="collapsed btn btn-primary" href="index.php?page=data_distribusi">Kembali</a>
                <h3 class="align-center">Pilih Barang Yang Telah Tersedia</h3>
                <p class="text-error"><i>* Urutan barang telah menggunakan metode FIFO</i></p>
            </div>
            <div class="module-body table">
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display" width="100%">
                    <thead>
                        <tr>
                            <th width="10">
                                No
                            </th>
                            <th>
                                Nama Kategori
                            </th>
                            <th>
                                Kode Barang
                            </th>
                            <th>
                                Nama Barang
                            </th>
                            <th>
                                Harga
                            </th>
                            <th>
                                Stok
                            </th>
                            <th>
                                Tanggal Masuk
                            </th>
                            <!-- <th>
                                Keterangan
                            </th> -->
                            <th width="48">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Php untuk menampilkan isi dalam tabel -->
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM tb_barang JOIN tb_kategori ON tb_barang.kategori_id=tb_kategori.kategori_id ORDER BY tb_barang.barang_tgl ASC");
                        while ($pecah = $ambil->fetch_object()) {
                            ?>
                            <tr class="odd gradeX">
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $pecah->kategori_nama ?>
                                </td>
                                <td>
                                    <?php echo $pecah->barang_kode ?>
                                </td>
                                <td>
                                    <?php echo $pecah->barang_nama ?>
                                </td>
                                <td>
                                    <?php echo rupiah($pecah->barang_jual) ?>
                                </td>
                                <td>
                                    <?php echo $pecah->barang_stok ?>
                                </td>
                                <td>
                                    <?php echo tgl_indo($pecah->barang_tgl) ?>
                                </td>
                                <td>

                                    <button type="button" class="btn btn-info btn-outline-primary block btn-m" data-toggle="modal" data-target="#default<?php echo $pecah->barang_id ?>">
                                        Pilih
                                    </button>


                                </td>
                            </tr>
                            <!-- Modal 2 -->

                            <div class="modal fade text-left" id="default<?php echo $pecah->barang_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="" method="post">

                                            <input type="hidden" name="barang_id" value="<?php echo $pecah->barang_id ?>">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel1"><?= $pecah->barang_kode ?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="control-group">
                                                    <label class="control-label"><strong>Nama Barang :</strong> <strong class="text-info"><?= $pecah->barang_nama ?></strong></label>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><strong>Harga : </strong> <strong class="text-success"><?= rupiah($pecah->barang_jual) ?></strong></label>
                                                    <div class="controls">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="basicinput"><strong>Jumlah : </strong><input autofocus="autofocus" name="jumlah" type="text" class="span1"></label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                                <input name="simpanmodal" value="Simpan" type="submit" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php
                        if (isset($_POST['simpanmodal'])) {

                            $barang = $_POST['barang_id'];
                            $jumlah = $_POST['jumlah'];

                            // Proses Pengambilan total
                            $ambil_barang = $koneksi->query("SELECT * FROM tb_barang WHERE barang_id = $barang");
                            $pecah_barang = $ambil_barang->fetch_object();
                            $harga = $pecah_barang->barang_jual;
                            // Proses Pengambilan kel_id
                            $ambil_kel = $koneksi->query("SELECT * FROM tb_barang_kel ORDER BY kel_id DESC LIMIT 1");
                            $pecah_kel = $ambil_kel->fetch_object();
                            $kel = $pecah_kel->kel_id;
                            // Dapat totalkan 
                            $total = $jumlah * $harga;
                            // Proses simpan ke tb_detail
                            $tambah = $koneksi->query("INSERT INTO `tb_detail_kel` (kel_id,
                                                                                    barang_id,
                                                                                    detail_jumlah,
                                                                                    detail_total) VALUES (
                                                                                    '$kel',
                                                                                    '$barang',
                                                                                    '$jumlah',
                                                                                    '$total'
                                                                                    )");
                            // Update stok barang
                            $a = $koneksi->query("SELECT * FROM tb_barang WHERE barang_id = $barang ");
                            $haha = $a->fetch_object();
                            $stok_lama = $haha->barang_stok;
                            $hasil = $stok_lama - $jumlah;
                            $koneksi->query("UPDATE `tb_barang` SET `barang_stok`='$hasil' WHERE `barang_id`=$barang");

                            if ($tambah) {
                                echo "<script>alert('Data berhasil di tambah');</script>";
                                echo header('index.php?page=data_distribusi');
                                echo "<script>window . open('aksi_distribusi/cetak.php', '_blank')</script>";
                            } else {
                                echo "<script>alert('Data gagal di tambah');</script>";
                                echo "<script>window.location='index.php?page=data_distribusi'</script>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <hr style=" display: block; height: 1px;border: 0; border-top: 1px solid #ccc;margin: 1em 0; padding: 0;">
                <!-- tabel -->
                <?php
                $ambil_kel = $koneksi->query("SELECT * FROM tb_barang_kel ORDER BY kel_id DESC LIMIT 1");
                $pecah_kel = $ambil_kel->fetch_object();
                $kel = $pecah_kel->kel_id;

                $ambil_konsumen = $koneksi->query("SELECT * FROM tb_barang_kel JOIN tb_detail_kel ON tb_barang_kel.kel_id=tb_detail_kel.kel_id JOIN tb_barang ON tb_detail_kel.barang_id=tb_barang.barang_id JOIN tb_pelanggan ON tb_barang_kel.pelanggan_id=tb_pelanggan.pelanggan_id WHERE tb_barang_kel.kel_id=$kel");
                $ambil_detail = $ambil_konsumen->fetch_object();
                ?>

                <div class="module-body">
                    <p>
                        <?php echo "Nama Konsumen : " . $ambil_detail->pelanggan_nama ?><br>
                        <?php echo "No. Telp Konsumen : " . $ambil_detail->pelanggan_tlp ?> <br>
                        <?php echo "Alamat Konsumen : " . $ambil_detail->pelanggan_alamat ?>
                    </p>
                    <a target="_blank" class="collapsed btn btn-primary" href="aksi_distribusi/cetak.php?id=<?php echo $kel ?>">Cetak</a>
                </div>
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display" width="100%">
                    <thead>
                        <tr>
                            <th width="10">
                                No
                            </th>
                            <th>
                                Kode Barang
                            </th>
                            <th>
                                Nama Barang
                            </th>
                            <th>
                                Jumlah
                            </th>
                            <th>
                                Satuan
                            </th>
                            <th>
                                Harga
                            </th>
                            <th width="65">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Php untuk menampilkan isi dalam tabel -->
                        <?php
                        $ambil_kel = $koneksi->query("SELECT * FROM tb_barang_kel ORDER BY kel_id DESC LIMIT 1");
                        $pecah_kel = $ambil_kel->fetch_object();
                        $kel = $pecah_kel->kel_id;

                        $ambil_konsumen = $koneksi->query("SELECT * FROM tb_barang_kel JOIN tb_detail_kel ON tb_barang_kel.kel_id=tb_detail_kel.kel_id JOIN tb_barang ON tb_detail_kel.barang_id=tb_barang.barang_id JOIN tb_pelanggan ON tb_barang_kel.pelanggan_id=tb_pelanggan.pelanggan_id WHERE tb_barang_kel.kel_id=$kel");
                        while ($pecah_konsumen = $ambil_konsumen->fetch_object()) {
                            ?>
                            ?>
                            <tr class="odd gradeX">
                                <td>
                                    <?php echo $nodua++ ?>
                                </td>
                                <td>
                                    <?php echo $pecah_konsumen->barang_kode ?>
                                </td>
                                <td>
                                    <?php echo $pecah_konsumen->barang_nama ?>
                                </td>
                                <td>
                                    <?php echo $pecah_konsumen->detail_jumlah ?>
                                </td>
                                <td>
                                    <?php echo $pecah_konsumen->barang_sat ?>
                                </td>
                                <td>
                                    <?php echo rupiah($pecah_konsumen->barang_jual) ?>
                                </td>
                                <td>
                                    <a href="index.php?page=aksi_distribusi/distribusi_hapus&id=<?php echo $pecah_konsumen->detail_id ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- body -->
        </div>
    </div>
</div>