<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>
                    Laporan Data Barang</h3>
            </div>
            <div class="module-body">
                <a class="btn btn-primary" target="_blank" href="aksi_laporan/cetak_barang.php">Cetak</a>
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
                                Harga Beli
                            </th>
                            <th>
                                Harga Jual
                            </th>
                            <th>
                                Stok
                            </th>
                            <th>
                                Tanggal Masuk
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
                                    <?php echo rupiah($pecah->barang_beli) ?>
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
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>