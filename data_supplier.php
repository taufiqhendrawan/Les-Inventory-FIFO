<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>
                    Data Supplier</h3>
            </div>
            <div class="module-body">
                <a class="collapsed btn btn-primary" data-toggle="collapse" href="#Tambah">+ Tambah Data</a>
            </div>
            <div class="module-body table">
                <div id="Tambah" class="collapse unstyled">
                    <form method="post" class="form-horizontal row-fluid">
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Nama Supplier</label>
                            <div class="controls">
                                <input type="text" name="nama" placeholder="Nama" class="span8">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Alamat Supplier</label>
                            <div class="controls">
                                <input type="text" name="alamat" placeholder="Alamat" class="span8">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="basicinput">No Telpon</label>
                            <div class="controls">
                                <input type="text" name="tlp" placeholder="No Telpon" class="span8">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" name="simpan" class="btn btn-success" value="simpan">
                            </div>
                        </div>
                    </form>
                    <!-- Php untuk menyimpan data ke database -->
                    <?php
                    if (isset($_POST['simpan'])) {
                        $nama   = $_POST['nama'];
                        $alamat = $_POST['alamat'];
                        $tlp    = $_POST['tlp'];

                        $tambah = $koneksi->query("INSERT INTO tb_supplier (supplier_nama,supplier_alamat,supplier_tlp) VALUES ('$nama','$alamat','$tlp')");

                        if ($tambah) {
                            echo "<script>alert('Data berhasil di tambah');</script>";
                            echo "<script>window.location='index.php?page=data_supplier'</script>";
                        } else {
                            echo "<script>alert('Data gagal di tambah');</script>";
                            echo "<script>window.location='index.php?page=data_supplier'</script>";
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
                                Nama supplier
                            </th>
                            <th>
                                Alamat
                            </th>
                            <th>
                                No Telpon
                            </th>
                            <th width="110">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Php untuk menampilkan isi dalam tabel -->
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM tb_supplier");
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
                                    <?php echo $pecah->supplier_alamat ?>
                                </td>
                                <td>
                                    <?php echo $pecah->supplier_tlp ?>
                                </td>
                                <td>
                                    <a href="index.php?page=aksi_supplier/supplier_edit&id=<?php echo $pecah->supplier_id ?>" class="btn btn-warning">Edit</a>
                                    <a href="index.php?page=aksi_supplier/supplier_hapus&id=<?php echo $pecah->supplier_id ?>" class="btn btn-danger">Hapus</a>

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