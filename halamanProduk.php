<?php 
	require_once("config/koneksidb.php");
	require_once("config/config.php");
 ?>
 <html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>ASE Distro</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
	</script>
	<link rel="stylesheet" href="assets/styles.css" />
</head>
<body>
	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bgnav" style="color: white !important">
		<div class="container pe-5 ps-5">
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0 fontnav text-white">
				<li class="nav-item">
					<a href="index.html" class="nav-link">HOME</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">PRODUCT</a>
				</li>
			</ul>
			<div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0 fontnav">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="?page=daftarmember">Daftar Member</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
					</li>
               <form method="get" class="d-flex" role="search">
                 <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="cari">
                 <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
				</ul>
			</div>
		</div>
	</nav>
	<!-- header banner -->
	<section id="header">
		<div class="container ps-0">
			<img src="assets/img/banner.jpg" class="banner" />
			<div class="judulbanner">
				<span class="subtitle1">ASE Distro</span> <br />
				<span class="subtitle2">Yuk belanjaa...!!!</span>
			</div>
		</div>
	</section>
	<!-- konten -->
	<section id="konten ">
	<div class="row">
		<h4 class="text-center pt-2"> Penjualan Terbanyak </h4>
        <div class="col-md-1"></div>
		<div class="col-md-2 pt-4">
			<div class="kategori-title">Kategori Produk</div>
             <?php
            $qry_listkat= mysqli_query($koneksidb,"select * from kategoriproduk order by idkategori DESC")or die("gagal akses tabel kategoriproduk".mysqli_error($connect_db));
            while($row = mysqli_fetch_array($qry_listkat)){
            ?>
            <div class="subkategori" id=""> 
            <ul>
                <li> 
                <a href=""><?php echo $row['nmkategori'];?></a>
                </li>
            </ul>
			</div>
            <?php
            }
            ?>
		</div>
		<div class="col-md-8 pt-4">
			<div class="row">
				<?php
				
                    $qlist_produk = mysqli_query($koneksidb, "SELECT a.nmproduk, a.harga, a.gambar 
					FROM mst_produk a INNER JOIN tst_penjualan b ON b.idproduk=a.idproduk GROUP BY a.nmproduk ORDER BY b.qty DESC LIMIT 6;");
					if(isset($_GET['cari'])){
						$qlist_produk= mysqli_query($koneksidb, "SELECT a.nmproduk, a.harga, a.gambar 
						FROM mst_produk a INNER JOIN tst_penjualan b ON b.idproduk=a.idproduk WHERE a.nmproduk like '%".$_GET['cari']."%'");
					}
                    foreach($qlist_produk as $lp) :
                ?>
				<div class="col-md-4 pb-4">
					<div class="card">
						<img src="assets/img/<?= $lp['gambar'];?>" class="card-img-top" alt="..." />
						<div class="card-body text-center bgcardbody">
							<h5 class="card-title"><?= $lp['nmproduk'];?></h5>
							<h6 class="harga"><?= "Rp.".$lp['harga'];?></h6>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item btndetail">
								<a href="?page=detailprodukphp?id=<?= $row['id_produk']; ?>" target="_blank" class="text-white">Detail</a>
							</li>
						</ul>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
	</section>
	<!-- footer -->
	<section id="footer" class="bgnav text-white">
		<div class="container pt-4">
			<div class="row">
				<div class="col-md-4">
					<address class="fw-bold mb-0">Ani's Distro :</address>
					<p class="mb-0">Jalan Merdeka No.101 , Manyar Surabaya</p>
					<p>WA : 081-3393-64971</p>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<address class="fw-bold">Follow us :</address>
					<p>
						<span class="pe-3">@anidistro</span>
						<span class="pe-3">@anidistro</span>
					</p>
				</div>
			</div>
		</div>
	</section>
	<!-- modal -->
	<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form class="bg-light p-5" action="ceklogin.php" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Form Login</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="mb-4">
							<label for="username" class="form-label">Username</label>
							<input type="text" name="username" class="form-control" id="logusername" />
						</div>
						<div class="mb-4">
							<label for="password" class="form-label">Password</label>
							<input type="password" name="password" class="form-control" id="logpassword" />
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnbatal" class="btn btn-secondary"
							data-bs-dismiss="modal">Batal</button>
						<button type="submit" name="btnlogin" id="btnkeluar" class="btn btn-primary">Login</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- js -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="assets/proses.js"></script>
	<script src="assets/js/adit.js"></script>
	<script src="assets/js/sulthan.js"></script>
	<script src="assets/js/galang.js"></script>
	<script src="assets/js/ardi.js"></script>
	<script src="assets/js/agung.js"></script>
	<script src="assets/js/putra.js"></script>
</body>
</html>