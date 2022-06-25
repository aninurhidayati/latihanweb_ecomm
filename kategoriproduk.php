<div class="container pb-5">
	<div class="row">
        <div class="col-md-2"></div>
		<div class="col-md-8 pt-4">
			<div class="row">
                <h1 class="text text-center">Kategiri</h1>
                <hr>
                <?php
                    $qlist_produk = mysqli_query($koneksidb, "SELECT mp.nmproduk, mp.harga, mp.gambar
                    FROM mst_produk mp  ORDER BY mp.idproduk DESC LIMIT 6;");
                    foreach($qlist_produk as $lp) :
                ?>
				<div class="col-md-4 pb-4">
					<div class="card">
						<img src="assets/img/<?= $lp['gambar'];?>" class="card-img-top" alt="..." />
						<div class="card-body text-center bgcardbody">
							<h5 class="card-title"><?= $lp['nmproduk'];?></h5>
							<h6 class="harga"><?= 'Rp.'.$lp['harga'];?></h6>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item btndetail">
								<a href="?page=detailproduk" target="_blank" class="text-white">Detail</a>
							</li>
						</ul>
					</div>
				</div>
                <?php 
                    endforeach;
                ?>
			</div>
		</div>
        <div class="col-md-2"></div>
	</div>
</div>