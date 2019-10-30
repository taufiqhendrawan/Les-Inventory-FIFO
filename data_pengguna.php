<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>
                    Data Pengguna</h3>
            </div>
            <div class="module-body">
                <a class="collapsed btn btn-primary" data-toggle="collapse" href="#Tambah">+ Tambah Data</a>
            </div>
            <div class="module-body table">
                <div id="Tambah" class="collapse unstyled">
                    <form action="" method="post" class="form-horizontal row-fluid">
                        <div class="control-group">
                            <label class="control-label">Username</label>
                            <div class="controls">
                                <input type="text" name="user" placeholder="Username" class="span8">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input type="text" name="pass" placeholder="Password" class="span8">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Nama</label>
                            <div class="controls">
                                <input type="text" name="nama" placeholder="Nama" class="span8">
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

                    <!-- Php untuk menyimpan data ke database -->
                    <?php
                    if (isset($_POST['simpan'])) {
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $nama = $_POST['nama'];
                        $level = $_POST['level'];

                        $tambah = $koneksi->query("INSERT INTO tb_pengguna (pengguna_user,pengguna_pass,pengguna_nama,pengguna_level) VALUES ('$user','$pass','$nama','$level')");

                        if ($tambah) {
                            echo "<script>alert('Data berhasil di tambah');</script>";
                            echo "<script>window.location='index.php?page=data_pengguna'</script>";
                        } else {
                            echo "<script>alert('Data gagal di tambah');</script>";
                            echo "<script>window.location='index.php?page=data_pengguna'</script>";
                        }
                    }
                    ?>
                    <hr style=" display: block; height: 1px;border: 0; border-top: 1px solid #ccc;margin: 1em 0; padding: 0;">
                </div>
            </div>
            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display" width="100%">
                <thead>
                    <tr>
                        <th width="10">
                            No
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                            Password
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Level
                        </th>
                        <th width="110">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Proses PHP untuk menampilkan data -->
                    <?php
                    $ambil = $koneksi->query("SELECT * FROM tb_pengguna");
                    while ($pecah = $ambil->fetch_object()) {
                        ?>
                        <tr class="odd gradeX">
                            <td>
                                <?php echo $no++ ?>
                            </td>
                            <td>
                                <?php echo $pecah->pengguna_user ?>
                            </td>
                            <td>
                                <?php echo $pecah->pengguna_pass ?>
                            </td>
                            <td>
                                <?php echo $pecah->pengguna_nama ?>
                            </td>
                            <td>
                                <?php echo $pecah->pengguna_level ?>
                            </td>
                            <td>
                                <a href="index.php?page=aksi_pengguna/pengguna_edit&id=<?php echo $pecah->pengguna_id ?>" class="collapsed btn btn-warning">Edit</a>
                                <a href="index.php?page=aksi_pengguna/pengguna_hapus&id=<?php echo $pecah->pengguna_id ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>