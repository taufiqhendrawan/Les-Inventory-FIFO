<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>
                    Data Edit Barang</h3>
            </div>
            <div class="module-body">
                <a class="collapsed btn btn-primary" href="index.php?page=data_barang">Kembali</a>
            </div>
            <div class="module-body table">
                <div>
                    <?php
                    $id = $_GET['id']; //Mendapatkan id
                    $ambil = $koneksi->query("SELECT * FROM tb_barang WHERE barang_id=$id");
                    while ($pecah = $ambil->fetch_object()) {
                        ?>
                        <form action="" method="post" class="form-horizontal row-fluid">
                            <input value="<?php echo $pecah->barang_id ?>" type="hidden" name="id" class="span8">
                            <div class="control-group">
                                <label class="control-label">barang</label>
                                <div class="controls">
                                    <select name="kategori">
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
                                    <input value="<?php echo $pecah->barang_kode ?>" type="text" name="kode" placeholder="Kode Barang" class="span8">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nama Barang</label>
                                <div class="controls">
                                    <input value="<?php echo $pecah->barang_nama ?>" type="text" name="nama" placeholder="Nama Barang" class="span8">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Harga Beli</label>
                                <div class="controls">
                                    <input value="<?php echo $pecah->barang_beli ?>" type="number" name="beli" placeholder="Harga Beli" class="span8">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Harga Jual</label>
                                <div class="controls">
                                    <input value="<?php echo $pecah->barang_jual ?>" type="number" name="jual" placeholder="Harga Jual" class="span8">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Stok</label>
                                <div class="controls">
                                    <input value="<?php echo $pecah->barang_stok ?>" type="number" name="stok" placeholder="Stok" class="span8">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Satuan</label>
                                <div class="controls">
                                    <input value="Pcs" readonly name="satuan" placeholder="Pcs" class="span8">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Keterangan</label>
                                <div class="controls">
                                    <input value="<?php echo $pecah->barang_ket ?>" type="text" name="ket" placeholder="Keterangan" class="span8">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="submit" name="edit" class="btn btn-success" value="Simpan">
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                    <?php
                    if (isset($_POST['edit'])) {
                        $id       = $_POST['id'];

                        $kat      = $_POST['kategori'];
                        $kode     = $_POST['kode'];
                        $nama     = $_POST['nama'];
                        $beli     = $_POST['beli'];
                        $jual     = $_POST['jual'];
                        $stok     = $_POST['stok'];
                        $satuan   = $_POST['satuan'];
                        $ket      = $_POST['ket'];

                        $edit = $koneksi->query("UPDATE tb_barang SET   kategori_id       = '$kat',
                                                                        barang_kode       = '$kode',
                                                                        barang_nama       = '$nama',
                                                                        barang_beli       = '$beli',
                                                                        barang_jual       = '$jual',
                                                                        barang_stok       = '$stok',
                                                                        barang_sat        = '$satuan',
                                                                        barang_ket        = '$ket'
                                                                        WHERE barang_id   = '$id'");

                        if ($edit) {
                            echo "<script>alert('Data berhasil di edit');</script>";
                            echo "<script>window.location='index.php?page=data_barang'</script>";
                        } else {
                            echo "<script>alert('Data gagal di edit');</script>";
                            echo "<script>window.location='index.php?page=data_barang'</script>";
                        }
                    }
                    ?>
                    <hr style=" display: block; height: 1px;border: 0; border-top: 1px solid #ccc;margin: 1em 0; padding: 0;">
                </div>
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
</div>