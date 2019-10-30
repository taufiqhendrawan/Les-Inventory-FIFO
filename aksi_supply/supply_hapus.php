<?php
// include '../koneksi.php';
$id = $_GET['id'];

$supply         = $koneksi->query("SELECT * FROM tb_barang_msk WHERE msk_id=$id");
$supply_pecah   = $supply->fetch_object();
// get id barang
$barang         = $supply_pecah->barang_id;
// get nilai kurang
$nilai_kurang   = $supply_pecah->msk_jumlah;

$ambil_barang   = $koneksi->query("SELECT * FROM tb_barang WHERE barang_id='$barang'");
$tangkap        = $ambil_barang->fetch_object();
// get stok lama
$stok_barang    = $tangkap->barang_stok;
// proses kurang stok 
$stok_baru      = $stok_barang - $nilai_kurang;
// proses update data stok
$upbarang       = $koneksi->query("UPDATE tb_barang SET barang_stok='$stok_baru' WHERE barang_id='$barang'");
// proses hapus data
$hapus          = $koneksi->query("DELETE FROM tb_barang_msk WHERE msk_id = $id");

if ($hapus) {
    echo "<script>alert('Data berhasil di hapus');</script>";
    echo "<script>window.location='index.php?page=data_supply'</script>";
} else {
    echo "<script>alert('Data gagal di hapus');</script>";
    echo "<script>window.location='index.php?page=data_supply'</script>";
}
