<?php
$id = $_GET['id']; //Mendapatkan id
$hapus = $koneksi->query("DELETE FROM tb_kategori WHERE kategori_id = $id");
if ($hapus) {
    echo "<script>alert('Data berhasil di hapus');</script>";
    echo "<script>window.location='index.php?page=data_kategori'</script>";
} else {
    echo "<script>alert('Data gagal di hapus');</script>";
    echo "<script>window.location='index.php?page=data_kategori'</script>";
}
