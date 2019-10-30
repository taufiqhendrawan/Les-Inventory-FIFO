<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>
                    Data Edit Pengguna</h3>
            </div>
            <div class="module-body">
                <a class="collapsed btn btn-primary" href="index.php?page=data_pengguna">Kembali</a>
            </div>
            <div class="module-body table">
                <div>
                    <?php
                    $id = $_GET['id'];
                    $ambil = $koneksi->query("SELECT * FROM tb_pengguna WHERE pengguna_id=$id");
                    while ($pecah = $ambil->fetch_object()) {
                        ?>
                        <form action="" method="post" class="form-horizontal row-fluid">
                            <div class="control-group">
                                <label class="control-label">Username</label>
                                <div class="controls">
                                    <input value="<?php echo $pecah->pengguna_id ?>" type="hidden" name="id" class="span8">
                                    <input value="<?php echo $pecah->pengguna_user ?>" type="text" name="user" placeholder="Username" class="span8">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Password</label>
                                <div class="controls">
                                    <input value="<?php echo $pecah->pengguna_pass ?>" type="text" name="pass" placeholder="Password" class="span8">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nama</label>
                                <div class="controls">
                                    <input value="<?php echo $pecah->pengguna_nama ?>" type="text" name="nama" placeholder="Nama" class="span8">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Level</label>
                                <div class="controls">
                                    <select name="level">
                                        <option value="Admin">Admin</option>
                                        <option value="Pimpinan">Pimpinan</option>
                                        <option value="Staff Gudang">Staff Gudang</option>
                                        <option value="Front Office">Front Office</option>
                                    </select>
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
                        $id = $_POST['id'];
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $nama = $_POST['nama'];
                        $level = $_POST['level'];

                        $edit = $koneksi->query("UPDATE tb_pengguna SET pengguna_user ='$user',
                                                                        pengguna_pass ='$pass',
                                                                        pengguna_nama ='$nama',
                                                                        pengguna_level ='$level' WHERE pengguna_id='$id'");

                        if ($edit) {
                            echo "<script>alert('Data berhasil di edit');</script>";
                            echo "<script>window.location='index.php?page=data_pengguna'</script>";
                        } else {
                            echo "<script>alert('Data gagal di edit');</script>";
                            echo "<script>window.location='index.php?page=data_pengguna'</script>";
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