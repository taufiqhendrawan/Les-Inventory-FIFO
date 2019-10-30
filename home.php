<div class="span9">
    <div class="content">
        <div class="btn-controls">
            <div class="btn-box-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <?php
                        // Mengitung baris tb barang
                        $tbarang = $koneksi->query("SELECT * FROM tb_barang");
                        $barang = $tbarang->num_rows;
                        // Mengitung baris tb pelanggan
                        $tpelanggan = $koneksi->query("SELECT * FROM tb_pelanggan");
                        $pelanggan = $tpelanggan->num_rows;
                        // Mengitung baris tb supplier
                        $tsupplier = $koneksi->query("SELECT * FROM tb_supplier");
                        $supplier = $tsupplier->num_rows;
                        // Mengitung baris tb pengguna
                        $tpengguna = $koneksi->query("SELECT * FROM tb_pengguna");
                        $pengguna = $tpengguna->num_rows;
                        ?>
                        <div class="span12">
                            <a href="index.php?page=data_barang" class="btn-box small span3">
                                <i class="icon-table"></i><b>Barang<br><?php echo $barang ?></b>
                            </a>
                            <a href="index.php?page=data_pelanggan" class="btn-box small span3">
                                <i class="icon-group"></i><b>Konsumen<br><?php echo $pelanggan ?></b>
                            </a>
                            <a href="index.php?page=data_supplier" class="btn-box small span3">
                                <i class="icon-exchange"></i><b>Supplier<br><?php echo $supplier ?></b>
                            </a>
                            <a href="index.php?page=data_pengguna" class="btn-box small span3">
                                <i class="icon-user"></i><b>Pengguna<br><?php echo $pengguna ?></b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>