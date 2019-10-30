<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>
                    Data Edit Kategori</h3>
            </div>
            <div class="module-body">
                <a class="collapsed btn btn-primary" href="index.php?page=data_kategori">Kembali</a>
            </div>
            <div class="module-body table">
                <div>
                    <?php
                    $id = $_GET['id'];
                    $ambil = $koneksi->query("SELECT * FROM tb_kategori WHERE kategori_id=$id");
                    while ($pecah = $ambil->fetch_object()) {
                        ?>

                        <form action="" method="post" class="form-horizontal row-fluid">
                            <div class="control-group">
                                <label class="control-label">Nama Kategori</label>
                                <div class="controls">
                                    <input value="<?php echo $pecah->kategori_id ?>" type="hidden" name="id" class="span8">
                                    <input value="<?php echo $pecah->kategori_nama ?>" type="text" name="nama" placeholder="Nama Kategori" class="span8">
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
                        $id = $_POST['id']; //Mendapatkan id
                        $nama = $_POST['nama'];

                        $edit = $koneksi->query("UPDATE tb_kategori SET kategori_nama ='$nama' WHERE kategori_id='$id'");

                        if ($edit) {
                            echo "<script>alert('Data berhasil di edit');</script>";
                            echo "<script>window.location='index.php?page=data_kategori'</script>";
                        } else {
                            echo "<script>alert('Data gagal di edit');</script>";
                            echo "<script>window.location='index.php?page=data_kategori'</script>";
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