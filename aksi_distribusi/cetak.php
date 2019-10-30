<?php include('../koneksi.php') ?>
<html>

<head>
    <title>Faktur Pembayaran</title>
    <style>
        #tabel {
            font-size: 15px;
            border-collapse: collapse;
        }

        #tabel td {
            padding-left: 5px;
            border: 1px solid black;
        }
    </style>
</head>

<body style='font-family:tahoma; font-size:8pt;'>
    <?php
    $id = $_GET['id'];
    $ambil_konsumen = $koneksi->query("SELECT * FROM tb_barang_kel 
                                        JOIN tb_detail_kel ON tb_barang_kel.kel_id=tb_detail_kel.kel_id 
                                        JOIN tb_barang ON tb_detail_kel.barang_id=tb_barang.barang_id 
                                        JOIN tb_pelanggan ON tb_barang_kel.pelanggan_id=tb_pelanggan.pelanggan_id WHERE tb_barang_kel.kel_id=$id");
    $ambil_detail = $ambil_konsumen->fetch_object();
    ?>
    <center>
        <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                <span style='font-size:12pt'><b>PT Rinkas Suka Utama</b></span></br>Jalan Ujung Gurun No. 83 Padang, Sumatera Barat </br>Telp : 0752-22678
            </td>
            <td style='vertical-align:top' width='30%' align='left'>
                <b><span style='font-size:12pt'>FAKTUR PENJUALAN</span></b></br>
                No Faktur : <?php echo $ambil_detail->kel_faktur ?> </br>
                Tanggal : <?php echo $ambil_detail->kel_tgl ?></br>
            </td>
        </table>
        <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                Nama Konsumen : <?php echo $ambil_detail->pelanggan_nama ?></br>
                Alamat : <?php echo $ambil_detail->pelanggan_alamat ?>
            </td>
            <td style='vertical-align:top' width='30%' align='left'>
                No Telp : <?php echo $ambil_detail->pelanggan_tlp ?>
            </td>
        </table>
        <table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>

            <tr align='center'>
                <td width='10%'>Kode Barang</td>
                <td width='20%'>Nama Barang</td>
                <td width='20%'>Harga</td>
                <td width='4%'>Qty</td>
                <td width='13%'>Total Harga</td>
            </tr>
            <?php
            $ttl = 0;
            $id = $_GET['id'];
            $ambil_konsumen = $koneksi->query("SELECT * FROM tb_barang_kel 
                                        JOIN tb_detail_kel ON tb_barang_kel.kel_id=tb_detail_kel.kel_id 
                                        JOIN tb_barang ON tb_detail_kel.barang_id=tb_barang.barang_id 
                                        JOIN tb_pelanggan ON tb_barang_kel.pelanggan_id=tb_pelanggan.pelanggan_id WHERE tb_barang_kel.kel_id=$id");
            while ($ambil_detail_barang = $ambil_konsumen->fetch_object()) {
                $ttl = $ttl + $ambil_detail_barang->detail_total;
                ?>
                <tr>
                    <td><?php echo $ambil_detail_barang->barang_kode ?></td>
                    <td><?php echo $ambil_detail_barang->barang_nama ?></td>
                    <td><?php echo rupiah($ambil_detail_barang->barang_jual) ?></td>
                    <td><?php echo $ambil_detail_barang->detail_jumlah ?></td>
                    <td style='text-align:right'><?php echo rupiah($ambil_detail_barang->detail_total); ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan='4'>
                    <div style='text-align:right'>Total Yang Harus Di Bayar Adalah : </div>
                </td>
                <td style='text-align:right'><?php echo rupiah($ttl); ?></td>
            </tr>
        </table>
        <table style='width:650; font-size:7pt;' cellspacing='2'>
            <tr>
                <td align='center'>Diterima Oleh,</br></br><u>(<?php echo $ambil_detail->pelanggan_nama ?>)</u></td>
                <td></td>
                <td align='center'>TTD,</br></br><u>(Front Office)</u></td>
            </tr>
        </table>
    </center>
    <script>
        window.print();
    </script>
</body>

</html>