<?php
include_once("orderCtrl.php");
if (!isset($_GET['action'])) {
?>
<div class="container">
	<table class="table table-bordered">
		<tr>
			<th>No Invoice</th>
			<th>Nama Pembeli</th>
			<th>Tanggal Order</th>
			<th>Action</th>
		</tr>
		<?php
		foreach ($datajual as $q) :
		?>
		<tr>
			<td><?= $q['nojual']; ?></td>
			<td><?= $q['nm_member']; ?></td>
			<td><?= $q['tgl_transaksi']; ?></td>
			<td><a href="?modul=mod_order&action=detail&nojual=<?= $q['nojual']; ?>" class="btn btn-xs btn-primary"><i
						class="bi bi-pencil-square"></i> Detail</a>
				<a href="?modul=mod_order&action=delete&nojual=<?= $q['nojual']; ?>" class="btn btn-xs btn-danger"><i
						class="bi bi-trash"></i> Delete</a>
			</td>
		</tr>
		<?php
		endforeach;
		?>
	</table>
</div>
<?php 
} 
else if (isset($_GET['action']) && ($_GET['action']=="detail")) { ?>
<form action="#" class="pb-5" id="formorder" method="POST">
	<h3 class="pt-3">Form Pembelian</h3>
	<div class="row pb-1">
		<label class="control-label col-md-2">Nama Member</label>
		<div class="col-md-3">
			<select name="nm_member" id="nm_member" value="" class="form-control">
				<option value="">--Pilih Member--</option>
				<?php 
						foreach($data_member as $p){
							echo '<option value="'.$p['idmember'].'">
							'.$p['nm_member'].'</option>';
						}
					?>
			</select>
		</div>
		<label class="control-label col-md-1">No.Invoice</label>
		<div class="col-md-2">
			<input type="text" name="no_inv" id="no_inv" value="<?= $dto['nojual']; ?>" class="form-control" readonly>
		</div>
		<label class="control-label col-md-1">Tanggal</label>
		<div class="col-md-2">
			<input type="date" name="tgl_trans" id="tgl_trans" value="" class="form-control">
		</div>
	</div>
	<div class="row pb-1">
		<label class="control-label col-md-2">Nama Barang</label>
		<div class="col-md-3">
			<select name="idbarang" id="idbarang" value="" class="form-control">
				<option value="">--Pilih Barang--</option>
				<?php 
						foreach($data_produk as $p){
							echo '<option value="'.$p['idproduk'].'"
							data-namabrg="'.$p['nmproduk'].'"
							data-hargabrg='.$p['harga'].'>
							'.$p['nmproduk'].'</option>';
						}
					?>
			</select>
			<input type="hidden" name="nm_barang" id="nm_barang">
		</div>
		<label class=" control-label col-md-1">Harga</label>
		<div class="col-md-2">
			<input type="text" name="harga" id="harga" value="" class="form-control" readonly>
		</div>
		<label class="control-label col-md-1">Jumlah</label>
		<div class="col-md-1">
			<input type="text" name="jml" id="jml" value="" class="form-control">
		</div>
		<div class="col-md-2">
			<button type="button" id="btn_addbarang" class="btn btn-primary">Tambah Barang</button>
		</div>
	</div>
	<div class="row pb-1">
		<div class="col-md-12">
			<table class="table table-bordered" id="">
				<thead>
					<tr>
						<th>Nama Barang</th>
						<th width="10%">Harga</th>
						<th width="5%">Jumlah</th>
						<th width="10%">Subtotal</th>
					</tr>
				</thead>
				<tbody id="listbarang">

				</tbody>
				<tfoot>
					<tr>
						<th colspan="3">Total Bayar</th>
						<th>
							<span id="viewtotalbayar"></span>
							<input type="hidden" name="total" id="total" value="0">
						</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
	<div class="row pb-1">
		<div class="col-md-12">
			<button type="button" id="btn_order" class="btn btn-primary"> Simpan Order</button>
		</div>
	</div>
	<!-- konfirmasi modal -->
	<div class="modal" tabindex="-1" id="konfirmasiorder">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Konfirmasi Order</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Apakah anda yakin melakukan order dan melanjutkan pembayaran???</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
					<button type="button" id="btn_saveorder" class="btn btn-primary">Ya</button>
				</div>
			</div>
		</div>
	</div>
</form>

<?php } ?>