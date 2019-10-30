<?php
include('../koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Cetak Laporan</title>
    <style>
        table {
            margin: 0 auto;
        }

        table,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {


            padding: 5px 10px;
        }

        th {
            text-align: center;
            background-color: gray;
        }
    </style>
</head>

<body>
    <center>
        <h3>
            <img width="120px" height="70px" align="left" src="../assets/images/logo.png">
            PT. Rinkas Suka Utama
            <img align="right" width="120px" height="70px" src="../assets/images/logo.png"><br>
        </h3>
        <p>Jl. Ujung Gurun, Ujung Gurun, Kec. Padang Bar., Kota Padang, Sumatera Barat</p>
    </center>
    <h3 class="col-md-12" align="center"><u>Laporan Barang</u></h3>

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
                <th>
                    Tanggal Masuk
                </th>
            </tr>
        </thead>
        <tbody>
            <!-- Php untuk menampilkan isi dalam tabel -->
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
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>