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
    <h3 class="col-md-12" align="center"><u>Laporan Distribusi</u></h3>

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
                    Tanggal
                </th>
                <th>
                    Nama Konsumen
                </th>
                <th>
                    No. Tlp
                </th>
                <th>
                    Nama Barang
                </th>
                <th>
                    Jumlah
                </th>
                <th>
                    Total
                </th>
            </tr>
        </thead>
        <tbody>
            <!-- Php untuk menampilkan isi dalam tabel -->
            <?php
            $total = 0;
            $ambil = $koneksi->query("SELECT * FROM tb_barang_kel 
                                    JOIN tb_detail_kel ON tb_barang_kel.kel_id=tb_detail_kel.kel_id 
                                    JOIN tb_barang ON tb_detail_kel.barang_id=tb_barang.barang_id 
                                    JOIN tb_pelanggan ON tb_barang_kel.pelanggan_id=tb_pelanggan.pelanggan_id");
            while ($pecah = $ambil->fetch_object()) {
                $total += $pecah->detail_total;
                ?>
                <tr class="odd gradeX">
                    <td>
                        <?php echo $no++ ?>
                    </td>
                    <td>
                        <?php echo $pecah->kel_faktur ?>
                    </td>
                    <td>
                        <?php echo $pecah->kel_tgl ?>
                    </td>
                    <td>
                        <?php echo $pecah->pelanggan_nama ?>
                    </td>
                    <td>
                        <?php echo $pecah->pelanggan_tlp ?>
                    </td>
                    <td>
                        <?php echo $pecah->barang_nama ?>
                    </td>
                    <td>
                        <?php echo $pecah->detail_jumlah ?>
                    </td>
                    <td>
                        <?php echo rupiah($pecah->detail_total) ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="7">Total :</td>
                <td colspan="1"><?php echo rupiah($total); ?></td>
            </tr>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>