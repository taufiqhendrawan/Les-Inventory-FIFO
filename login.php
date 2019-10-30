<?php
session_start();
include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>PT.Rinkas Suka Utama</title>
	<?php include 'components/head.php'; ?>
</head>

<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>
				<a class="brand" href="login.php">
					PT. RINKAS SUKA UTAMA
				</a>
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->

	<div class="wrapper" style="height: 398px;">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form action="" method="post" class="form-vertical">
						<div class="module-head">
							<h3>Silahkan Login Terlebih Dahulu</h3>
						</div>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input name="username" class="span12" type="text" placeholder="Username">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input name="password" class="span12" type="password" placeholder="Password">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<select class="span12" name="level">
										<option value="Admin">Admin</option>
										<option value="Pimpinan">Pimpinan</option>
										<option value="Staff Gudang">Staff Gudang</option>
										<option value="Front Office">Front Office</option>
									</select>
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<input name="login" type="submit" value="Login" class="btn btn-primary pull-right">
								</div>
							</div>
						</div>
					</form>
					<?php
					if (isset($_POST['login'])) {
						$ambil = $koneksi->query("SELECT * FROM tb_pengguna WHERE pengguna_user='$_POST[username]' AND pengguna_pass='$_POST[password]' ");
						$a = $ambil->fetch_array();
						$cek = mysqli_num_rows($ambil);
						if ($cek == 1) {
							$_SESSION['pengguna'] = $a['pengguna_nama'];
							$_SESSION['pengguna_level'] = $a['pengguna_level'];
							echo "<script>
                      alert('Anda Berhasil Login');
                      window.location='index.php';
                      </script>";
						} else {
							echo "<script>
                      alert('Anda Gagal Login');
                      window.location='login.php';
                      </script>";
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<!--/.wrapper-->

	<?php include 'components/footer.php'; ?>

	<?php include 'components/script.php'; ?>
</body>