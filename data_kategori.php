<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>
                    Data Kategori</h3>
            </div>
            <div class="module-body">
                <a class="collapsed btn btn-primary" data-toggle="collapse" href="#Tambah">+ Tambah Data</a>
            </div>
            <div class="module-body table">
                <div id="Tambah" class="collapse unstyled">
                    <form action="" method="post" class="form-horizontal row-fluid">
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Nama Kategori</label>
                            <div class="controls">
                                <input type="text" name="nama" placeholder="Nama Kategori" class="span8">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button name="simpan" type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                    <!-- Php untuk menyimpan data ke database -->
                    <?php
                    if (isset($_POST['simpan'])) {
                        $nama = $_POST['nama'];
                        $tambah = $koneksi->query("INSERT INTO tb_kategori (kategori_nama) VALUES ('$nama')");

                        if ($tambah) {
                            echo "<script>alert('Data berhasil di tambah');</script>";
                            echo "<script>window.location='index.php?page=data_kategori'</script>";
                        } else {
                            echo "<script>alert('Data gagal di tambah');</script>";
                            echo "<script>window.location='index.php?page=data_kategori'</script>";
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
                            <th width="110">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Php untuk menampilkan isi dalam tabel -->
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM tb_kategori");
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
                                    <a href="index.php?page=aksi_kategori/kategori_edit&id=<?php echo $pecah->kategori_id ?>" class="btn btn-warning">Edit</a>
                                    <a href="index.php?page=aksi_kategori/kategori_hapus&id=<?php echo $pecah->kategori_id ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>