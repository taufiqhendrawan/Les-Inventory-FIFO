<?php
session_start();
//koneksi ke database
include('koneksi.php');
if (empty($_SESSION['pengguna'])) {
    echo "<script>
  alert('Anda harus login');
  location='login.php';
  </script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <title>PT.Rinkas Suka Utama</title>
        <?php include 'components/head.php'; ?>
    </head>

<body>
    <?php include 'components/top_bar.php'; ?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include 'components/side_bar.php'; ?>
                <!--/.span3-->
                <?php include 'conten.php'; ?>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->
    <?php include 'components/footer.php'; ?>

    <?php include 'components/script.php'; ?>

</body>