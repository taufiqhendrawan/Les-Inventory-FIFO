<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>
                    Data Supply Barang</h3>
            </div>
            <div class="module-body">
                <a class="collapsed btn btn-primary" data-toggle="collapse" href="#Tambah">+ Tambah Data</a>
            </div>
            <div class="module-body table">
                <div id="Tambah" class="collapse unstyled">
                    <form action="" method="post" class="form-horizontal row-fluid">
                        <div class="control-group">
                            <label class="control-label">Nama Supplier</label>
                            <div class="controls">
                                <select name="supplier">
                                    <!-- Php untuk menampilkan data di tb_kategori -->
                                    <?php
                                    $ambil_suppplier = $koneksi->query("SELECT * FROM tb_supplier");
                                    while ($supplier = $ambil_suppplier->fetch_object()) {
                                        ?>
                                        <option value="<?php echo $supplier->supplier_id ?>"><?php echo $supplier->supplier_nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Faktur Supply Barang</label>
                            <div class="controls">
                                <input type="text" name="faktur" placeholder="Faktur Supply Barang" class="span8">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Nama Barang</label>
                            <div class="controls">
                                <select name="barang">
                                    <!-- Php untuk menampilkan data di tb_kategori -->
                                    <?php
                                    $ambil1 = $koneksi->query("SELECT * FROM tb_barang");
                                    while ($barang = $ambil1->fetch_object()) {
                                        ?>
                                        <option value="<?php echo $barang->barang_id ?>"><?php echo $barang->barang_nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Jumlah Barang</label>
                            <div class="controls">
                                <input type="number" name="jumlah" placeholder="Jumlah Barang" class="span8">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Tanggal Masuk</label>
                            <div class="controls">
                                <input type="date" name="tanggal" class="span3">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Keterangan</label>
                            <div class="controls">
                                <input type="text" name="ket" placeholder="Keterangan" class="span8">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
                            </div>
                        </div>
                    </form>
                    <!-- Php untuk menyimpan data ke database -->
                    <?php
                    if (isset($_POST['simpan'])) {
                        $supplier     = $_POST['supplier'];
                        $barang       = $_POST['barang'];
                        $faktur       = $_POST['faktur'];
                        $jumlah       = $_POST['jumlah'];
                        $tanggal      = $_POST['tanggal'];
                        $ket          = $_POST['ket'];

                        $tambah = $koneksi->query("INSERT INTO tb_barang_msk (supplier_id,barang_id,msk_faktur,msk_jumlah,msk_tgl,msk_ket) VALUES ('$supplier','$barang','$faktur','$jumlah','$tanggal','$ket')");

                        $nilai = $koneksi->query("SELECT * FROM tb_barang WHERE barang_id='$barang'");
                        $tangkap = $nilai->fetch_object();

                        $stok_lama = $tangkap->barang_stok;

                        $stok_baru = $jumlah + $stok_lama;

                        $nilai = $koneksi->query("UPDATE tb_barang SET barang_stok='$stok_baru',barang_tgl='$tanggal' WHERE barang_id='$barang'");


                        if ($tambah) {
                            echo "<script>alert('Data berhasil di tambah');</script>";
                            echo "<script>window.location='index.php?page=data_supply'</script>";
                        } else {
                            echo "<script>alert('Data gagal di tambah');</script>";
                            echo "<script>window.location='index.php?page=data_supply'</script>";
                        }
                    }
                    ?>
                    <hr style=" display: block; height: 1px;border: 0; border-top: 1px solid #ccc;margin: 1em 0; padding: 0;">
                </div>
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display" width="100%">
                    <thead>
                        <tr>
                            <th width="10">No</th>
                            <th>
                                Nama Supplier
                            </th>
                            <th>
                                Faktur Supply
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
                                Tanggal Masuk
                            </th>
                            <th>
                                Keterangan
                            </th>
                            <th width="60">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Php untuk menampilkan isi dalam tabel -->
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM tb_barang_msk JOIN tb_barang ON tb_barang_msk.barang_id=tb_barang.barang_id JOIN tb_supplier ON tb_barang_msk.supplier_id=tb_supplier.supplier_id");
                        while ($pecah = $ambil->fetch_object()) {
                            ?>
                            <tr class="odd gradeX">
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $pecah->supplier_nama ?>
                                </td>
                                <td>
                                    <?php echo $pecah->msk_faktur ?>
                                </td>
                                <td>
                                    <?php echo $pecah->barang_kode ?>
                                </td>
                                <td>
                                    <?php echo $pecah->barang_nama ?>
                                </td>
                                <td>
                                    <?php echo $pecah->msk_jumlah ?>
                                </td>
                                <td>
                                    <?php echo $pecah->msk_tgl ?>
                                </td>
                                <td>
                                    <?php echo $pecah->msk_ket ?>
                                </td>
                                <td>
                                    <a href="index.php?page=aksi_supply/supply_hapus&id=<?php echo $pecah->msk_id ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
</div>