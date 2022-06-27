<?php
session_start();
require_once("../config/koneksidb.php");
require_once("../config/config.php");
security_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Admin</title>
	<!-- link bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- link icon bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
	<style>
		body{
			padding-top: 60px;			
		}
	</style>
</head>

<body>
	<nav class="navbar fixed-top navbar-light bg-primary">
		<div class="container-fluid">
			<a class="navbar-brand text-white">Navbar</a>
			<form class="d-flex">
				<input class="form-control me-2" type="text" readonly value="<?= $_SESSION['namauser_log']; ?>">
				<a href="logout.php" class="btn btn-warning text-white"> Logout</a>
			</form>
		</div>
	</nav>

	<section class="mt-4">
		<div class="row">
			<div class="col-md-3">
				<div class="container">
					<div class="list-group">
						<a href="?modul=mod_menu" class="list-group-item list-group-item-action ">
							<i class="bi bi-person"></i> Menu
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="container">
					<br>
					<?php
					if (isset($_GET['modul'])) {
						include_once $_GET['modul'] . "/index.php";
					}
					?>
				</div>
			</div>
		</div>
	</section>

	<!-- Letakkan script JS disini -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="../assets/proses.js"></script>
	<script src="../assets/js/adit.js"></script>
	<script src="../assets/js/sulthan.js"></script>
	<script src="../assets/js/galang.js"></script>
	<script src="../assets/js/ardi.js"></script>
	<script src="../assets/js/agung.js"></script>
	<script src="../assets/js/putra.js"></script>
</body>

</html>