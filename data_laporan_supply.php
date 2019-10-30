<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>
                    Laporan Supply Barang</h3>
            </div>
            <div class="module-body">
                <a class="btn btn-primary" target="_blank" href="aksi_laporan/cetak_supply.php">Cetak</a>
            </div>
            <div class="module-body table">
                <table class=" table table-bordered table-striped display" width="100%">
                    <thead>
                        <tr>
                            <th width="10">
                                No
                            </th>
                            <th>
                                No Faktur
                            </th>
                            <th>
                                Nama Supplier
                            </th>
                            <th>
                                Nama Barang
                            </th>
                            <th>
                                Kode Barang
                            </th>
                            <th>
                                Jumlah Barang
                            </th>
                            <th>
                                Stok
                            </th>
                            <th>
                                Satuan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Php untuk menampilkan isi dalam tabel -->
                        <?php
                        $total = 0;
                        $ambil = $koneksi->query("SELECT * FROM `tb_barang_msk`JOIN tb_supplier ON  tb_barang_msk.supplier_id=tb_supplier.supplier_id JOIN tb_barang ON tb_barang_msk.barang_id=tb_barang.barang_id ORDER BY tb_barang_msk.msk_tgl DESC");
                        while ($pecah = $ambil->fetch_object()) {
                            $total += $pecah->detail_total;
                            ?>
                            <tr class="odd gradeX">
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $pecah->msk_faktur ?>
                                </td>
                                <td>
                                    <?php echo $pecah->supplier_nama ?>
                                </td>
                                <td>
                                    <?php echo $pecah->barang_nama ?>
                                </td>
                                <td>
                                    <?php echo $pecah->barang_kode ?>
                                </td>
                                <td>
                                    <?php echo $pecah->msk_jumlah ?>
                                </td>
                                <td>
                                    <?php echo $pecah->barang_stok ?>
                                </td>
                                <td>
                                    <?php echo $pecah->barang_sat ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>