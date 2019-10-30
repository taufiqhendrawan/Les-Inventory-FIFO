<?php
// include '../koneksi.php';
$id = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM tb_supplier WHERE supplier_id = $id");
if ($hapus) {
    echo "<script>alert('Data berhasil di hapus');</script>";
    echo "<script>window.location='index.php?page=data_supplier'</script>";
} else {
    echo "<script>alert('Data gagal di hapus');</script>";
    echo "<script>window.location='index.php?page=data_supplier'</script>";
}