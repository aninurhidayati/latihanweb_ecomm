<?php
include_once("loginCtrl.php");
if (!isset($_GET['action'])) {
?>
	<a href="?modul=mod_userlogin&action=add" class="btn btn-primary btn-xs mb-1">Tambah Data</a>
	<table class="table table-bordered">
		<tr>
			<th>Id User</th>
			<th>Username</th>
            <th>Nama Lengkap</th>
            <th>Password</th>
            <th>Is Active</th>
            <th>Action</th>
		</tr>
		<?php
        $qrylogin = mysqli_query($koneksidb,"select * from mst_userlogin");
		while ($d = mysqli_fetch_array($qrylogin)) {
		?>
        <tr>
            <td><?=$d['iduser'] ?></td>
            <td><?=$d['username'] ?></td>
            <td><?=$d['nama_lengkap'] ?></td>
            <td><?=$d['password'] ?></td>
            <td><?=$d['is_active'] ?></td>
            <td><a href="?modul=mod_userlogin&action=edit&id=<?= $d['iduser']; ?>" class="btn btn-xs btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
            <a href="?modul=mod_userlogin&action=delete&id=<?= $d['iduser']; ?>" class="btn btn-xs btn-danger"><i class="bi bi-trash"></i> Delete</a></td>
        </tr>
        <?php 
        }
        ?>
	</table>

    <?php
    }else if(isset($_GET['action']) && ($_GET['action']=="add") || ($_GET['action']=="edit")){
    ?>
    <div class="container-fluid">
	<h3><?= $judul; ?>.</h3>
	<form action="mod_userlogin/loginCtrl.php?modul=mod_userlogin&action=save" method="post" enctype="multipart/form-data">
		<input type="hidden" name="idblog" value="<?= $idblog; ?>">
		<input type="hidden" name="author" value="<?= $_SESSION['userlogin']; ?>">
		<input type="hidden" name="action" value="<?= $action; ?>">
		<div class="row">
			<div class="col-md-2">Username</div>
			<div class="col-md-6">
				<input type="text" name="username" id="username" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">Nama Lengkap</div>
			<div class="col-md-6">
				<input type="text" name="name" id="name" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">Password</div>
			<div class="col-md-6">
				<input type="password" name="pass" id="pass" class="form-control"></input>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">Is Active</div>
			<div class="col-md-6">
			<div class="form-check">
  				<input class="form-check-input" type="radio" name="isactive" id="isactive" value="1">
  				<label class="form-check-label" for="flexRadioDefault1">
    				Ative
  				</label>
			</div>
				<div class="form-check">
  				<input class="form-check-input" type="radio" name="isactive" id="isactive" value="0">
  				<label class="form-check-label" for="flexRadioDefault2">
    				Not Active
  				</label>
			</div>				
			</div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6">
				<button type="reset" name="btnreset" value="btnbatal" class="btn btn-xs btn-secondary p-1">
					<i class="bi bi-x-lg"></i> Batal</a></button>
				<button type="submit" name="btnsimpan" value="btnsimpan" class="btn btn-xs btn-primary p-1">
					<i class="bi bi-save"></i> Simpan</a></button>
			</div>
		</div>
	</form>
</div>
<?php
}
?>