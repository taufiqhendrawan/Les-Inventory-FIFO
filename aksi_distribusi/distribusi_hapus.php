<?php
$id = $_GET['id']; //Mendapatkan id
$hapus = $koneksi->query("DELETE FROM `tb_detail_kel`
WHERE ((`detail_id` = '$id'));");
if ($hapus) {
    echo "<script>alert('Data berhasil di hapus');</script>";
    echo "<script>window.location='index.php?page=data_distribusi_lanjut'</script>";
} else {
    echo "<script>alert('Data gagal di hapus');</script>";
    echo "<script>window.location='index.php?page=data_distribusi_lanjut'</script>";
}
