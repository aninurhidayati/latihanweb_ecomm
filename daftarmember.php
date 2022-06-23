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
									<label for="txtname" class="col-md-3">Kode member</label>
									<div class="col-md-6">
										<input type="text" name="kdmember" id="kdmember" class="form-control" readonly/>
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
									<label for="txtcpass" class="col-md-3">Confirm Password</label>
									<div class="col-md-6">
										<input type="password" name="txtcpass" id="txtcpass" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="tgldaftar" class="col-md-3">Tgl_daftar</label>
									<div class="col-md-6">
										<input type="date" name="tgldaftar" id="tgldaftar" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="tgllhr" class="col-md-3">Tgl_lhr</label>
									<div class="col-md-6">
										<input type="date" name="tgllhr" id="tgllhr" class="form-control" />
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
										<input type="radio" name="jk" id="jk" value="laki-laki" class="form-check-input" />laki-laki<br>
										<input type="radio" name="jk" id="jk" value="perempuan" class="form-check-input" />perempuan
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
										<button type="button" class="btn btn-warning btn-sm form-control" name="btndaftar" id="btndaftar">Daftar</button>
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