<?php
include_once "hakaksesCtrl.php";
if(!isset($_GET['act'])) {
?>
<div class="container-lg mt-1 ">
	<?php if(isset($_GET['tampil'])){?>
	<div class="alert alert-success" role="alert">proses simpan berhasil</div>
	<?php }?>
	<a href="?modul=mod_hakakses&act=add" class="btn btn-primary mb-2 sticky-top">Tambah Data</a>
	<table class="table table-striped table-primary table-bordered border-info">
		<tr>
			<th>Username</th>
			<th>Hak Akses</th>
		</tr>
		<?php
            /*
            $qdata = mysqli_query($koneksidb, "SELECT ha.idmenu, ha.iduser, us.username, me.nmmenu FROM hakakses_menu ha INNER JOIN mst_menu me ON ha.idmenu=me.idmenu 
            INNER JOIN mst_userlogin us ON ha.iduser=us.iduser ORDER BY ha.id_hakakses DESC");
            */
            $qdata = mysqli_query($koneksidb, "SELECT * FROM mst_userlogin");
            foreach($qdata as $row) :
            ?>
		<tr>
			<td><?= $row['username'];?></td>
			<td><a href="?modul=mod_hakakses&act=edit&iduser=<?= $row['iduser']?>">detail</a></td>
		</tr>
		<?php
            endforeach;
            ?>
	</table>
</div>
<?php 
} else if (isset($_GET['act']) && ($_GET['act'] == 'add' || $_GET['act'] == 'edit')) {
    $quser = mysqli_query($koneksidb, "SELECT iduser, username FROM mst_userlogin");
    $qmenu = mysqli_query($koneksidb, "SELECT idmenu, nmmenu FROM mst_menu");
?>
<div class="container-lg mt-1">
	<h3 class="mt-1"><?php echo $judul; ?></h3>
	<div class="row mt-4">
		<div class="col">
			<form action="?modul=mod_hakakses&act=save" id="" method="POST">
				<div class="container-lg mt-1 ">
					<div class="mb-3 row">
						<label for="" class="col-sm-2 col-form-label">Username <?= $username; ?></label>
						<div class="col-sm-4">
							<select name="iduser" id="" class="form-select">
								<?php
                                while ($r = mysqli_fetch_array($quser)) {
                                    if($r['iduser'] == $username){
                                        $selec = "selected";
                                    }
                                    else{
                                        $selec = "";
                                    }
                                ?>
								<option value="<?= $r['iduser'];?>" <?= $selec; ?>><?= $r['username'];?></option>
								<?php
                                };
                                ?>
							</select>
						</div>
					</div>
					<table class="table table-striped table-primary table-bordered border-info">
						<tr>
							<th style="width: 4%;">#</th>
							<th>Menu</th>
						</tr>
						<?php
                       while ($r = mysqli_fetch_array($qmenu)) {
                        while($d = mysqli_fetch_array($qakses)){

                        if($d['idmenu']== $r['idmenu']){
                            $check = "checked";
                        }
                        else{
                            $check = "";
                        }
                        }
                       ?>
						<tr>
							<td><input class="form-check-input" type="checkbox" name="idmenu[]" id="ckmenu"
									value="<?= $r['idmenu'];?>" <?= $check; ?>></td>
							<td value="<?= $r['idmenu'];?>"><?= $r['nmmenu'];?></td>
						</tr>
						<?php 

                        
                       };
                        ?>
					</table>
					<div class="mb-3">
						<button type="button" class="btn btn-primary" name="txtsimpan" id="txtsimpan"
							data-bs-togle="modal">Simpan</button>
						<a href="home.php?modul=mod_hakakses"><button type="button"
								class="btn btn-warning">Kembali</button></a>
					</div>
				</div>
		</div>
	</div>
	<div class="modal fade" tabindex="-1" id="konfirmasi1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Konfirmasi</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Apakah anda ingin lanjut?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
					<button type="submit" name="submit" class="btn btn-primary">Ya</button>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
<?php }?>