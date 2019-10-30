<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>
                    Data Barang</h3>
            </div>
            <div class="module-body">
                <h3 class="align-center">Data Barang</h3>
                <p class="text-error"><i>* Urutan barang telah menggunakan metode FIFO</i></p>
                <a class="collapsed btn btn-primary" data-toggle="collapse" href="#Tambah">+ Tambah Data</a>
            </div>
            <div class="module-body table">
                <div id="Tambah" class="collapse unstyled">
                    <form action="" method="post" class="form-horizontal row-fluid">
                        <div class="control-group">
                            <label class="control-label">Kategori</label>
                            <div class="controls">
                                <select name="kategori">
                                    <!-- Php untuk menampilkan data di tb_kategori -->
                                    <?php
                                    $ambil = $koneksi->query("SELECT * FROM tb_kategori");
                                    while ($kategori = $ambil->fetch_object()) {
                                        ?>
                                        <option value="<?php echo $kategori->kategori_id ?>"><?php echo $kategori->kategori_nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Kode Barang</label>
                            <div class="controls">
                                <input type="text" name="kode" placeholder="Kode Barang" class="span8">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Nama Barang</label>
                            <div class="controls">
                                <input type="text" name="nama" placeholder="Nama Barang" class="span8">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Harga Beli</label>
                            <div class="controls">
                                <input type="number" name="beli" placeholder="Harga Beli" class="span8">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Harga Jual</label>
                            <div class="controls">
                                <input type="number" name="jual" placeholder="Harga Jual" class="span8">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Tanggal Masuk</label>
                            <div class="controls">
                                <input type="date" name="tanggal" class="span8">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Stok</label>
                            <div class="controls">
                                <input type="number" name="stok" placeholder="Stok" class="span8">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Satuan</label>
                            <div class="controls">
                                <input value="Pcs" readonly type="text" name="satuan" placeholder="Pcs" class="span8">
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
                        $kat    = $_POST['kategori'];
                        $kode   = $_POST['kode'];
                        $nama   = $_POST['nama'];
                        $beli   = $_POST['beli'];
                        $jual   = $_POST['jual'];
                        $stok   = $_POST['stok'];
                        $satuan = $_POST['satuan'];
                        $ket    = $_POST['ket'];
                        $tanggal    = $_POST['tanggal'];

                        $tambah = $koneksi->query("INSERT INTO tb_barang    (kategori_id,
                                                                            barang_kode,
                                                                            barang_nama,
                                                                            barang_beli,
                                                                            barang_jual,
                                                                            barang_stok,
                                                                            barang_tgl,
                                                                            barang_sat,
                                                                            barang_ket) 
                                                                            VALUES ('$kat',
                                                                            '$kode',
                                                                            '$nama',
                                                                            '$beli',
                                                                            '$jual',
                                                                            '$stok',
                                                                            '$tanggal',
                                                                            '$satuan',
                                                                            '$ket')");

                        if ($tambah) {
                            echo "<script>alert('Data berhasil di tambah');</script>";
                            echo "<script>window.location='index.php?page=data_barang'</script>";
                        } else {
                            echo "<script>alert('Data gagal di tambah');</script>";
                            echo "<script>window.location='index.php?page=data_barang'</script>";
                        }
                    }
                    ?>
                    <hr style=" display: block; height: 1px;border: 0; border-top: 1px solid #ccc;margin: 1em 0; padding: 0;">
                </div>
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
                            <th width="70px">
                                Tanggal Masuk
                            </th>
                            <th width="110">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
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
                                <td>
                                    <a href="index.php?page=aksi_barang/barang_edit&id=<?php echo $pecah->barang_id ?>" class="btn btn-warning">Edit</a>
                                    <a href="index.php?page=aksi_barang/barang_hapus&id=<?php echo $pecah->barang_id ?>" class="btn btn-danger">Hapus</a>
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