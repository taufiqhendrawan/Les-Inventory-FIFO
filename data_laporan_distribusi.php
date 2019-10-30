<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>
                    Laporan Distribusi Barang</h3>
            </div>
            <div class="module-body">
                <a class="btn btn-primary" target="_blank" href="aksi_laporan/cetak_distribusi.php">Cetak</a>
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
                                Tanggal
                            </th>
                            <th>
                                Nama Konsumen
                            </th>
                            <th>
                                No. Tlp
                            </th>
                            <th>
                                Nama Barang
                            </th>
                            <th>
                                Jumlah
                            </th>
                            <th>
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Php untuk menampilkan isi dalam tabel -->
                        <?php
                        $total = 0;
                        $ambil = $koneksi->query("SELECT * FROM tb_barang_kel 
                                    JOIN tb_detail_kel ON tb_barang_kel.kel_id=tb_detail_kel.kel_id 
                                    JOIN tb_barang ON tb_detail_kel.barang_id=tb_barang.barang_id 
                                    JOIN tb_pelanggan ON tb_barang_kel.pelanggan_id=tb_pelanggan.pelanggan_id");
                        while ($pecah = $ambil->fetch_object()) {
                            $total += $pecah->detail_total;
                            ?>
                            <tr class="odd gradeX">
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $pecah->kel_faktur ?>
                                </td>
                                <td>
                                    <?php echo $pecah->kel_tgl ?>
                                </td>
                                <td>
                                    <?php echo $pecah->pelanggan_nama ?>
                                </td>
                                <td>
                                    <?php echo $pecah->pelanggan_tlp ?>
                                </td>
                                <td>
                                    <?php echo $pecah->barang_nama ?>
                                </td>
                                <td>
                                    <?php echo $pecah->detail_jumlah ?>
                                </td>
                                <td>
                                    <?php echo rupiah($pecah->detail_total) ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="7">Total :</td>
                            <td colspan="1"><?php echo rupiah($total); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>