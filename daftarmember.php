		<div class="container pb-5">
			<div class="row">
				<div class="col-md-1 pt-4"></div>
				<div class="col-md-10 pt-4">
					<div class="subkategori p-3" id="formdaftar">
						<h5 class="text-center pb-2"><b> DAFTAR MEMBER</b></h5>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-10">
								<div class="row pb-1">
									<label for="txtname" class="col-md-3">Nama</label>
									<div class="col-md-6">
										<input type="email" name="txtname" id="txtname" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="txtuser" class="col-md-3">Username</label>
									<div class="col-md-6">
										<input type="text" name="txtuser" id="txtuser" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="txtpass" class="col-md-3">Password</label>
									<div class="col-md-6">
										<input type="password" name="txtpass" id="txtpass" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="txtcpass" class="col-md-3">Confirm Password</label>
									<div class="col-md-6">
										<input type="password" name="txtcpass" id="txtcpass" class="form-control" />
										<div class="alert alert-warning text-danger p-1" role="alert" id="alert"
											style="display: none; font-size: 12px">
											password yang anda inputkan tidak sesuai
										</div>
									</div>
								</div>
								<div class="row pb-1">
									<label for="txttelp" class="col-md-3">Nomor Telepon</label>
									<div class="col-md-6">
										<input type="text" name="txttelp" id="txttelp" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<div class="col-md-3"></div>
									<div class="col-md-6">
										<button type="button" class="btn btn-warning btn-sm form-control" id="btndaftar"
											disabled>Daftar</button>
									</div>
								</div>
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