<?php
include 'produk_Ctrl.php';
if (!isset($_GET['action'])) {
?>
 <div class="container-lg mt-1 ">
<a href="?modul=mod_produk&action=add" class="btn btn-primary mb-2 sticky-top">Tambah Data</a>
    <table class="table table-striped table-primary table-bordered border-info">
        <tr>
            <th>Nama Kategori</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>stock</th>
            <th>action</th>
        </tr>
            <?php
            $data = mysqli_query($koneksidb, "SELECT kp.nmkategori, p.nmproduk, p.stock, p.harga FROM kategoriproduk kp INNER JOIN mst_produk p ON 
            kp.idkategori = p.idkategori");
            foreach ($data as $d) :
            ?>
                <tr>
                    <td><?= $d['nmkategori'] ?></td>
                    <td><?= $d['nmproduk'] ?></td>
                    <td><?= $d['harga'] ?></td>
                    <td><?= $d['stock'] ?></td>
                    <td>
                        <a href="?modul=mod_kategoriproduk&action=edit&id=<?= $d["idkategori"]; ?>" class="btn btn-xs btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="?modul=mod_kategoriproduk&action=delete&id=<?= $d["idkategori"]; ?>" class="btn btn-xs btn-danger"><i class="bi bi-trash"></i> Delete</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
</div>
<?php
 } else if (isset($_GET['action']) && ($_GET['action'] == "add")) {
?>
<?php 
 $dt_kategoriproduk = mysqli_query($koneksidb, "select * from kategoriproduk");
?>
<div class="container-lg mt-1">
    <h3 class="mt-1"><?php echo $judul; ?></h3>
    <div class="row mt-4">
        <div class="col">
         <form action="?modul=mod_produk&action=save" id="formproduk" method="POST" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="nmproduk_ins" class="col-sm-2 col-form-label">Nama Produk</label>
             <div class="col-sm-6">
                <input type="text" class="form-control" id="nmproduk_ins" name="nmproduk_ins">
             </div>
            </div>
            <div class="mb-3 row">
                <label for="img_add" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" id="img_add" name="img_add">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="idkategori_ins" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-6">
                    <select name="idkategori_ins" id="idkategori_ins" class="form-control">
                        <option value="" selected disabled>--Pilih Produk--</option>
                        <?php
                         foreach ($dt_kategoriproduk as $dt_kp) :
                        ?>
                         <option value="<?= $dt_kp['idkategori']; ?>"><?= $dt_kp['nmkategori']; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="harga_ins" name="harga_ins">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga" class="col-sm-2 col-form-label">stock</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="stock_ins" name="stock_ins">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga" class="col-sm-2 col-form-label">Kondisi</label>
                <div class="col-sm-6">
                <select class="form-select form-select-lg mb-3" name="kondisi_ins" id="kondisi_ins" aria-label="size 3 select example">
                    <option value="" selected disabled>--Pilih Kondisi--</option>
                    <option value="baru">baru</option>
                    <option value="bekas">bekas</option>
                </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Isi</label>
                <div class="col-sm-6">
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga" class="col-sm-2 col-form-label">Berat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="berat_ins" name="berat_ins">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <a href="?modul=mod_produk" type="cancel" class="btn btn-secondary"><i class="bi bi-box-arrow-left"></i> Kembali</a>
                    <button type="cancel" class="btn btn-danger"><i class="bi bi-x-square"></i> Reset</button>
                    <button type="submit" id="btnsave" data-bs-toggle="modal" class="btn btn-primary"><i class="bi bi-save"></i> Submit</button>
                </div>
            </div>
         </form>
        </div>
    </div>
</div>

<!-- modal -->

<div class="modal fade" tabindex="-1" id="ModalKonfirmasi1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Konfirmasi</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>Apakah anda yakin simpan data ini?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
						<button type="button" id="btnyess" class="btn btn-primary">Ya</button>
					</div>
				</div>
			</div>
		</div>
<?php 
 }
?>