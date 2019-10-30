<?php
$host = 'localhost';
$name = 'root';
$pass = 'mysql';
$db   = 'db_fifo';
$no   = 1;
$nodua   = 1;
$koneksi = mysqli_connect($host, $name, $pass, $db);

if ($koneksi) {
    // echo "Terkoneksi";
} else {
    echo "Galal Koneksi";
}

// Untuk Rupiah
function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka);
    return $hasil_rupiah;
}

// Untuk tanggal indonesia
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'Mei',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Des'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
