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
    <h3 class="col-md-12" align="center"><u>Laporan Supply</u></h3>

    <table class=" table table-bordered table-striped display" width="100%">
        <thead>
            <tr>
                <th width="10">
                    No
                </th>
                <th>
                    No Faktur
                </th>
                <th>
                    Nama Supplier
                </th>
                <th>
                    Nama Barang
                </th>
                <th>
                    Kode Barang
                </th>
                <th>
                    Jumlah Barang
                </th>
                <th>
                    Stok
                </th>
                <th>
                    Satuan
                </th>
            </tr>
        </thead>
        <tbody>
            <!-- Php untuk menampilkan isi dalam tabel -->
            <?php
            $total = 0;
            $ambil = $koneksi->query("SELECT * FROM `tb_barang_msk`JOIN tb_supplier ON  tb_barang_msk.supplier_id=tb_supplier.supplier_id JOIN tb_barang ON tb_barang_msk.barang_id=tb_barang.barang_id ORDER BY tb_barang_msk.msk_tgl DESC");
            while ($pecah = $ambil->fetch_object()) {
                $total += $pecah->detail_total;
                ?>
                <tr class="odd gradeX">
                    <td>
                        <?php echo $no++ ?>
                    </td>
                    <td>
                        <?php echo $pecah->msk_faktur ?>
                    </td>
                    <td>
                        <?php echo $pecah->supplier_nama ?>
                    </td>
                    <td>
                        <?php echo $pecah->barang_nama ?>
                    </td>
                    <td>
                        <?php echo $pecah->barang_kode ?>
                    </td>
                    <td>
                        <?php echo $pecah->msk_jumlah ?>
                    </td>
                    <td>
                        <?php echo $pecah->barang_stok ?>
                    </td>
                    <td>
                        <?php echo $pecah->barang_sat ?>
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