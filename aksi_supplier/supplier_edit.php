<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>
                    Data Edit Supplier</h3>
            </div>
            <div class="module-body">
                <a class="collapsed btn btn-primary" href="index.php?page=data_supplier">Kembali</a>
            </div>
            <div class="module-body table">
                <div>
                    <?php
                    $id = $_GET['id'];
                    $ambil = $koneksi->query("SELECT * FROM tb_supplier WHERE supplier_id=$id");
                    while ($pecah = $ambil->fetch_object()) {
                        ?>

                        <form action="" method="post" class="form-horizontal row-fluid">
                            <div class="control-group">
                                <label class="control-label">Nama Supplier</label>
                                <div class="controls">
                                    <input value="<?php echo $pecah->supplier_id ?>" type="hidden" name="id" placeholder="Nama Barang" class="span8">
                                    <input value="<?php echo $pecah->supplier_nama ?>" type="text" name="nama" placeholder="Nama Barang" class="span8">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Alamat</label>
                                <div class="controls">
                                    <input value="<?php echo $pecah->supplier_alamat ?>" type="text" name="alamat" placeholder="Harga Beli" class="span8">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">No Telpon</label>
                                <div class="controls">
                                    <input value="<?php echo $pecah->supplier_tlp ?>" type="text" name="tlp" placeholder="Harga Jual" class="span8">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                    <?php
                    if (isset($_POST['simpan'])) {
                        $id       = $_POST['id'];
                        $nama     = $_POST['nama'];
                        $alamat   = $_POST['alamat'];
                        $tlp      = $_POST['tlp'];

                        $edit = $koneksi->query("UPDATE tb_supplier SET supplier_nama='$nama',
                                                                        supplier_alamat='$alamat',supplier_tlp='$tlp' WHERE supplier_id='$id'");

                        if ($edit) {
                            echo "<script>alert('Data berhasil di edit');</script>";
                            echo "<script>window.location='index.php?page=data_supplier'</script>";
                        } else {
                            echo "<script>alert('Data gagal di edit');</script>";
                            echo "<script>window.location='index.php?page=data_supplier'</script>";
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