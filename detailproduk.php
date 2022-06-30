<?php
				$dtlproduk = mysqli_query($koneksidb,"select m.*, k.nmproduk from mst_produk m inner join kategoriproduk k
					on m.id_kategori=k.id_kategori order by id_produk DESC")
					or die("gagal akses table mst_menu ".mysqli_error($koneksidb));
				//looping 
				while($r = mysqli_fetch_array($dtlproduk)){	
			?>
<div class="container pb-5">
	<div class="row">
		<div class="col-md-3 pt-4">
			<div class="kategori-title">Kategori Produk</div>
			<div class="subkategori" id="subkategori"></div>
		</div>
		<div class="col-md-9 pt-4">
			<div class="row">
				<div class="col-md-6 pe-0">
					<img src="assets/img/<?= $b['gambar'];?>" class="card-img-top" alt="..." />
				</div>
				<div class="col-md-6 ps-0">
					<div class="card">
						<div class="card-body subkategori p-2">
							<h4><?= $b['nmproduk'];?></h4>
							<h5 class="harga">Rp. 100,000</h5>
							<p style="color: black; font-family: Arial, Helvetica, sans-serif; font-size: 14px">
								Kondisi : Baru <br />
								Berat : 450Gram <br />
								Ukuran : Allsize <br />
								Sweatshirt saat ini merupakan salah satu lini pakaian terbaik dan berkualitas tinggi di
								antara Local Brand Indonesia. Dengan
								model loose-fit berlengan panjang tanpa tudung.
							</p>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item btndetail">
								<a href="http://wa.me/6281339364971?text=Saya mau beli Sweater 001- white , Harga Rp. 100,000 "
									target="_blank" class="text-white">Beli Yuk</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php }?>
</div>