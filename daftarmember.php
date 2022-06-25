<?php 
	include_once "daftarctrl.php";
	if(!isset($_GET['action'])){
?>
	<?php 
		$query_cekkode = mysqli_query($koneksidb,
		"select kode_member from daftarmember ORDER BY kode_member DESC LIMIT 0,1");
			$cekkode = mysqli_fetch_array($query_cekkode);		
			$kodeakhir = $cekkode['kode_member'];
			$no_urutakhir = substr($kodeakhir,6);
			$th_akhir = substr($kodeakhir,2,4);
			$th_sekarang = date("Y");
				if($th_akhir == $th_sekarang){
					// if($no_urutakhir==empty){
					// 	$nourut_baru = "00".($no_urutakhir + 1);
					// }
					//$nourut_baru = $no_urutakhir + 1;
					if($no_urutakhir < 10||$no_urutakhir == 0){
						$nourut_baru = "00". ($no_urutakhir + 1);
					}
					else if($no_urutakhir < 100){
						$nourut_baru = "0" . ($no_urutakhir + 1);
					}
					else{
						$nourut_baru = ($no_urutakhir + 1);
					}
					// echo "kodenya:".$nourut_baru."<br>";
				}
				else{
					$nourut_baru =  "001";
				}
				$kodeterbaru = "MB".$th_sekarang.$nourut_baru;
				echo $no_urutakhir;
				// echo "kode: ".$kodeterbaru;
				//untuk contoh combo
				// $data_produk = mysqli_query($koneksidb,"select * from mst_produk ");
			?>
		<div class="container pb-5">
			<div class="row">
				<div class="col-md-1 pt-4"></div>
				<div class="col-md-10 pt-4">
				<?php if (isset($_GET['text'])) { ?>
        <?php if ($_GET['text'] == "sukses") { ?>
            <div class="alert alert-success" role="alert">
                Berhasil Menambahkan Data
            </div>
        <?php } elseif ($_GET['text'] == "gagal") { ?>
            <div class="alert alert-danger" role="alert">
                Gagal Menambahkan Data
            </div>
        <?php } elseif ($_GET['text'] == "ekstensi") { ?>
            <div class="alert alert-warning" role="alert">
                Ekstensi File Harus JPG
            </div>
        <?php } elseif ($_GET['text'] == "size") { ?>
            <div class="alert alert-warning" role="alert">
                Size maksimal 2 MB
            </div>
		<?php } ?>
	<?php } ?>
					<div class="subkategori p-3" id="formdaftar">
						<h5 class="text-center pb-2"><b> DAFTAR MEMBER</b></h5>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-10">
								<form action="?page=daftarmember&action=save" id="formdaftar" method="POST" enctype="multipart/form-data">
								<div class="row pb-1">
									<label for="kdmember" class="col-md-3">Kode member</label>
									<div class="col-md-6">
										<input type="hidden" name="proses" value="<?= $proses;?>">
										<input type="text" name="kdmember" id="kdmember" class="form-control" value="<?=$kodeterbaru;?>" readonly/>
									</div>
								</div>
								<div class="row pb-1">
									<label for="txtnama" class="col-md-3">Nama</label>
									<div class="col-md-6">
										<input type="text" name="txtnama" id="txtnama" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="txtemail" class="col-md-3">Email</label>
									<div class="col-md-6">
										<input type="email" name="txtemail" id="txtemail" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="txtpass" class="col-md-3">Password</label>
									<div class="col-md-6">
										<input type="Password" name="txtpass" id="txtpass" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="txtemail" class="col-md-3">Confirm Password</label>
									<div class="col-md-6">
										<input type="Password" name="txtpasscon" id="txtpasscon" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="tgllhr" class="col-md-3">Tgl_lhr</label>
									<div class="col-md-6">
										<input type="date" name="tgllhr" id="tgllhr" class="form-control" />
										<input type="hidden" name="tgldaftar" id="tgldaftar" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="tgllhr" class="col-md-3">no_telp</label>
									<div class="col-md-6">
										<input type="text" name="notelp" id="notelp" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="tgllhr" class="col-md-3">alamat</label>
									<div class="col-md-6">
										<input type="text" name="alamat" id="alamat" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="tgllhr" class="col-md-3">jenis kelamin</label>
									<div class="col-md-6">
										<select name="jk" id="jk" class=" text-center form-select">
											<option selected disabled >-- pilih jenis kelamin --</option>
											<option value="laki-laki">laki-laki</option>
											<option value="perempuan">perempuan</option>
										</select>
									</div>
								</div>
								<div class="row pb-1">
									<label for="foto" class="col-md-3">foto</label>
									<div class="col-md-6">
										<input type="file" name="foto" id="foto" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<div class="col-md-3"></div>
									<div class="col-md-6">
										<button type="submit" class="btn btn-warning btn-sm form-control" name="btndaftar" id="btndaftar">Daftar</button>
									</div>
								</div>
								</form>
								<?php } ?>
							</div>
						</div>
					</div>

					<!-- ketika tampil hasil -->
					<div class="subkategori p-3" id="tampildaftar" style="display: none">
						<h5 class="text-center pb-2"><b> Terima Kasih Telah Melakukan Pendaftaran sebagai Member</b>
						</h5>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-10">
								<div class="row pb-1">
									<label for="txtname" class="col-md-3">Nama</label>
									<div class="col-md-6" id="outnama"></div>
								</div>
								<div class="row pb-1">
									<label for="txtuser" class="col-md-3">Username</label>
									<div class="col-md-6" id="outuser"></div>
								</div>
								<div class="row pb-1">
									<label for="txttelp" class="col-md-3">Nomor Telepon</label>
									<div class="col-md-6" id="outtelepon"></div>
								</div>
								<div class="row pb-1">
									<label for="txttelp" class="col-md-3">Kode Member</label>
									<div class="col-md-6" id="outkode"></div>
								</div>
							</div>
						</div>
						<h5 class="text-center pb-2 pt-2"><b> Silahkan cek email untuk mendapatkan link aktivasi!!</b>
						</h5>
					</div>
				</div>
			</div>
		</div>