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
	<link rel="stylesheet" href="assets/styles2.css" />
</head>
<body>
	<!-- konten -->
	<section id="konten" style="background-color:wheat;">
		<div class="row pt-2">
			<div class="col-md-4"></div>
			<div class="col-md-4"> 
			<h2 class="text-center mb-2 " style="color:orange ;"> <b>Produk terbaik</b> </h2>
			</div>
			<div class="col-md-3">
			<form method="get" class="d-flex" role="search">
                 <input class="form-control me-2" type="search" placeholder="Cari disini" aria-label="Search" name="cari">
                 <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
			</div>		
		</div>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6"> 
			<b><marquee behavior="" direction="" style="background-color:white;color:orange;"> Produk-Produk Terbaik bikinan Kelas ASE Diskon 100% </marquee></b>
			</div>
			<div class="col-md-3"></div>		
		</div>
	<div class="row" >
        <div class="col-md-1"></div>
		<div class="col-md-2 pt-2">
			<div class="kategori-title">Kategori Produk</div>
             <?php
            $qry_listkat= mysqli_query($koneksidb,"select * from kategoriproduk order by idkategori DESC")or die("gagal akses tabel kategoriproduk".mysqli_error($connect_db));
			$qry=mysqli_query($koneksidb,"SELECT * from kategoriproduk");

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
		<div class="col-md-8 pt-2">
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
								<a href="?page=detailprodukphp?id=<?= $row['id_produk']; ?>" target="_blank" class="btn text-white">Detail</a>
							</li>
						</ul>
					</div>
				</div>
				<?php endforeach;?>
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