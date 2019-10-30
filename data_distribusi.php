<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>
                    Data Distribusi Barang</h3>
            </div>
            <div class="module-body">
                <a class="collapsed btn btn-primary" href="index.php">Kembali</a>
            </div>
            <div class="module-body table">
                <form action="" method="post" class="form-horizontal row-fluid">
                    <div class="control-group">
                        <label class="control-label">No Faktur</label>
                        <div class="controls">
                            <input value="FAK-<?php echo date('md-his')  ?>" readonly type="text" name="faktur" class="span4">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nama Konsumen</label>
                        <div class="controls">
                            <select name="pelanggan">
                                <!-- Php untuk menampilkan data di tb_kategori -->
                                <?php
                                $ambil = $koneksi->query("SELECT * FROM tb_pelanggan");
                                while ($pelanggan = $ambil->fetch_object()) {
                                    ?>
                                    <option value="<?php echo $pelanggan->pelanggan_id ?>"><?php echo $pelanggan->pelanggan_nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tanggal Transaksi</label>
                        <div class="controls">
                            <input type="date" name="tanggal" class="span4">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="submit" name="simpan" class="btn btn-success" value="Lanjut Untuk Memilih Barang">
                        </div>
                    </div>
                </form>
                <!-- Php untuk menyimpan data ke database -->
                <?php
                if (isset($_POST['simpan'])) {
                    $pelanggan    = $_POST['pelanggan'];
                    $faktur   = $_POST['faktur'];
                    $tanggal   = $_POST['tanggal'];

                    $tambah = $koneksi->query("INSERT INTO tb_barang_kel    (pelanggan_id,
                                                                            kel_faktur,
                                                                            kel_tgl) 
                                                                            VALUES ('$pelanggan',
                                                                            '$faktur',
                                                                            '$tanggal')");

                    if ($tambah) {
                        echo "<script>alert('Data berhasil di tambah');</script>";
                        echo "<script>window.location='index.php?page=data_distribusi_lanjut'</script>";
                    } else {
                        echo "<script>alert('Data gagal di tambah');</script>";
                        echo "<script>window.location='index.php?page=data_distribusi_lanjut'</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>